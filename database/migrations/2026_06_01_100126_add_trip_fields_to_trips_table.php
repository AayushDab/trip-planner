<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->date('travel_date')->nullable();
            $table->integer('people')->default(1);

            // remove preferences column
            $table->dropColumn('preferences');
        });
    }

    public function down(): void
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->string('preferences')->nullable();

            $table->dropColumn('travel_date');
            $table->dropColumn('people');
        });
    }
};