<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxable extends Model
{
	protected $table = "taxable";
    protected $fillable = [

    	"libelle",
    	"montant_HT",
    	"taux_TVA",
    	"type_comptable",
    	"montant_TTC",
    	"code_facture"
    ];
    public $timestamps = false;
}
