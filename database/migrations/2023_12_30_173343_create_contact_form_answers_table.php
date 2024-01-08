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
        Schema::create('contact_form_answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->timestamps();
        });

        Schema::table('contact_form_answers', function (Blueprint $table) {
            $table->foreignId('contact_form_id')->constrained()->onDelete('cascade');
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_form_answers');
    }
};
