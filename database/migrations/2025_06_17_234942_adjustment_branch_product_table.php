<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branchs', function (Blueprint $table) {
            $table->id();
            $table->string('branch', 30);
            $table->timestamps();
        });

        Schema::create('product_branchs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id');
            $table->foreignId('product_id');
            $table->decimal('sale_price', 8, 2)->default(0.01);
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branchs')->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['sale_price', 'quantity']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('sale_price', 8, 2)->default(0.01);
            $table->integer('quantity')->default(1);
        });

        Schema::dropIfExists('product_branchs');

        Schema::dropIfExists('branchs');
    }
};
