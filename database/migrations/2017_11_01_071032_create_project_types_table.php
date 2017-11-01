<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->index();
            $table->text('industry')->nullable();
            $table->text('category');
            $table->text('feature1')->nullable();
            $table->text('feature2')->nullable();
            $table->text('feature3')->nullable();
            $table->text('feature4')->nullable();
            $table->text('feature5')->nullable();
            $table->text('feature6')->nullable();
            $table->text('feature7')->nullable();
            $table->text('feature8')->nullable();
            $table->text('feature9')->nullable();
            $table->text('feature10')->nullable();
            $table->text('feature11')->nullable();
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
        Schema::dropIfExists('project_types');
    }
}
