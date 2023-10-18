<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePenilaianHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_penilaian_header', function (Blueprint $table) {
            $table->integer('id_nilai')->autoIncrement();
            $table->integer('id_ksm')->nullable();
            $table->integer('id_dosen')->nullable();
            $table->date('tgl_ujian')->nullable();
            $table->string('periode')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
            $table->integer('GCRecord')->default(0);
            $table->timestamps();

            $table->foreign('id_ksm')->references('id_ksm')->on('table_ksm_unitkerja');
            $table->foreign('id_dosen')->references('id_dosen')->on('table_pengajar_dosen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_penilaian_header');
    }
}
