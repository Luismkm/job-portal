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
            $table->text('key_responsibilities');
            $table->string('professional_skills');
            $table->string('experience');
            $table->string('degree');
            $table->string('tag');
            $table->string('salary');
            $table->string('period');
            $table->string('status');
            $table->foreignId('city_id')->references('id')->on('city');
            $table->string('category');
            $table->foreignUuid('company_id')->constrained();
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
