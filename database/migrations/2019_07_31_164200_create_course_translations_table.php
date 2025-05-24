<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->longText('top_description')->nullable();
            $table->string('slug');
            $table->text('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
            $table->string('locale')->index();
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->unique(['course_id','locale']);
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
        Schema::dropIfExists('course_translations');
    }
}
