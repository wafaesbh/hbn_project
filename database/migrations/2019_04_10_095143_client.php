<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Client extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('client', function (Blueprint $table) { 

            
        $table->increments('id');   
        $table->string('nom');
        $table->string('prenom');
        $table->string('reseau_social');
        $table->string('adresse');
        $table->string('If');
        $table->string('ICE');
        $table->enum('type_entreprise', ['entite_morale', 'entite_particulier']);
        $table->unsignedInteger("id_user")->nullable();
        $table->foreign('id_user')->references('id')->on('user')->onUpdate('cascade');
        $table->engine = 'InnoDB';
    }
);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}
