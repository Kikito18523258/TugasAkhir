<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
    	'created_at', 'updated_at','nama','keterangan'
    ];
}
