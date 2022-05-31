<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMutuelleDeSantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutuelle_de_santes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignId('type')->constrained('type_de_mutuelles')->onUpdate('restrict')->onDelete('cascade');
            $table->foreignId('commune')->constrained('communes')->onUpdate('restrict')->onDelete('cascade');
            $table->foreignId('inscription')->constrained('inscriptions')->onUpdate('restrict')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mutuelle_de_santes');
    }
}
