<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNilaiDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_nilai_detail', function (Blueprint $table) {
            $table->integer('id_nilai_detail')->autoIncrement();
            $table->integer('id_nilai')->nullable();
            $table->integer('id_peserta')->nullable();
            $table->string('nrp_peserta')->nullable();
            $table->string('nama_peserta')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
            $table->integer('GCRecord')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_nilai_detail');
    }
}
