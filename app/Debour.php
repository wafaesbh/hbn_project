<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debour extends Model
{
	protected $table = "debour";
    protected $fillable = [

    	"libelle_NT",
    	"montant",
			"type_comptable",
			"code_facture"
    	


    ];
    public $timestamps = false;
}
