<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnregistrementCoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enregistrement_couts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mutuelle')->constrained('mutuelle_de_santes')->onUpdate('restrict')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->integer('cas_classique_nombre_h')->nullable();
            $table->integer('cas_classique_nombre_f')->nullable();
            $table->integer('cas_classique_cout_f')->nullable();
            $table->integer('cas_classique_cout_h')->nullable();
            $table->integer('cas_bsf_nombre_h')->nullable();
            $table->integer('cas_bsf_nombre_f')->nullable();
            $table->integer('cas_bsf_cout_f')->nullable();
            $table->integer('cas_bsf_cout_h')->nullable();
            $table->integer('cas_cec_nombre_h')->nullable();
            $table->integer('cas_cec_nombre_f')->nullable();
            $table->integer('cas_cec_cout_f')->nullable();
            $table->integer('cas_cec_cout_h')->nullable();
            $table->integer('cas_eleve_nombre_h')->nullable();
            $table->integer('cas_eleve_nombre_f')->nullable();
            $table->integer('cas_eleve_cout_f')->nullable();
            $table->integer('cas_eleve_cout_h')->nullable();
            $table->integer('cas_ndongo_daara_nombre_h')->nullable();
            $table->integer('cas_ndongo_daara_nombre_f')->nullable();
            $table->integer('cas_ndongo_daara_cout_f')->nullable();
            $table->integer('cas_ndongo_daara_cout_h')->nullable();
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
        Schema::dropIfExists('enregistrement_couts');
    }
}
