<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_urls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('link')->nullable();
            $table->integer('is_free')->default(0);
            $table->integer('attachment_id')->unsigned();
            $table->foreign('attachment_id')->references('id')->on('attachments')->onDelete('cascade');
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
        Schema::dropIfExists('attachment_urls');
    }
}
