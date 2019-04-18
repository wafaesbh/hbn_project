@extends('layouts.app');
<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
@section('body')
<h2 id="titre" style="margin-left:270px; color:#1E73BE;" >Détail de la facture </h2>
<a href="{{route('facture')}}" class="btn btn-outline-primary" style="margin-left:73em;margin-bottom:10px;" ><i class="fa fa-plus"></i> Ajouter facture</a>
	<div class="card-body col-sm-10" style="float:right">
	
    
    
	<div style="height:200px;" >
<h5>Facture</h5>
	<table id="table" class="table table-stripped text-center"  >
       <thead>

       </thead>
  </table>
  </div>
  <div style="height:200px;" >
   
    <h5>Taxable</h5>
  <table id="table2" class="table table-stripped text-center">
     
      <thead>

      </thead>
  </table>
</div>
  <div style="height:200px;" >
    <h5>Debour</h5>
  <table id="table3" class="table table-stripped text-center">
    <thead>

    </thead>
  </table>
</div>
  {{-------------- Start taxable update --------------}}
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  id="updateForm" action="" enctype="multipart/form-data" method="post" >
            {{ csrf_field() }}
            <input type="hidden" name="id" value="">
              <div class="form-group ">
                <label for="recipient-name" class="col-form-label">libellé:</label><br>
                <input id="libelle" type="text" name="libelle" class="form-control " >
              </div>
              <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Montant HT:</label><br>
                <input id="montant_HT" type="number" name="montant_HT" class="form-control " >
              </div>
              
              
              <div class="form-group ">
                <label for="">Taux TVA :</label><br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">7%</label>
                  <input type="radio" class="form-check-input ml-4" name="taux_TVA" value="7">
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">14%</label>
                  <input type="radio" class="form-check-input ml-4" name="taux_TVA" value="14">
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">20%</label>
                  <input type="radio" class="form-check-input ml-4" name="taux_TVA" value="20">
                </div>
              </div>
              <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Type comptable:</label><br>
                <input type="text" id="type_comptable" name="type_comptable" class="form-control " >
              </div>
                <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Montant TTC:</label><br>
                <input type="text"  id="montant_TTC" name="montant_TTC" class="form-control " >
              </div>
              
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="modifier" type="submit"  form="updateForm" class="btn btn-primary sauvegarder">Enregistrer</button>
        </div>
      </div>
    </div>
  </div>
    {{-------------- end taxable update --------------}}
  {{-------------- Start taxable add --------------}}
  
	<div class="modal fade" id="modalAjouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  id="addForm" action="{{route('storeTaxable')}}" enctype="multipart/form-data" method="post" >
          {{csrf_field()}}
        <div class="modal-body">
          
          <div class="form-group ">
            <label for="recipient-name" class="col-form-label">Code facture:</label><br>
          <input id="libelle" type="text" name="code_facture" class="form-control "  >
          </div>
              <div class="form-group ">
                <label for="recipient-name" class="col-form-label">libellé:</label><br>
              <input id="libelle" type="text" name="libelle" class="form-control " >
              </div>
              <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Montant HT:</label><br>
                <input id="montant_HT" type="number" name="montant_HT" class="form-control " >
              </div>
              
              
              <div class="form-group ">
                <label for="">Taux TVA :</label><br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">7%</label>
                  <input type="radio" class="form-check-input ml-4" name="taux_TVA" value="7">
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">14%</label>
                  <input type="radio" class="form-check-input ml-4" name="taux_TVA" value="14">
                </div>
                <br>
                <div class="form-check form-check-inline">
                  <label class="form-check-label">20%</label>
                  <input type="radio" class="form-check-input ml-4" name="taux_TVA" value="20">
                </div>
              </div>
              <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Type comptable:</label><br>
                <input type="text" id="type_comptable" name="type_comptable" class="form-control " >
              </div>
                <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Montant TTC:</label><br>
                <input type="number"  id="montant_TTC" name="montant_TTC" class="form-control " >
              </div>
              
         
        </div>
      </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="ajouter" type="submit"  form="addForm" class="btn btn-primary sauvegarder">Enregistrer</button>
        </div>
      
      </div>
    </div>
  </div>
  {{-------------- Start Ajouter Debour --------------}}
  <div class="modal fade" id="AjouterDebour" tabindex="-1" role="dialog" aria-labelledby="debour" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="debour">Ajouter debour</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  id="addFormDebour" action="{{route('storeDebour')}}" enctype="multipart/form-data" method="post" >
          {{csrf_field()}}
        <div class="modal-body">
          
          <div class="form-group ">
            <label for="recipient-name" class="col-form-label">Code facture:</label><br>
          <input id="libelle" type="text" name="code_facture" class="form-control "  >
          </div>
              <div class="form-group ">
                <label for="recipient-name" class="col-form-label">libellé:</label><br>
              <input id="libelle" type="text" name="libelle_NT" class="form-control " >
              </div>
              <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Montant :</label><br>
                <input id="montant" type="number" name="montant" class="form-control " >
              </div>
        
              <div class="form-group ">
                <label for="recipient-name" class="col-form-label">Type comptable:</label><br>
                <input type="text" id="type_comptable" name="type_comptable" class="form-control " >
              </div>
           
              
         
        </div>
      </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="ajouterDebour" type="submit"  form="addFormDebour" class="btn btn-primary sauvegarder">Enregistrer</button>
        </div>
      
      </div>
    </div>
  </div>
  {{-------------- end Ajouter Debour --------------}}
    {{-------------- Start modifier Debour --------------}}

@endsection
@section('js')
<script>
$(function() {
				var montant_HT,TVA;
				$("#montant_HT").on("focusout",function(){
					montant_HT = parseFloat($(this).val());
				});
				$("input[name='taux_TVA']").change(function(){
					if(this.checked) {
						TVA = parseFloat($(this).val());
						var TTC = montant_HT + (montant_HT * TVA / 100)
						$("input[name='montant_TTC']").val(TTC);
					}
				});
			});
	function actionFormatter(value, row, index) {
        action = [
			'<button type="button" class="btn ajouter btn-light bg-white"  data-toggle="modal" data-target="#modalAjouter"><i class="fa fa-plus"></i></button>',
			'<button  type="button" class="btn modifier btn-light bg-white"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit "></i></button>',
			'<button type="button" class="btn supprimer btn-light bg-white"><i class="fa fa-trash "></i></button>',
        ];
       
        return action.join("");
	};
  function actionFormatter2(value, row, index) {
        action = [
			'<button type="button" class="btn ajouter btn-light bg-white"  data-toggle="modal" data-target="#AjouterDebour"><i class="fa fa-plus"></i></button>',
			'<button  type="button" class="btn modifier btn-light bg-white"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit "></i></button>',
			'<button type="button" class="btn supprimer btn-light bg-white"><i class="fa fa-trash "></i></button>',
        ];
       
        return action.join("");
	};


  

	window.actionEvents = {
        "click .modifier": function(e, value, row, index) {
            $("input[name='id']").val(row.id);
            $("#libelle").val(row.libelle);
            $("#montant_HT").val(row.montant_HT);
           // $("input[name='taux_TVA']").prop("checked").val(row.taux_TVA);
            $("input[name='taux_TVA'][value='14']").val(row.taux_TVA).prop("checked",true);
            $("#type_comptable").val(row.type_comptable);
            $("#montant_TTC").val(row.montant_TTC);
            console.log(row);
          
        },
        "click .ajouter": function(e, value, row, index) {
          $("#code_facture").val(row.montant_TTC);
        
        },"click .supprimer": function(e, value, row, index) {

          var ok=confirm(" Etes-vous sûr de vouloir supprimer cet élément ?");
          if (ok){
            window.location = "/destroyTaxable/"+row.id;
            
          }else{

          }
           
          
          }
          
        
        
	};
 
		$(function() {
			$("#table").bootstrapTable({
       
				columns: [
          {
						field: "code_facture",
						title: "Code facture",
						sortable: true
					},	{
						field: "type_facture",
						title: "Type facture",
						sortable: true
					},  {
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
        url: "/api/detailFacture/"+{{$code}},
        
			});
		});
    $(function() {
			$("#table2").bootstrapTable({
				columns: [
          {
						field: "code_facture",
						title: "Code facture",
						sortable: true
					},
					{
						field: "libelle",
						title: "Libellé",
						sortable: true
					}, {
						field: "montant_HT",
						title: "Montant HT",
						sortable: true
					}, {
						field: "taux_TVA",
						title: "Taux TVA",
						sortable: true
					}, {
						field: "type_comptable",
						title: "Type comptable",
						sortable: true
					}
          , {
						field: "montant_TTC",
						title: "Montant TTC",
						sortable: true
					}
					, {
						
					
						formatter: actionFormatter,
            events: actionEvents
						
					}
				],
				url: "/api/detailTaxable/"+{{$code}} ,
       
			});
		});
    $(function() {
			$("#table3").bootstrapTable({
				columns: [
          {
						field: "code_facture",
						title: "Code facture",
						sortable: true
					},
					{
						field: "libelle_NT",
						title: "Libellé NT",
						sortable: true
					}, {
						field: "montant",
						title: "Montant",
						sortable: true
					}, {
						field: "type_comptable",
						title: "Type comptable",
						sortable: true
					}
					, {
						
						title:'' ,
						formatter: actionFormatter2,
          	events: actionEvents
						
					}
				],
				url: "/api/detailDebour/"+{{$code}} ,
			
			});
		});
	</script>
@endsection