<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
    	'created_at', 'updated_at','nama_kelas','jumlah_siswa'
    ];
}
