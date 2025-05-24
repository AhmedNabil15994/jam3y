<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeasonVideoTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leason_video_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('locale')->index();
            $table->integer('leason_video_id')->unsigned();
            $table->foreign('leason_video_id')->references('id')->on('leason_videos')->onDelete('cascade');
            $table->unique(['leason_video_id','locale']);
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
        Schema::dropIfExists('leason_video_translations');
    }
}
