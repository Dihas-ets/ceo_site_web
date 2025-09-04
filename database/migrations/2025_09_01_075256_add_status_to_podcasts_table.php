<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->enum('status', ['publié', 'brouillon'])->default('brouillon');
        });
    }

    public function down(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
