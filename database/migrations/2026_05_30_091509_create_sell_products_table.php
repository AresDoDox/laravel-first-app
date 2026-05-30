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
        Schema::create('sell_products', function (Blueprint $table) {
            $table->id();
            $table->date('sell_day')->nullable();
            $table->string('fullname_customer')->nullable();
            $table->integer('number_sell')->nullable();
            $table->integer('price_sell')->nullable();
            $table->string('revenue')->nullable();
            $table->integer('number_products')->nullable();
            $table->unsignedTinyInteger('bagging')->default(0)->comment('0: chưa đóng bao, 1: đã đóng bao');
            $table->integer('number_bagging')->nullable();
            $table->string('transport')->nullable();
            $table->text('note')->nullable();
            $table->foreignId('sell_id')->constrained('sells')->cascadeOnDelete()->nullable();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete()->nullable();
            $table->foreignId('atm_id')->constrained('atms')->cascadeOnDelete()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_products');
    }
};
