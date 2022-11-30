<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    protected $table = 'log';
    public $timestamps = false;

    protected $fillable = ['action', 'url', 'method', 'activity', 'created_at','created_by'];
}
