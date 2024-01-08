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
        Schema::create('accepted_proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::table('accepted_proposals', function (Blueprint $table) {
            $table->foreignId('proposal_id')->references('id')->on('proposals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accepted_proposals');
    }
};
