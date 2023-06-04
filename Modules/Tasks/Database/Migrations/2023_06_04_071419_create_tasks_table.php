<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('estimation', 4, 2)->nullable();            
            $table->float('spend_time', 4, 2)->nullable();            
            $table->unsignedBigInteger('priority_id')->nullable();            
            $table->unsignedBigInteger('type_id')->nullable();            
            $table->unsignedBigInteger('status_id')->nullable();            
            $table->timestamps();

            $table->foreign('priority_id')->references('id')->on('task_priorities');
            $table->foreign('type_id')->references('id')->on('task_types');
            $table->foreign('status_id')->references('id')->on('task_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
