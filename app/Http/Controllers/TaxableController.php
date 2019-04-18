<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taxable;

class TaxableController extends Controller
{

	public function taxables($code){
		$taxables = Taxable::where("code_facture", code)->get();
		return response()->json($taxables);
	
	}
	public function index() {

		$taxable = Taxable::All();
		return response()->json($taxable);
	}

	public function liste() {
		
		return view('detail');
}



    public function editTaxable($id){
		$taxable = Taxable::find($id);
		return view('detail',compact('taxable'));
	}

	public function updateTaxable(Request $request, $id){
		$taxable = Taxable::find($id);
		$valid = $this->validate($request,[
			'libelle' => 'required',
			'montant_HT' => 'required',
			'taux_TVA' =>'required',
      'type_comptable' => 'required',
      'montant_TTC' => 'required'
		]);
		if($valid) {
			$taxable->update($request->all());
		}
		
		return view('detail',compact('taxable'));
	}
}
