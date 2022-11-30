<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanModel extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'id_kendaraan';
    public $timestamps = false;

    protected $fillable = ['nama_kendaraan', 'jenis_kendaraan', 'plat_kendaraan', 'bahan_bakar', 'jadwal_servis','status'];
}
