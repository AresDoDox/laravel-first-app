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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('number')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->string('position')->nullable();
            $table->foreignId('need_user_id')->nullable()->constrained('users')->cascadeOnDelete()->nullOnDelete();
            $table->foreignId('manage_user_id')->nullable()->constrained('users')->cascadeOnDelete()->nullOnDelete();
            $table->datetime('day')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
