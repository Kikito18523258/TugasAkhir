<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $primaryKey = 'id';
    protected $guarded = [];
}


// Model merupakan fasilitas tambahan untuk mengambil nama table pada sebuah database agar mudah dipanggil saat di CONTROLLER 
// contoh nama table datas, maka nama modelnya Data karena nama database harus JAMAK, namun nama model harus TUNGGAL
// apabila nama database tidak jamak, maka inisialisasi Model harus menggunakan protected $table = 'nama table';