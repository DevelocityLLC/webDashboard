<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTypesTable extends Migration
{

    public function up()
    {
        Schema::create('news_types', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('news_types');
    }
}
