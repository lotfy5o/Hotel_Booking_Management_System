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
        Schema::table('rooms', function (Blueprint $table) {
            $table->enum('status', ['available', 'booked'])->default('available')->after('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('rooms', function (Blueprint $table) {
            if (Schema::hasColumn('rooms', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
