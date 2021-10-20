<?php

namespace App\Http\Controllers;

use App\Models\Lomba\Karya;
use App\Models\Lomba\Kategori;
use App\Models\Lomba\Pendaftaran;
use App\Models\Setting\Website;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pendaftar = Pendaftaran::all()->count();
        $kategori = Kategori::all()->count();
        $karya = Karya::all()->count();
        $web = Website::find(1);
        return view('admin.index', compact('pendaftar', 'kategori', 'web', 'karya'));
    }

    public function index_update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'heading' => 'required',
            'deskripsi' => 'required',
            'nomor'=> 'required',
            'email' => 'required',
            'pengumpulan'=> 'required',
        ]);

        Website::find(1)->update([
            'title' => $request->title,
            'heading' => $request->heading,
            'deskripsi' => $request->deskripsi,
            'nomor'=> $request->nomor,
            'email' => $request->email,
            'pengumpulan'=> $request->pengumpulan,
            'maintenance' => "0"
        ]);
        if ($request->maintenance == True) {
            # jika maintenance maka
            Website::find(1)->update([
                'title' => $request->title,
                'heading' => $request->heading,
                'deskripsi' => $request->deskripsi,
                'nomor'=> $request->nomor,
                'email' => $request->email,
                'pengumpulan'=> $request->pengumpulan,
                'maintenance' => "1"
            ]);
        }else {
            Website::find(1)->update([
                'title' => $request->title,
                'heading' => $request->heading,
                'deskripsi' => $request->deskripsi,
                'nomor'=> $request->nomor,
                'email' => $request->email,
                'pengumpulan'=> $request->pengumpulan,
                'maintenance' => "0"
            ]);
        }
        
        return back()->with('success', 'Website Berhasil di Update');
    }
}
