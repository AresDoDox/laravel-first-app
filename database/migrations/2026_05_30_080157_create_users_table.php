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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('email')->unique();
            $table->date('birthday')->nullable();
            $table->unsignedTinyInteger('sex')->default(0)->comment('0: nam, 1: nữ, 2: khác');
            $table->unsignedTinyInteger('type_work')->default(0)->comment('0: fulltime, 1: parttime');
            $table->unsignedTinyInteger('status')->default(0)->comment('0: đang làm việc, 1: nghỉ việc');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->foreignId('part_id')->nullable()->constrained('parts')->cascadeOnDelete()->nullOnDelete();
            $table->foreignId('position_id')->nullable()->constrained('positions')->cascadeOnDelete()->nullOnDelete();
            $table->foreignId('team_id')->nullable()->constrained('teams')->cascadeOnDelete()->nullOnDelete();
            $table->foreignId('type_account_id')->nullable()->constrained('type_accounts')->cascadeOnDelete()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
