<?php

namespace App\Models\Lomba;

use App\Mail\Pendaftaran as MailPendaftaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'kategori_id',
        'invoice',
        'nama_team',
        'nama_ketua',
        'instansi',
        'tingkatan',
        'nama_pendamping',
        'berkas_pendamping',
        'status',
        'bukti_pembayaran',
        // anggota
        'anggota_1', 'berkas_anggota_1',
        'anggota_2', 'berkas_anggota_2',
        'nomor_wa', 'berkas_ketua',
    ];

    public function buat($request)
    {
        $invoice = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        if ($request->file('berkas_pendamping')) {
            // versi sma dan smk
            if ($request->file('berkas_anggota_2')) {
                $pendamping = 'pendamping-' . time() . '.' . $request->berkas_pendamping->extension();
                $anggota_2 = 'anggota-2-' . time() . '.' . $request->berkas_anggota_2->extension();
                $anggota_1 = 'anggota-1-' . time() . '.' . $request->berkas_anggota_1->extension();
                $ketua = 'ketua-'. time() . '.' . $request->berkas_ketua->extension();
                $simpan = $this->create([
                    'kategori_id' => $request->kategori_id,
                    'email' => $request->email,
                    'invoice' => substr(str_shuffle($invoice), 0, 8),
                    'nama_team' => $request->nama_team,
                    'instansi' => $request->instansi,
                    'tingkatan' => $request->tingkatan,
                    'status' => '0',
                    // anggota
                    'anggota_1' => $request->anggota_1,
                    'berkas_anggota_1' => $anggota_1,
                    'anggota_2' => $request->anggota_2,
                    'berkas_anggota_2' => $anggota_2,
                    // pendamping
                    'nama_pendamping' => $request->nama_pendamping,
                    'berkas_pendamping' => $pendamping,
                    // ketua
                    'nama_ketua' => $request->nama_ketua,
                    'berkas_ketua' => $ketua,
                    'nomor_wa' => $request->nomor_wa,
                ]);
                $request->berkas_anggota_1->move(public_path('assets/anggota'), $anggota_1);
                $request->berkas_anggota_2->move(public_path('assets/anggota'), $anggota_2);
                $request->berkas_pendamping->move(public_path('assets/pendamping'), $pendamping);
                $request->berkas_ketua->move(public_path('assets/anggota'), $ketua);
            } else {
                $request->validate([
                    'nama_pendamping' => 'required',
                ]);
                // anggota 1
                $pendamping = 'pendamping-' . time() . '.' . $request->berkas_pendamping->extension();
                $anggota_1 = 'anggota-1-' . time() . '.' . $request->berkas_anggota_1->extension();
                $ketua = 'ketua-'. time() . '.' . $request->berkas_ketua->extension();
                $simpan = $this->create([
                    'kategori_id' => $request->kategori_id,
                    'email' => $request->email,
                    'invoice' => substr(str_shuffle($invoice), 0, 8),
                    'nama_team' => $request->nama_team,
                    'instansi' => $request->instansi,
                    'tingkatan' => $request->tingkatan,
                    'status' => '0',
                    // anggota
                    'anggota_1' => $request->anggota_1,
                    'berkas_anggota_1' => $anggota_1,
                    // pendamping
                    'nama_pendamping' => $request->nama_pendamping,
                    'berkas_pendamping' => $pendamping,
                    // ketua
                    'nama_ketua' => $request->nama_ketua,
                    'berkas_ketua' => $ketua,
                    'nomor_wa' => $request->nomor_wa,
                ]);
                $request->berkas_anggota_1->move(public_path('assets/anggota'), $anggota_1);
                $request->berkas_pendamping->move(public_path('assets/pendamping'), $pendamping);
                $request->berkas_ketua->move(public_path('assets/anggota'), $ketua);
            }
        } elseif ($request->file('berkas_anggota_2')) {
            // versi kuliah 2 anggota
            $request->validate([
                'anggota_1' => 'required',
                'anggota_2' => 'required',
            ]);
            $anggota_2 = 'anggota-2-' . time() . '.' . $request->berkas_anggota_2->extension();
            $anggota_1 = 'anggota-1-' . time() . '.' . $request->berkas_anggota_1->extension();
            $ketua = 'ketua-'. time() . '.' . $request->berkas_ketua->extension();
            $simpan = $this->create([
                'kategori_id' => $request->kategori_id,
                'email' => $request->email,
                'invoice' => substr(str_shuffle($invoice), 0, 8),
                'nama_team' => $request->nama_team,
                'instansi' => $request->instansi,
                'tingkatan' => $request->tingkatan,
                'status' => '0',
                // anggota
                'anggota_1' => $request->anggota_1,
                'berkas_anggota_1' => $anggota_1,
                'anggota_2' => $request->anggota_2,
                'berkas_anggota_2' => $anggota_2,
                // ketua
                'nama_ketua' => $request->nama_ketua,
                'berkas_ketua' => $ketua,
                'nomor_wa' => $request->nomor_wa,
            ]);
            $request->berkas_anggota_1->move(public_path('assets/anggota'), $anggota_1);
            $request->berkas_anggota_2->move(public_path('assets/anggota'), $anggota_2);
            $request->berkas_ketua->move(public_path('assets/anggota'), $ketua);
        } else {
            // versi kuliah solo player
            $request->validate([
                'anggota_1' => 'required',
            ]);
            $anggota_1 = 'anggota-1-' . time() . '.' . $request->berkas_anggota_1->extension();
            $ketua = 'ketua-'. time() . '.' . $request->berkas_ketua->extension();
            $simpan = $this->create([
                'kategori_id' => $request->kategori_id,
                'email' => $request->email,
                'invoice' => substr(str_shuffle($invoice), 0, 8),
                'nama_team' => $request->nama_team,
                'nama_ketua' => $request->nama_ketua,
                'instansi' => $request->instansi,
                'tingkatan' => $request->tingkatan,
                'status' => '0',
                // anggota
                'anggota_1' => $request->anggota_1,
                'berkas_anggota_1' => $anggota_1,
                // ketua
                'nama_ketua' => $request->nama_ketua,
                'berkas_ketua' => $ketua,
                'nomor_wa' => $request->nomor_wa,
            ]);
            $request->berkas_anggota_1->move(public_path('assets/anggota'), $anggota_1);
            $request->berkas_ketua->move(public_path('assets/anggota'), $ketua);
        }

        // $details = [
        //     'token' => $simpan->invoice,
        //     'email' => $request->email,
        //     'nama_team' => $request->nama_team,
        //     'nama_ketua' => $request->nama_ketua
        // ];
        // Mail::to($request->email)->send(new MailPendaftaran($details));

        return;
    }

    public function edit($invoice)
    {
        return $this->where('invoice', $invoice)->first();
    }
}
