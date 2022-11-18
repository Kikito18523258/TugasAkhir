<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpps', function (Blueprint $table) {
            $table->id('id_rpp');
            $table->string('satuan_pendidikan');
            $table->string('kelas');
            $table->string('semester');
            $table->string('tahun_ajaran');
            $table->string('tema');
            $table->string('sub_tema');
            $table->integer('pembelajaran_ke');
            $table->integer('alokasi_waktu'); 
            $table->biginteger('kompetensi_inti')->unsigned();
            $table->biginteger('muatan')->unsigned();
            $table->biginteger('kompetensi_dasar')->unsigned();
            $table->text('indikator');
            $table->text('tujuan');
            $table->text('materi');
            $table->text('pendekatan_metode'); 
            $table->text('kegiatan_pendahuluan');
            $table->integer('waktu_pendahuluan');
            $table->text('kegiatan_inti');
            $table->integer('waktu_inti');
            $table->text('kegiatan_penutup');
            $table->integer('waktu_penutup');
            $table->text('penilaian');
            $table->text('remidiasi_pengayaan');
            $table->text('sumber_media');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rpp');
    }
}
