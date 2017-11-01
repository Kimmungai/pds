<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->index();
            $table->text('comment')->nullable();
            $table->boolean('positive')->nullable();
            $table->string('topic')->nullable();
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
        Schema::dropIfExists('project_testimonials');
    }
}
