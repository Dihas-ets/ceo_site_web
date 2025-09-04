<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description'); // image d’aperçu
            $table->string('duration')->nullable()->after('author');   // durée (ex: "1h 30min")
        });
    }

    public function down(): void
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn(['image', 'duration']);
        });
    }
};
