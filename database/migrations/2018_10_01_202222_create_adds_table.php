<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adds', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type' , ['admissions' , 'jobs' , 'tenders']);
            $table->integer('newspaper_id')->nullable();
            $table->integer('qualification_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('job_type_id')->nullable();
            $table->string('qualification')->nullable();
            $table->string('title')->nullable();
            $table->string('minimum_requirements')->nullable();
            $table->string('apply_by')->nullable();
            $table->string('description')->nullable();
            $table->string('last_date')->nullable();
            $table->string('newspaper_piece')->nullable();
            $table->string('rel_logo')->nullable();
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
        Schema::dropIfExists('adds');
    }
}
