<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNahrimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nahrims', function (Blueprint $table) {
            $table->increments('id');
            $table->string('location');
            $table->integer('year');
            $table->integer('month');
            $table->decimal('day_1');
            $table->decimal('day_2');
            $table->decimal('day_3');
            $table->decimal('day_4');
            $table->decimal('day_5');
            $table->decimal('day_6');
            $table->decimal('day_7');
            $table->decimal('day_8');
            $table->decimal('day_9');
            $table->decimal('day_10');
            $table->decimal('day_11');
            $table->decimal('day_12');
            $table->decimal('day_13');
            $table->decimal('day_14');
            $table->decimal('day_15');
            $table->decimal('day_16');
            $table->decimal('day_17');
            $table->decimal('day_18');
            $table->decimal('day_19');
            $table->decimal('day_20');
            $table->decimal('day_21');
            $table->decimal('day_22');
            $table->decimal('day_23');
            $table->decimal('day_24');
            $table->decimal('day_25');
            $table->decimal('day_26');
            $table->decimal('day_27');
            $table->decimal('day_28');
            $table->decimal('day_29');
            $table->decimal('day_30');
            $table->decimal('day_31');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nahrims');
    }
}
