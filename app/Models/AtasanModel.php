<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtasanModel extends Model
{
    protected $table = 'atasan';
    protected $primaryKey = 'id_atasan';
    public $timestamps = false;

    protected $fillable = ['id_atasan', 'nama_atasan', 'jabatan', 'status'];
}
