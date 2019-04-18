@extends('layouts.app');
<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
@section('body')
<h2 id="titre" style="margin-left:270px; color:#1E73BE;" >Liste des clients</h2>
	<div class="card-body col-sm-10" style="float:right">
		<a href="{{route('ajouterClient')}}" class="btn btn-outline-primary" style="float:right;margin-bottom:10px;" ><i class="fa fa-plus"></i> Ajouter client</a>
		
	<table id="table" class="table table-stripped text-center">
		<thead>
			
		</thead>
	</table>
	</div>
@endsection
@section('js')
	<script>
$(document).ready(function(){

})
	function actionFormatter(value, row, index) {
        action = [
			'<button type="button" class="btn afficher btn-light bg-white"><i class="fa fa-eye"></i></button>',
			'<button  type="button" class="btn modifier btn-light bg-white"><i class="fa fa-edit "></i></button>',
			'<button type="button" class="btn supprimer btn-light bg-white"><i class="fa fa-trash "></i></button>',
        ];
       
        return action.join("");
	};
	window.actionEvents = {
        
	};
	window.actionEvents = {
        "click .modifier": function(e, value, row, index) {	
            window.location = "/editClient/"+row.id;
            
        
        },"click .supprimer": function(e, value, row, index) {
            window.location = "/destroyClient/"+row.id;
            
        
        }
	};
		$(function() {
			$("#table").bootstrapTable({
				columns: [
					{
						field: "nom",
						title: "Nom",
						sortable: true
					}, {
						field: "prenom",
						title: "Prénom",
						sortable: true
					}, {
						field: "reseau_social",
						title: "Réseau social",
						sortable: true
					}, {
						field: "adresse",
						title: "Adresse",
						sortable: true
					}, {
						field: "If",
						title: "If",
						sortable: true
					}, {
						field: "ICE",
						title: "ICE",
						sortable: true
					}, {
						field: "type_entreprise",
						title: "Type entreprise",
						sortable: true
					}
					, {
						
						title: "",
						formatter: actionFormatter,
               			events: actionEvents
						
					}
				],
				url: "/api/clients",
			});
		});
	</script>
@endsection