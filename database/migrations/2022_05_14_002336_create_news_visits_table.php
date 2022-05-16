<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsVisitsTable extends Migration
{

    public function up()
    {
        Schema::create('news_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('new_id');
            $table->foreign('new_id')->references('id')->on('news');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news_visits');
    }
}
