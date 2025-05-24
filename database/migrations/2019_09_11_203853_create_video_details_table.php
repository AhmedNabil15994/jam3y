<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->string('duration')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('html')->nullable();
            $table->string('pictures')->nullable();
            $table->integer('leason_video_id')->unsigned();
            $table->foreign('leason_video_id')->references('id')->on('leason_videos')->onDelete('cascade');
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
        Schema::dropIfExists('video_details');
    }
}
