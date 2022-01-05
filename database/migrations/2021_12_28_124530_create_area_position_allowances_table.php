<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaPositionAllowancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_position_allowances', function (Blueprint $table) {
            $table->id();
            $table->string('personnel_area_id');
            $table->string('position_id');
            $table->string('allowance_id');
            $table->string('amount');
            $table->timestamps('start_date');
            $table->timestamps('end_date');
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
        Schema::dropIfExists('area_position_allowances');
    }
}
