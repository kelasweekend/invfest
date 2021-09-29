<?php

namespace App\Http\Controllers;

use App\Mail\Pendaftaran;
use App\Models\Lomba\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'nama_team' => 'required',
            'nama_ketua' => 'required',
        ]);

        $invoice = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr(str_shuffle($invoice), 0, 8);

        $details = [
            'token' => $token,
            'email' => $request->email,
            'nama_team' => $request->nama_team,
            'nama_ketua' => $request->nama_ketua
        ];
        Mail::to($request->email)->send(new Pendaftaran($details));
        dd('suksess terkirim');
    }

    public function daftar()
    {
        $kategori = Kategori::all();
        return view('home.daftar', compact('kategori'));
    }
}
