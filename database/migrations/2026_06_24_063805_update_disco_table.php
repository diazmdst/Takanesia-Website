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
        Schema::table('discography', function (Blueprint $table) {
            $table->string('judul');
            $table->string('foto')->nullable();
            $table->dateTime('date_rilis')->nullable();
            $table->string('link_embed_spotify')->nullable();
            $table->text('lirik')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
