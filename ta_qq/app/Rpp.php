<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rpp extends Model
{
    protected $primaryKey = 'id_rpp';
    // protected $fillable = [
    // 	'created_at', 
    // 	'updated_at',
    // 	'satuan_pendidikan',
    // 	'kelas',
    // 	'semester',
    // 	'tahun_ajaran',
    // 	'tema',
    // 	'sub_tema',
    // 	'alokasi_waktu',
    // 	'kompetensi_inti',
    // 	'muatan',
    // 	'kompetensi_dasar',
    // 	'indikator',
    // 	'tujuan',
    // 	'materi',
    // 	'pendekatan_metode',
    // 	'kegiatan_pendahuluan',
    // 	'waktu_pendahuluan',
    // 	'kegiatan_inti',
    // 	'waktu_inti',
    // 	'kegiatan_penutup',
    // 	'waktu_penutup',
    // 	'penilaian',
    // 	'remediasi_pengayaan',
    // 	'sumber_media',
    // ];
    protected $guarded = [];
}
