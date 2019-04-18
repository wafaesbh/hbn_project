<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturation;
use App\Debour;
use App\Taxable;



class FacturationController extends Controller
{

	public function index() {

		$liste = Facturation::All();
		return response()->json($liste);
	}
	
	
	public function create() {
		
	  	return view('facturation');
	}


	public function store(Request $request) {
		$facture = Facturation::create($request->only("type_facture", "code_facture", "date_facture", "date_echeance"));
		
	 	return redirect('/liste');

	}

	public function edit($id){
		$facture = Facturation::find($id);
		return view('modifierFacture',compact('facture'));
	}


	public function update(Request $request, $id){
		$facture = Facturation::find($id);
		$valid = $this->validate($request,[
			'type_facture' => 'required',
			'code_facture' => 'required',
			'date_facture' =>'required',
			'date_echeance' => 'required'
		]);
		if($valid) {
			$facture->update($request->all());
		}
		
		return redirect('/liste');
	}

	public function destroy($id){
		Facturation::find($id)->delete();
		return redirect('/liste');
	}


	public function showTaxable($code_facture){

		$taxable = Taxable::where("code_facture", $code_facture)->get();
		
		return response()->json($taxable);
		
	}
	public function showFacture($code_facture){

		$facture = Facturation::where("code_facture", $code_facture)->get();
		
		return response()->json($facture);
		
	}
	public function showDebour($code_facture){

		$debour = Debour::where("code_facture", $code_facture)->get();
		
		return response()->json($debour);
		
	}
	public function storeTaxable(Request $request) {
		
		$taxable = Taxable::create($request->only("code_facture","libelle", "montant_HT", "taux_TVA", "type_comptable","montant_TTC"));
		if(!empty($taxable)){
		return redirect()->route('detail', ['code' => 123]);
	
		 }else{
        return redirect()->route('/liste');
		}
	}

	
	public function updateTaxable(Request $request, $code_facture){
			$taxable = Taxable::find($code_facture);
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
			
			return redirect()->route('detail', ['code' => 123]);
		}
	public function destroyTaxable($id){
			Taxable::find($id)->delete();
			return redirect()->route('detail', ['code' => 123]);
		}

}