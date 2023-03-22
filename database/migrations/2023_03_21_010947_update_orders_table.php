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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('last_name')->nullable()->after('name');
            $table->string('email')->nullable()->after('phone');
            $table->string('zip_code')->nullable()->after('email');
            $table->string('country')->nullable()->after('zip_code');
            $table->string('city')->nullable()->after('country');
            $table->string('address')->nullable()->after('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('last_name');
            $table->dropColumn('email');
            $table->dropColumn('zip_code');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('address');
        });
    }
};
