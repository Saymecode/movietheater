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
        Schema::table('movies', function (Blueprint $table) {
            $table->boolean('film_of_the_day')->after('duration')->default(false);
            $table->date('film_of_the_day_updated_date')->after('film_of_the_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropColumn('film_of_the_day');
            $table->dropColumn('film_of_the_day_updated_date');
        });
    }
};
