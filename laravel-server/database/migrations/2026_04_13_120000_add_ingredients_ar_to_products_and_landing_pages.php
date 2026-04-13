<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('products', 'ingredients_ar')) {
            Schema::table('products', function (Blueprint $table) {
                $table->text('ingredients_ar')->nullable()->after('ingredients');
            });
        }

        if (!Schema::hasColumn('landing_pages', 'ingredients_ar')) {
            Schema::table('landing_pages', function (Blueprint $table) {
                $table->text('ingredients_ar')->nullable()->after('ingredients');
            });
        }
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('ingredients_ar');
        });
        Schema::table('landing_pages', function (Blueprint $table) {
            $table->dropColumn('ingredients_ar');
        });
    }
};
