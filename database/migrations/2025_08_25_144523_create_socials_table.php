<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string('name');     // Exemple : Facebook
            $table->string('icon')->nullable();   // fab fa-facebook (optionnel)
            $table->string('link')->nullable();   // https://facebook.com/tonpage (optionnel)
            $table->timestamps();
        });
    }
    

};
