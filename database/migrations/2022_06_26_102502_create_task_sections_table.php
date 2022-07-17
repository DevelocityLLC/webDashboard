<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskSectionsTable extends Migration
{

    public function up()
    {
        Schema::create('task_sections', function (Blueprint $table) {
           $table->id();
           $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete();
           $table->foreignId('task_id')->references('id')->on('tasks')->cascadeOnDelete();
           $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('task_sections');
    }
}
