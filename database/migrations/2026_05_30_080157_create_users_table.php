<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * name, password, remember_token, email, email_verified_at, birthday, sex, type_work, status, phone, address, start_date, end_date, part_id, position_id, team_id, type_account_id
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
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
