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
        Schema::table('contacts', function (Blueprint $table) {
            $table->foreignId('reason_contact_id')->after('email');
        });

        DB::statement('update contacts set reason_contact_id = reason_contact');

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('reason_contact_id')->references('id')->on('reason_contacts')->onDelete('CASCADE');
            $table->dropColumn('reason_contact');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->integer('reason_contact');
            $table->dropForeign('contacts_reason_contact_id_foreign')->references('id')->on('reason_contacts')->onDelete('CASCADE');
        });

        DB::statement('update contacts set reason_contact = reason_contact_id');

        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('reason_contact_id');
        });
    }
};
