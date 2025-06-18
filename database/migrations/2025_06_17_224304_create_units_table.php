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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit', 5);
            $table->string('description', 30);
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('CASCADE');
        });

        Schema::table('product_details', function (Blueprint $table) {
            $table->foreignId('unit_id');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_unit_id_foreign');
            $table->dropColumn('unit_id');
        });

        Schema::table('product_details', function (Blueprint $table) {
            $table->dropForeign('product_details_unit_id_foreign');
            $table->dropColumn('unit_id');
        });

        Schema::dropIfExists('units');
    }
};
