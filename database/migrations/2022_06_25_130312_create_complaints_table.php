<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{

    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('message');
            $table->enum('type' , ['general' , 'task'])->default('general');
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('task_id')->nullable()->references('id')->on('tasks')->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
