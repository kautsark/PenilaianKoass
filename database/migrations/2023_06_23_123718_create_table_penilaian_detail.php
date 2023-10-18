<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePenilaianDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_penilaian_detail', function (Blueprint $table) {
            $table->integer('id_nilai_detail')->autoIncrement();
            $table->integer('id_nilai')->nullable();
            $table->integer('id_peserta')->nullable();
            $table->integer('nilai_bst')->nullable();
            $table->integer('nilai_cbd')->nullable();
            $table->integer('nilai_css')->nullable();
            $table->integer('nilai_jr')->nullable();
            $table->integer('nilai_mincex')->nullable();
            
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->integer('gcrecord')->default(0);
            $table->timestamps();

            $table->foreign('id_nilai')->references('id_nilai')->on('table_penilaian_header');
            $table->foreign('id_peserta')->references('id_peserta')->on('table_peserta_didik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_penilaian_detail');
    }
}
