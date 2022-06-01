<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnregistrementPrestationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enregistrement_prestations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mutuelle')->constrained('mutuelle_de_santes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreignId('type_prestation')->constrained('type_prestations')->onUpdate('restrict')->onDelete('restrict')->nullabe();
            $table->date('date')->nullable();
            $table->integer('cas_classique_nombre_h')->nullable();
            $table->integer('cas_classique_nombre_f')->nullable();
            $table->integer('cas_bsf_nombre_h')->nullable();
            $table->integer('cas_bsf_nombre_f')->nullable();
            $table->integer('cas_cec_nombre_h')->nullable();
            $table->integer('cas_cec_nombre_f')->nullable();
            $table->integer('cas_eleve_nombre_h')->nullable();
            $table->integer('cas_eleve_nombre_f')->nullable();
            $table->integer('cas_ndongo_daara_nombre_h')->nullable();
            $table->integer('cas_ndongo_daara_nombre_f')->nullable();
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
        Schema::dropIfExists('enregistrement_prestations');
    }
}
