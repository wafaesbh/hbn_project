@extends('layouts.app');
<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
@section('body')
<h2 id="titre" style="margin-left:270px; color:#1E73BE;" >Liste des factures</h2>
	<div class="card-body col-sm-10" style="float:right">
		<a href="{{route('facture')}}" class="btn btn-outline-primary" style="float:right;margin-bottom:10px;" ><i class="fa fa-plus"></i> Ajouter facture</a>
	<table id="table" class="table table-stripped text-center">
		<thead>
			
		</thead>
	</table>
	</div>
@endsection
@section('js')
	<script>

	function actionFormatter(value, row, index) {
        action = [
			'<button type="button" class="btn afficher   btn-light bg-white"><i class="fa fa-eye"></i></button>',
			'<button  type="button" class="btn modifier btn-light bg-white"><i class="fa fa-edit "></i></button>',
			'<button type="button" class="btn supprimer btn-light bg-white"><i class="fa fa-trash "></i></button>',
        ];
       
        return action.join("");
	};
	window.actionEvents = {
        "click .afficher": function(e, value, row, index) {
            
            window.location = "/detail/"+row.code_facture;
            
			
			
        },
		"click .modifier": function(e, value, row, index) {
            var i = index;
            window.location = "/edit/"+row.id;
            item = {};
        
        }
	};
	
		$(function() {
			$("#table").bootstrapTable({
				columns: [
					{
						field: "type_facture",
						title: "Type",
						sortable: true
					}, {
						field: "code_facture",
						title: "Code facture",
						sortable: true
					}, {
						field: "date_facture",
						title: "Date Facture",
						sortable: true
					}, {
						field: "date_echeance",
						title: "Date Echeance",
						sortable: true
					}
					, {
						
						title: "",
						formatter: actionFormatter,
               			events: actionEvents
						
					}
				],
				url: "/api/factures",
				pagination: true,
				pageSize:5,
				pageList: [ 5,10, 25, 50, "ALL"]
			});
		});
	</script>
@endsection