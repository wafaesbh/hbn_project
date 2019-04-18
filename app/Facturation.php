<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{
	 protected  $table = "facturation" ;
     protected $fillable = [
      "type_facture",
    	"code_facture",
    	"date_facture",
    	"date_echeance"
    	];

    public $timestamps = false;

    function taxes() {
		return $this->hasMany("App\Taxable", "code_facture", "code_facture");
	}

	function debours(){
		return $this->hasMany("App\Debour","code_facture","code_facture");
	}
}
