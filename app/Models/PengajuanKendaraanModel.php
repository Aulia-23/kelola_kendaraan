<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKendaraanModel extends Model
{
    protected $table = 'pengajuan_kendaraan';
    protected $primaryKey = 'id_pengajuan';
    public $timestamps = false;

    protected $fillable = ['id_kendaraan', 'id_pegawai', 'id_perusahaan', 'id_driver','id_atasan','tujuan_kendaraan','tgl_pinjam','tgl_kembali','status'];
}
