<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            if (!Schema::hasColumn('podcasts', 'featured')) {
                $table->boolean('featured')->default(false)->after('file_path');
            }
        });
    }

    public function down(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            if (Schema::hasColumn('podcasts', 'featured')) {
                $table->dropColumn('featured');
            }
        });
    }
};
