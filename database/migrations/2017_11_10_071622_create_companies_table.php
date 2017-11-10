<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('company_name');
            $table->string('company_legal_name');
            $table->string('company_reg_no');
            $table->string('company_incoporation_date');
            $table->string('company_address');
            $table->string('company_tel');
            $table->string('company_email')->nullable();
            $table->string('company_fax')->nullable();
            $table->string('company_description');
            $table->string('company_website');
            $table->string('company_industry');
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
        Schema::dropIfExists('companies');
    }
}
