<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeasonVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leason_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('video_id')->nullable();
            $table->string('title')->nullable();
            $table->text('link')->nullable();
            $table->integer('is_free')->default(0);
            $table->integer('leason_id')->unsigned();
            $table->foreign('leason_id')->references('id')->on('leasons')->onDelete('cascade');
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
        Schema::dropIfExists('leason_videos');
    }
}
