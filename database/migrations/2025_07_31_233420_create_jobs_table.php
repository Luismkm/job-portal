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
        Schema::create('jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->json('key_responsibilities');
            $table->json('professional_skills');
            $table->string('experience');
            $table->string('degree');
            $table->json('tag');
            $table->string('salary');
            $table->string('period');
            $table->string('status');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->string('category');
            $table->foreignUuid('company_id')->references('id')->on('companies');
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
