<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnregistrementBeneficiairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enregistrement_beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mutuelle')->constrained('mutuelles')->onUpdate('restrict')->onDelete('restrict');
            $table->date('date')->nullable();
            $table->string('nombre_adherent')->nullable();
            $table->string('nombre_beneficiaire')->nullable();
            $table->string('nombre_beneficiaire_a_jour')->nullable();
            $table->string('dette_etat')->nullable();
            $table->foreignId('inscription')->constrained('inscriptions')->onUpdate('restrict')->onDelete('restrict');
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
        Schema::dropIfExists('enregistrement_beneficiaires');
    }
}
