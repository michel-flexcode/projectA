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
        Schema::create('pocs', function (Blueprint $table) {
            $table->id();
            $table->text('conclusion');
            $table->text('description');
            $table->foreignId('scope_vulnerability_id')->constrained()->onDelete('cascade');
            $table->integer('ordre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pocs');
    }
};
