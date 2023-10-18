<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePengajarDosen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pengajar_dosen', function (Blueprint $table) {
            $table->integer('id_dosen')->autoIncrement();
            $table->string('nrp_dosen')->nullable();
            $table->string('nama_dosen_pengajar')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->unsignedBigInteger('id_ksm');
            $table->string('no_telp_hp')->nullable();
            $table->date('tanggal_masuk_rs')->nullable();
            $table->string('alamat_dosen')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->integer('gcrecord')->default(0);
            $table->timestamps();

            $table->foreign('id_ksm')->references('id_ksm')->on('table_ksm_unitkerja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pengajar_dosen');
    }
}
