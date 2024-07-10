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
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->year('year');
            $table->text('tracks');
            $table->time('duration');
            $table->unsignedBigInteger('singer_id');
            $table->unsignedBigInteger('recordcompany_id');
            $table->timestamps();
            $table->foreign('singer_id')->references('id')->on('singers')->onDelete('cascade');
            $table->foreign('recordcompany_id')->references('id')->on('recordcompanies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
