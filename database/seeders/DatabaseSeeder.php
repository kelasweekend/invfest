<?php

namespace Database\Seeders;

use App\Models\Setting\Website;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'email' => 'admin@invfest.com',
            'name' => 'admin invfest',
            'password' => Hash::make('fauzan123')
        ]);
        Website::create([
            'title' => "Invfest 6.0",
            'heading' => "Innovation Key to Growth Economy with Financial Technology.",
            'deskripsi' => "INVFEST ( Informatics Innovation Festival ) yaitu acara kompetisi nasional tahunan yang ke empat, pada tahun ini bertemakan ",
            'nomor' => "081912488040", 
            'email' => "invfest@gmail.com",
            'maintenance' => "0", 
            'pengumpulan' => "2001-10-11",
            'logo_atas' => "logo.png",
            'logo_bawah' => "astro.png"
        ]);
    }
}
