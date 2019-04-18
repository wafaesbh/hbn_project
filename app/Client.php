<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected  $table = "client" ;
    protected $fillable = [
    	'nom',
    	'prenom',
    	'reseau_social',
    	'adresse',
    	'If',
    	'ICE',
    	'type_entreprise',
    	'id_user'
    ];
    public $timestamps = false;
}
