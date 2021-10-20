<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('heading');
            $table->string('deskripsi');
            $table->string('nomor');
            $table->string('email');
            $table->enum('maintenance', ['0', '1']);
            $table->date('pengumpulan');
            $table->string('logo_atas');
            $table->string('logo_bawah');
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
        Schema::dropIfExists('websites');
    }
}
