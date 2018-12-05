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
            $table->string('location');
            $table->integer('year');
            $table->integer('month');
            $table->decimal('day_1', 12, 9);
            $table->decimal('day_2', 12, 9);
            $table->decimal('day_3', 12, 9);
            $table->decimal('day_4', 12, 9);
            $table->decimal('day_5', 12, 9);
            $table->decimal('day_6', 12, 9);
            $table->decimal('day_7', 12, 9);
            $table->decimal('day_8', 12, 9);
            $table->decimal('day_9', 12, 9);
            $table->decimal('day_10', 12, 9);
            $table->decimal('day_11', 12, 9);
            $table->decimal('day_12', 12, 9);
            $table->decimal('day_13', 12, 9);
            $table->decimal('day_14', 12, 9);
            $table->decimal('day_15', 12, 9);
            $table->decimal('day_16', 12, 9);
            $table->decimal('day_17', 12, 9);
            $table->decimal('day_18', 12, 9);
            $table->decimal('day_19', 12, 9);
            $table->decimal('day_20', 12, 9);
            $table->decimal('day_21', 12, 9);
            $table->decimal('day_22', 12, 9);
            $table->decimal('day_23', 12, 9);
            $table->decimal('day_24', 12, 9);
            $table->decimal('day_25', 12, 9);
            $table->decimal('day_26', 12, 9);
            $table->decimal('day_27', 12, 9);
            $table->decimal('day_28', 12, 9);
            $table->decimal('day_29', 12, 9);
            $table->decimal('day_30', 12, 9);
            $table->decimal('day_31', 12, 9);
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
