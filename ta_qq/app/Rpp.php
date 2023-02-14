<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rpp extends Model
{
    protected $primaryKey = 'id_rpp';
    protected $guarded = []; //kolom yang tidak boleh dirubah
}
