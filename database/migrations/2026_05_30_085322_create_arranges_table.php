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
        Schema::create('arranges', function (Blueprint $table) {
            $table->id();
            $table->date('day')->nullable();
            $table->string('name_arrange')->nullable();
            $table->string('name_customer')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_customer')->nullable();
            $table->unsignedTinyInteger('type_arrange')->default(0)->comment('0: mới, 1: cũ');
            $table->unsignedTinyInteger('result')->default(0)->comment('0: chưa bốc, 1: hoàn thành, 2: failed');
            $table->text('reason_failed')->nullable();
            $table->integer('total_arrange')->nullable();
            $table->foreignId('sale_user_id')->constrained('users')->cascadeOnDelete()->nullable();
            $table->foreignId('part_id')->constrained('parts')->cascadeOnDelete()->nullable();
            $table->foreignId('team_id')->constrained('teams')->cascadeOnDelete()->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->nullable();
            $table->foreignId('support_user_id')->constrained('users')->cascadeOnDelete()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arranges');
    }
};
