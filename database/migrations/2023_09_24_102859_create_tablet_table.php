<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tablet', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->unique();
            $table->string('manufacturer');
            $table->string('model_type');
            $table->unsignedTinyInteger('display_size');
            $table->unsignedTinyInteger('color');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tablet');
    }
};
