<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
    	'created_at', 'updated_at','masalah','ide_baru','momen_spesial','id_rpp'
    ];
}
