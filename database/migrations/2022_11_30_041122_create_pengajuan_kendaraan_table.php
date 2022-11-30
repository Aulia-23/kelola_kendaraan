<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_kendaraan', function (Blueprint $table) {
            $table->bigIncrements('id_pengajuan');
            $table->unsignedBigInteger('id_kendaraan');
            $table->unsignedBigInteger('id_pegawai');
            $table->unsignedBigInteger('id_perusahaan');
            $table->unsignedBigInteger('id_driver');
            $table->unsignedBigInteger('id_atasan');
            $table->string('tujuan_kendaraan');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->enum('status',['ready','no ready']);

            $table->foreign('id_kendaraan')->references('id_kendaraan')->on('kendaraan');
            $table->foreign('id_pegawai')->references('id_pegawai')->on('pegawai');
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan');
            $table->foreign('id_driver')->references('id_driver')->on('driver');
            $table->foreign('id_atasan')->references('id_atasan')->on('atasan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_kendaraan');
    }
};
