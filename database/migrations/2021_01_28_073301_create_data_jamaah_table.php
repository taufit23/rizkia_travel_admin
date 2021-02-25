<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataJamaahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_jamaah', function (Blueprint $table) {
            $table->id();
            $table->string('grub');
            $table->string('nama_ayah');
            $table->integer('nik');
            $table->string('alamat');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->string('sex');
            $table->string('name');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');

            $table->string('passpor_name');
            $table->string('passpor_no');
            $table->string('place_of_isssued_passpor');
            $table->string('issued_passpor');
            $table->string('expiried_passpor');
            $table->string('tanggal_keberangkatan');
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
        Schema::dropIfExists('data_jamaah');
    }
}
