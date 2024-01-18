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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            //capable de comprendre si nom table + underscore laravel natif )
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->text('name_doc');
            $table->text('vulnerabilities');
            $table->string('state');
            $table->date('date');
            $table->text('recommendations');
            $table->text('proposals');
            $table->text('conclusions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
