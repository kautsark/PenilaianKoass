<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePesertaDidik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_peserta_didik', function (Blueprint $table) {
            $table->integer('id_peserta')->autoIncrement();
            $table->string('nrp_peserta_didik')->nullable();
            $table->string('nama_peserta_didik')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tempat_lhr')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_tinggal')->nullable();
            $table->string('no_hp_tlp')->nullable();
            $table->string('email_peserta')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('universitas')->nullable();
            $table->integer('GCRecord')->default(0);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();

            // $table->foreign('id_ksm')->references('id_ksm')->on('table_ksm_unitkerja')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_peserta_didik');
    }
}
