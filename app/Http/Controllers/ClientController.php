<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{

    public function index() {
				$client = Client::All();
				return response()->json($client);
	}
    
	 public function create() {
		        return view('listeClient');
  }

    public function storeClient(Request $request) {
		$client = Client::create($request->only("nom", "prenom", "reseau_social", "adresse","If","ICE","type_entreprise"));
		
	 	return redirect('/listeClient');

    }
    
		public function editClient($id){
			$client = Client::find($id);
			return view('modifierClient',compact('client'));
		}
		
		public function updateClient(Request $request, $id){
	
			$valid = $this->validate($request,[
				'nom' => 'required',
				'prenom' => 'required',
				'reseau_social' =>'required',
				'adresse' => 'required',
				'If' => 'required',
				'ICE' => 'required',
				'type_entreprise' => 'required'
			]);
			if($valid) {
				$client->update($request->all());
			}
				return redirect('/listeClient');
		}
    public function show($id){
		// $facture = Facturation::find($id);
		// return view('detail',['facture'=>$facture]);
		return view('detail');
	}

	public function destroyClient($id){
		Client::find($id)->delete();
		return redirect('/listeClient');
	}
}
