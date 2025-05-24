<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->string('slug');
            $table->text('seo_keywords')->nullable();
            $table->longText('seo_description')->nullable();
            $table->string('locale')->index();
            $table->integer('news_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
            $table->unique(['news_id','locale']);
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
        Schema::dropIfExists('news_translations');
    }
}
