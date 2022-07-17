<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc')->nullable();
            $table->string('img')->nullable();
            $table->enum('status' , ['waiting' , 'rejected' , 'approve', 'complete' , 'edit'])->default('waiting');
            $table->text('message')->nullable();
            $table->string('start_date');
            $table->string('end_date');
            $table->foreignId('admin_id')->references('id')->on('admins')->cascadeOnDelete();
            $table->foreignId('branch_id')->references('id')->on('branches')->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
