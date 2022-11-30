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
        Schema::create('atasan', function (Blueprint $table) {
            $table->bigIncrements('id_atasan');
            $table->string('nama_atasan');
            $table->string('jabatan');
            $table->enum('status',['aktif', 'nonaktif']);
            
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atasan');
    }
};
