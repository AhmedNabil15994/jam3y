<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sliders')) {
            Schema::create('sliders', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('image');
                $table->integer('order')->nullable();
                $table->dateTime('start_date')->nullable();
                $table->dateTime('end_date')->nullable();
                $table->string('link')->nullable();
                $table->enum('type', array('course', 'category', 'link'))->default('link');
                $table->bigInteger('course_id')->nullable();
                $table->bigInteger('category_id')->nullable();
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->tinyInteger('is_active')->default(1);
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
