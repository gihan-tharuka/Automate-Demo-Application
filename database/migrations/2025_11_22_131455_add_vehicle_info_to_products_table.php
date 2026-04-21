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
        Schema::table('products', function (Blueprint $table) {
            $table->string('vehicle_make')->nullable()->after('category_id');
            $table->string('vehicle_model')->nullable()->after('vehicle_make');
            $table->string('vehicle_year')->nullable()->after('vehicle_model');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['vehicle_make', 'vehicle_model', 'vehicle_year']);
        });
    }
};
