<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Debour;

class DebourController extends Controller
{
    public function index() {

		$debour = Debour::All();
		return response()->json($debour);
    }
    
    public function edit($id){
		$taxable = Debour::find($id);
		return view('modifierFacture',compact('taxable'));
	}

	public function update(Request $request, $id){
		$debour = Debour::find($id);
		$valid = $this->validate($request,[
			'libelle_NT' => 'required',
			'montant' => 'required',
            'type_comptable' => 'required',
            
		]);
		if($valid) {
			$debour->update($request->all());
		}
		
		return redirect('/liste');
	}


	public function storeDebour(Request $request) {
		
		$debour = Debour::create($request->only("code_facture","libelle_NT", "montant", "type_comptable"));
		return redirect()->route('detail', ['code' => 123]);
	
		}

	public function updateDebour(Request $request, $code_facture){
		$debour = Debour::find($code_facture);
		$valid = $this->validate($request,[
			'libelle_NT' => 'required',
			'montant' => 'required',
	  	'type_comptable' => 'required',
		
		]);
		if($valid) {
			$debour->update($request->all());
		}
		
		return redirect()->route('detail', ['code' => 123]);
	}
	public function destroyDebour($id){
		Debour::find($id)->delete();
		return redirect()->route('detail', ['code' => 123]);
	}
}
