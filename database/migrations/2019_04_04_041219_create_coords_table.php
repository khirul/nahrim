<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stn_no');
            $table->string('stn_name');
            $table->string('state');
            $table->string('district');
            $table->decimal('longitude');
            $table->decimal('latitude');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coords', function (Blueprint $table) {
            //
        });
    }
}
