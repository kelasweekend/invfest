<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            // relasi tabel
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            // isi code setiap team
            $table->string('invoice');
            // nama setiap team
            $table->string('nama_team');
            // nama ketua team
            $table->string('nama_ketua');
            // asal team ( nama sekolah atau kampus )
            $table->string('instansi');
            // tingkatan sma,smk atau kuliah
            $table->enum('tingkatan', ['sma/smk', 'kuliah']);
            // nama pendamping
            $table->string('nama_pendamping')->nullable();
            $table->string('berkas_pendamping')->nullable();
            // nama anggota
            $table->string('anggota_1');
            $table->string('berkas_anggota_1');
            // anggota 2
            $table->string('anggota_2')->nullable();
            $table->string('berkas_anggota_2')->nullable();
            // anggota 3
            $table->string('anggota_3')->nullable();
            $table->string('berkas_anggota_3')->nullable();
            // status pendaftaran ( Setuju, Pending )
            $table->enum('status', [0, 1]);
            // bukti pembayaran
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftarans');
    }
}
