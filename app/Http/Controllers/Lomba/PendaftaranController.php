<?php

namespace App\Http\Controllers\Lomba;

use App\Http\Controllers\Controller;
use App\Models\Lomba\Kategori;
use App\Models\Lomba\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->daftar = new Pendaftaran();
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            # jika ada request dari ajax maka
            $data = Pendaftaran::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . route('pendaftaran.edit', $row->invoice) . '" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem"><i class="fas fa-edit"></i></a>';
                    $actionBtn = $actionBtn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-url="' . route('pendaftaran.destroy', $row->id) . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fas fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == '1') {
                        # jika status sudah 1 maka
                        $statusBtn = '<span class="badge badge-success">Active</span>';
                    } else {
                        # jika masih belum maka
                        $statusBtn = '<span class="badge badge-danger">Non Active</span>';
                    }

                    return $statusBtn;
                })
                ->addColumn('tingkatan', function ($row) {
                    if ($row->tingkatan == "kuliah") {
                        # jika tingkatan sudah 1 maka
                        $tingkatanBtn = '<i class="fas fa-graduation-cap"></i> Universitas';
                    } else {
                        # jika masih belum maka
                        $tingkatanBtn = '<i class="fas fa-school"></i> Sekolah';
                    }

                    return $tingkatanBtn;
                })
                ->rawColumns(['action', 'status', 'tingkatan'])
                ->make(true);
        }
        $kategori = Kategori::all();
        return view('admin.pendaftaran.index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori_id' => 'required',
            'nama_team' => 'required',
            'nama_ketua' => 'required',
            'nomor_wa' => 'required',
            'instansi' => 'required',
            'tingkatan' => 'required',
            'berkas_pemdamping' => 'image|mimes:jpeg,png,jpg|max:2048',
            'berkas_anggota_1' => 'image|mimes:jpeg,png,jpg|max:2048',
            'berkas_anggota_2' => 'image|mimes:jpeg,png,jpg|max:2048',
            'berkas_ketua' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $this->daftar->buat($request);
        // $invoice = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return back();
    }

    public function edit($invoice)
    {
        $data = $this->daftar->edit($invoice);
        if (empty($data)) {
            # jika data kosong maka
            return back();
        } else {
            # jika data ada maka
            return view('admin.pendaftaran.edit', compact('data'));
        }
    }

    public function update(Request $request, $invoice)
    {
        $data = $this->daftar->edit($invoice);
        if (empty($data)) {
            # jika data kosong maka
            return back();
        } else {
            # jika data ada maka
            if ($request->status) {
                # code...
                $data->update([
                    'status' => "1"
                ]);
            } else {
                # code...
                $data->update([
                    'status' => "0"
                ]);
            }

            return back();
        }
    }

    public function destroy($id)
    {
        $data = Pendaftaran::find($id);
        # jika data ada maka
        if ($data->berkas_pendamping == "") {
            # jika ada pembimbing kosong maka
            if ($data->berkas_anggota_2 == "") {
                # jika ada berkas tidak ada dan anggota 2 tidak ada maka
                $ketua = public_path('assets/anggota/' . $data->berkas_ketua);
                $anggota_1 = public_path('assets/anggota/' . $data->berkas_anggota_1);
                unlink($ketua);
                unlink($anggota_1);
            } else {
                # jika anggota 2 ada tetapi tidak ada pembimbing maka
                $ketua = public_path('assets/anggota/' . $data->berkas_ketua);
                $anggota_1 = public_path('assets/anggota/' . $data->berkas_anggota_1);
                unlink($ketua);
                unlink($anggota_1);
                $anggota_2 = public_path('assets/anggota/' . $data->berkas_anggota_2);
                unlink($anggota_2);
            }
            
        } else {
            # jika ada pembimbing maka
            if ($data->berkas_anggota_2 == "") {
                # jika ada berkas tidak ada dan anggota 2 tidak ada maka
                $ketua = public_path('assets/anggota/' . $data->berkas_ketua);
                $anggota_1 = public_path('assets/anggota/' . $data->berkas_anggota_1);
                unlink($ketua);
                unlink($anggota_1);
                $pendamping = public_path('assets/pendamping/' . $data->berkas_pendamping);
                unlink($pendamping);
            } else {
                # jika anggota 2 ada tetapi tidak ada pembimbing maka
                $ketua = public_path('assets/anggota/' . $data->berkas_ketua);
                $anggota_1 = public_path('assets/anggota/' . $data->berkas_anggota_1);
                unlink($ketua);
                unlink($anggota_1);
                $anggota_2 = public_path('assets/anggota/' . $data->berkas_anggota_2);
                unlink($anggota_2);
                $pendamping = public_path('assets/pendamping/' . $data->berkas_pendamping);
                unlink($pendamping);
            }
        }

        $data->delete();
        return response()->json(['success' => 'Data deleted successfully']);
    }
}
