<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if using PostgreSQL
        if (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement('ALTER TABLE appointments ALTER COLUMN service_type TYPE json USING service_type::json');
        } else {
            Schema::table('appointments', function (Blueprint $table) {
                $table->json('service_type')->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if using PostgreSQL
        if (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement('ALTER TABLE appointments ALTER COLUMN service_type TYPE varchar(255) USING service_type::text');
        } else {
            Schema::table('appointments', function (Blueprint $table) {
                $table->string('service_type')->change();
            });
        }
    }
};
