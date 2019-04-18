<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Taxable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxable', function (Blueprint $table) { 
          
            $table->increments('id');
            $table->string('libelle');
            $table->float('montant_HT');
            $table->float('taux_TVA');
            $table->integer('type_comptable');
            $table->float('montant_TTC');
            $table->string("code_facture")->nullable();
            $table->foreign('code_facture')->references('code_facture')->on('facturation')->onUpdate('cascade')->onDelete("set null");
            $table->engine = 'InnoDB';
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxable');
    }
}
