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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->bigIncrements('id_kendaraan');
            $table->string('id_perusahaan');
            $table->string('nama_kendaraan');
            $table->string('jenis_kendaraan');
            $table->string('plat_kendaraan');
            $table->string('bahan_bakar');
            $table->date('jadwal_servis');
            $table->enum('status',['ready','non ready']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
};
