<?php

namespace App\Http\Controllers;

use App\Models\Lomba\Kategori;
use App\Models\Lomba\Pendaftaran;
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
        return view('admin.index', compact('pendaftar', 'kategori'));
    }
}
