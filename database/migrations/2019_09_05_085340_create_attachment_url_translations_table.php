<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentUrlTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_url_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('locale')->index();
            $table->integer('attachment_url_id')->unsigned();
            $table->foreign('attachment_url_id')->references('id')->on('attachment_urls')->onDelete('cascade');
            $table->unique(['attachment_url_id','locale']);
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
        Schema::dropIfExists('attachment_url_translations');
    }
}
