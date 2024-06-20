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
        //coatumer_id, worker_id, description, type (fault, investment, other), status (inprogress, done, failed), gps_kordinata
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('costumer_id');
            $table->string('description', 100);
            $table->string('type', 100);
            $table->string('status', 100);
            $table->string('gps_kordinata', 100);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('costumer_id')->references('id')->on('costumers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
