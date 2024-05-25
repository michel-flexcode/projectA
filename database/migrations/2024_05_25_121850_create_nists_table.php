<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNistsTable extends Migration
{
    public function up()
    {
        Schema::create('nists', function (Blueprint $table) {
            $table->id();
            $table->string('name_doc'); // Ajoutez d'autres colonnes selon vos besoins
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nists');
    }
};
