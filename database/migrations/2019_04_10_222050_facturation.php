<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Facturation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('facturation', function (Blueprint $table) {

        $table->increments('id');
        $table->string('type_facture');
        $table->string('code_facture')->unique();
        $table->date('date_facture');
        $table->date('date_echeance');
        $table->unsignedInteger("id_client")->nullable();
        $table->foreign('id_client')->references('id')->on('client')->onUpdate('cascade')->onDelete("set null");
        $table->timestamps();
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
        Schema::dropIfExists('facturation');
    }
}
