<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KompetensiDasar extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
    	'created_at', 'updated_at','kodeKD','kompetensiDasar','mataPelajaran'
    ];
}
