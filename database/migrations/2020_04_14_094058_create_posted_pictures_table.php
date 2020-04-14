<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostedPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posted_pictures', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('tweet_uuid');
            $table->foreign('tweet_uuid')->references('uuid')->on('tweets')->cascadeOnDelete();
            $table->string('path');
            $table->timestamps();

            $table->index('tweet_uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posted_pictures');
    }
}
