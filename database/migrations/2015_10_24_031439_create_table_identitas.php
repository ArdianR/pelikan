<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIdentitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('identitas', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->text('alamat');
            $table->integer('provinsi_id');
            $table->integer('kota_id');
            $table->integer('kecamatan_id');
            $table->integer('hobi_id');
            $table->string('cita');
            $table->integer('sekolah');
            $table->text('alasan');
            $table->double('ayah');
            $table->double('ibu');
            $table->integer('drugs');
            $table->integer('rokok');
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
        Schema::drop('identitas');
    }
}
