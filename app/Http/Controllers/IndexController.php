<?php

namespace App\Http\Controllers;

use App\Models\Lomba\Karya;
use App\Models\Lomba\Kategori;
use App\Models\Lomba\Pendaftaran;
use App\Models\Lomba\Timeline;
use App\Models\Setting\MediaPartner;
use App\Models\Setting\Pembayaran;
use App\Models\Setting\Sponsor;
use App\Models\Setting\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->daftar = new Pendaftaran();
    }
    public function index()
    {
        $kategori = Kategori::all();
        $timeline = Timeline::all();
        $media_partner = MediaPartner::all();
        $sponsor = Sponsor::all();
        $web = Website::find(1);
        return view('home.index', compact('kategori','sponsor', 'timeline', 'media_partner', 'web'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'kategori_id' => 'required',
            'nama_team' => 'required',
            'nama_ketua' => 'required',
            'instansi' => 'required',
            'tingkatan' => 'required',
            'berkas_pemdamping' => 'image|mimes:jpeg,png,jpg|max:2048',
            'berkas_anggota_1' => 'image|mimes:jpeg,png,jpg|max:2048',
            'berkas_anggota_2' => 'image|mimes:jpeg,png,jpg|max:2048',
            'berkas_anggota_3' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $this->daftar->buat($request);
        // $invoice = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // dd(substr(str_shuffle($invoice), 0, 8));
        return redirect()->route('sukses_daftar');
    }

    public function daftar()
    {
        $kategori = Kategori::all();
        return view('home.daftar', compact('kategori'));
    }

    public function track()
    {
        return view('home.track');
    }

    public function check(Request $request)
    {
        $request->validate([
            'invoice' => 'required|string'
        ]);

        $status = $this->daftar->where('invoice', $request->invoice)->first();
        if (empty($status)) {
            # code...
            return back()->with('salah', 'Team Tidak Ditemukan !');
        } else {
            # code...
            return view('home.track', compact('status'));
        }
    }

    public function sukses_daftar()
    {
        $pay = Pembayaran::all();
        return view('home.konfirmasi', compact('pay'));
    }

    public function konfirmasi(Request $request)
    {
        $request->validate([
            'invoice' => 'required',
            'bank' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $data = Pendaftaran::where('invoice', $request->invoice)->first();
        if (empty($data)) {
            # jika data kosong maka
            return back()->with('salah', 'Data Team Tidak Ditemukan');
        } else {
            # jika data ada maka
            if ($data->status == "0") {
                # jika status belum di acc maka
                $bank = Pembayaran::find($request->bank);
                if (empty($bank)) {
                    # jika kosong maka
                    return back()->with('salah', 'Pembayaran Tidak Sesuai');
                } else {
                    # jika data ada maka
                    $bukti = time() . '.' . $request->image->extension();
                    $data->update([
                        'bukti_pembayaran' => $bukti,
                    ]);
                    $request->image->move(public_path('assets/bukti_pembayaran'), $bukti);
                }
            } else {
                # jika status sudah di acc maka
                return back()->with('salah', 'sudah konfirmasi');
            }

            return redirect()->route('terimakasih');
        }
    }

    public function terimakasih()
    {
        return view('page.sukses');
    }

    public function karya()
    {
        return view('home.karya');
    }
    public function upload_karya(Request $request)
    {
        $request->validate([
            'invoice' => 'required',
            'link' => 'required'
        ]);

        $data = Pendaftaran::where(['invoice' => $request->invoice, 'status' => "1"])->first();
        if (empty($data)) {
            # jika data kosong maka
            return back()->with('salah', 'Team Tidak Tersedia');
        } else {
            # jika data ada maka
            $web = Website::find(1);
            if ($data->pengumpulan == date('Y-m-d')) {
                # code...
                return back()->with('salah', 'Form Pengumpulan ditutup');
            } else {
                # code...
                Karya::create([
                    'invoice' => $request->invoice,
                    'link_karya' => $request->link
                ]);
                return redirect()->route('karya_terupload');
            }
        }
    }

    public function karya_terupload()
    {
        return view('page.karya');
    }
}
