<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Debour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debour', function (Blueprint $table) {
            
            $table->increments('id');   
            $table->string('libelle_NT');
            $table->float('montant');
            $table->integer('type_comptable');
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
        Schema::dropIfExists('debour');
         
}
}