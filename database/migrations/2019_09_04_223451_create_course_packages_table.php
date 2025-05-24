<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price',9,3);
            $table->integer('days')->nullable();
            $table->boolean('fixed_date')->default(false);
            $table->date('course_end_at')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
        Schema::dropIfExists('course_packages');
    }
}
