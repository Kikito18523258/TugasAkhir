<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
    	'created_at', 'updated_at','nomor','nama','kodeKD','mata_pelajaran'
    ];
}
