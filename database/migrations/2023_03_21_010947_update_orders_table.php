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
            $table->string('second_name')->nullable()->after('name');
            $table->string('last_name')->nullable()->after('second_name');
            $table->string('email')->nullable()->after('last_name');
            $table->string('zip_code')->nullable()->after('email');
            $table->string('city')->nullable()->after('zip_code');
            $table->string('address')->nullable()->after('city');
            $table->string('notes')->nullable()->after('address');
            $table->string('order_number')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColums('second_name');
            $table->dropColumn('last_name');
            $table->dropColumn('email');
            $table->dropColumn('zip_code');
            $table->dropColumn('city');
            $table->dropColumn('address');
            $table->dropColumn('notes');
            $table->dropColumn('order_number');
        });
    }
};
