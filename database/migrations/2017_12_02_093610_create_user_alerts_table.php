<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_alerts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->tinyInteger('alert1')->default(0);
            $table->tinyInteger('alert2')->default(0);
            $table->tinyInteger('alert3')->default(0);
            $table->tinyInteger('alert4')->default(0);
            $table->tinyInteger('alert5')->default(0);
            $table->tinyInteger('alert6')->default(0);
            $table->tinyInteger('alert7')->default(0);
            $table->tinyInteger('alert8')->default(0);
            $table->tinyInteger('alert9')->default(0);
            $table->tinyInteger('alert10')->default(0);
            $table->tinyInteger('alert11')->default(0);
            $table->tinyInteger('alert12')->default(0);
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
        Schema::dropIfExists('user_alerts');
    }
}
