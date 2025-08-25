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
    Schema::table('podcasts', function (Blueprint $table) {
        if (!Schema::hasColumn('podcasts', 'title')) {
            $table->string('title')->nullable();
        }
        if (!Schema::hasColumn('podcasts', 'description')) {
            $table->text('description')->nullable();
        }
        if (!Schema::hasColumn('podcasts', 'author')) {
            $table->string('author')->nullable();
        }
        if (!Schema::hasColumn('podcasts', 'category_id')) {
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('cascade');
        }
        if (!Schema::hasColumn('podcasts', 'type')) {
            $table->enum('type', ['audio', 'video'])->nullable();
        }
        if (!Schema::hasColumn('podcasts', 'format')) {
            $table->enum('format', ['lien', 'fichier'])->nullable();
        }
        if (!Schema::hasColumn('podcasts', 'link')) {
            $table->string('link')->nullable();
        }
        if (!Schema::hasColumn('podcasts', 'file_path')) {
            $table->string('file_path')->nullable();
        }
        if (!Schema::hasColumn('podcasts', 'featured')) {
            $table->boolean('featured')->default(false);
        }
    });
}

public function down(): void
{
    Schema::table('podcasts', function (Blueprint $table) {
        $table->dropColumn([
            'title','description','author','category_id',
            'type','format','link','file_path','featured'
        ]);
    });
}

};
