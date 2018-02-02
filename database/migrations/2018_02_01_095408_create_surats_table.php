<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_surat');
            $table->string('no_agenda');
            $table->integer('jenis_surat_id')->unsigned();
            $table->date('tanggal_kirim');
            $table->date('tanggal_terima')->nullable();
            $table->string('pengirim');
            $table->string('perihal');
            $table->enum('tipe', ['masuk','keluar']);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
}
