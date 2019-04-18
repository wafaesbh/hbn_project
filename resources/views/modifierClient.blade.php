
@extends('layouts.app');
@section('css')
		<style type="text/css">
		label{
		color:#1E73BE;
		}
		#titre{
		margin-left:50px; margin-top: 20px;
		background:#1E73BE;
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		}
		.btn:hover {
		background-position: right center;
		}
		.btn{
		
		flex: 1 1 auto;
		
		text-align: center;
		text-transform: uppercase;
		transition: 0.5s;
		background-size: 200% auto;
		background-color:#1E73BE;
		color :white;
		border-radius: 10px;
		margin-bottom: 20px;
		}
		</style>
@endsection
@section('body')
		<div class="content-wrapper col-lg-8 bg-white" style="margin-left:350px">
			<h2 id="titre" >Modifier client</h2>
			<div class="container bg-white " style="border: 1px solid lightgrey; width:90%; ">
				<form   id="updateForm" action="{{route('updateClient', $client->id)}}" enctype="multipart/form-data" method="post" style="margin-left: 100px;width:100%;">
					{{ csrf_field() }}
				<div class="row">	
				
					<div class="form-group col-lg-4">
							<label for="recipient-name" class="col-form-label">Nom:</label><br>
							<input type="text" name="nom" class="form-control " value="{{ $client->nom }}">
                    </div>
                    <div class="form-group col-lg-4">
							<label for="recipient-name" class="col-form-label">Prénom:</label><br>
							<input type="text" name="prenom" class="form-control " value="{{ $client->prenom }}">
					</div>
                </div>
                <div class="row">	
				
                        <div class="form-group col-lg-4">
                                <label for="recipient-name" class="col-form-label">Réseau social:</label><br>
                                <input type="text" name="reseau_social" class="form-control " value="{{ $client->reseau_social}}" >
                        </div>
                        <div class="form-group col-lg-4">
                                <label for="recipient-name" class="col-form-label">Adresse:</label><br>
                                <input type="text" name="adresse" class="form-control " value="{{ $client->adresse }}">
                        </div>
                    </div>

					<div class="row">	
				
                            <div class="form-group col-lg-4">
                                    <label for="recipient-name" class="col-form-label">Identifiant fiscal (IF):</label><br>
                                    <input type="text" name="If" class="form-control " value="{{ $client->If }}" >
                            </div>
                            <div class="form-group col-lg-4">
                                    <label for="recipient-name" class="col-form-label">Identifiant commun d'entreprise:</label><br>
                                    <input type="text" name="ICE" class="form-control "  value="{{ $client->ICE }}">
                            </div>
                   </div>
                   <div class="row">	
				
                        <div class="form-group col-lg-4">
                                <label for="recipient-name" class="col-form-label" >Type entreprise</label> <br>
                                <select name="choix" class="form-control" value="{{ $client->type_entreprise }}">
                                    <option value="sarl-sa">SARL-SA</option>
                                    <option value="association">Association</option>
                                    <option value="association">particulier</option>
                                    
                                </select>
                        </div>
                        <div class="form-group col-lg-4">
                                <label for="recipient-name" class="col-form-label" >Choix</label> <br>
                                <select name="choix" class="form-control" >
                                    <option value="entite_morale">Entité morale</option>
                                    <option value="entite_particulier">Entité particulier</option>
                                    
                                </select>
                            </div>
                    </div>           					
				</form>
			</div>
			<button id="modifier" type="submit" form="updateForm" class="btn sauvegarder" style="margin-left: 25em; margin-top: 10px ">
			Enregistrer
			</button>
		</div>
@endsection
@section('js')
	
		<script>

		</script>
@endsection