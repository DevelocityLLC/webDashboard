<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{

    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->foreignId('task_id')->references('id')->on('tasks')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('admin_id')->references('id')->on('admins')->cascadeOnDelete();
            $table->enum('status' , ['waiting' , 'rejected' , 'approve']);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('requirements');
    }
}
