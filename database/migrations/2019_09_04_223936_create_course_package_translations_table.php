<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursePackageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_package_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('locale')->index();
            $table->integer('course_package_id')->unsigned();
            $table->foreign('course_package_id')->references('id')->on('course_packages')->onDelete('cascade');
            $table->unique(['course_package_id','locale']);
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
        Schema::dropIfExists('course_package_translations');
    }
}
