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
        Schema::create('scope_vulnerabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vulnerability_id')->constrained()->onDelete('cascade');
            $table->foreignId('scope_id')->constrained()->onDelete('cascade');
            $table->text('description');
            $table->double('level', 10, 1);
            $table->string('name');
            $table->text('solution');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scope_vulnerabilities');
    }
};
