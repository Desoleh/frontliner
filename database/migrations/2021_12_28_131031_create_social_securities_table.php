<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_securities', function (Blueprint $table) {
            $table->id();
            $table->string('jpk');
            $table->string('jkk');
            $table->string('jkm');
            $table->string('jht');
            $table->string('jp');
            $table->string('jht_p');
            $table->string('jp_p');
            $table->string('jpk_p');
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
        Schema::dropIfExists('social_securities');
    }
}
