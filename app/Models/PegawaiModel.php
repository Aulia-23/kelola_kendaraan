<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;

    protected $table = "pegawai";
    protected $fillable = ['nama_pegawai','no_ktp','no_hp','status','created_by','updated_by'];
    public $timestamps = true;
}
