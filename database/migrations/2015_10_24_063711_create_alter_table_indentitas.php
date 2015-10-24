<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlterTableIndentitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('identitas', function(Blueprint $table){
            $table->string('nomorakte')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('identitas', function(Blueprint $table){
            $table->dropColumn('nomorakte');
        });
    }
}
