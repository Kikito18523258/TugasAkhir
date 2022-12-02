<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subtema extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = []; //kolom yang tidak boleh dirubah
}
