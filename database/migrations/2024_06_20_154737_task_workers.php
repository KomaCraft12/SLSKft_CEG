<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // connect workers the tasks
        Schema::create('task_workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('worker_id');
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('worker_id')->references('id')->on('workers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_workers');
    }
};
