
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
			<h2 id="titre" >Saisie facture</h2>
			<div class="container bg-white " style="border: 1px solid lightgrey; width:90%; ">
				<form  id="addForm" action="store" enctype="multipart/form-data" method="post" style="margin-left: 100px;width:100%;">
					{{ csrf_field() }}
				<div class="row">	
					<div class="form-group col-lg-4">
						<label for="recipient-name" class="col-form-label" >Type de la facture</label> <br>
						<select name="type_facture" class="form-control">
							<option value="standard">Standard</option>
							<option value="avoir">Avoir</option>
							<option  value="remplacement">Remplacement</option>
						</select>
					</div>
					<div class="form-group col-lg-4">
							<label for="recipient-name" class="col-form-label">Code de la facture:</label><br>
							<input type="text" name="code_facture" class="form-control " >
					</div>
					</div>

					<div class="row">
						<div class="form-group col-lg-4">
							<label for="recipient-name" class="col-form-label">Date de la facture:</label><br>
							<input type="date" name="date_facture" class="form-control " >
						</div>
						<div class="form-group col-lg-4">
							<label for="recipient-name" class="col-form-label">Date d'échéance:</label><br>
							<input type="date" name="date_echeance" class="form-control " >
						</div>
					</div>
				
					
				</form>
			</div>
			<button id="ajouter" type="submit"  form="addForm" class="btn sauvegarder" style="margin-left: 25em; margin-top: 10px ">
			Enregistrer
			</button>
		</div>
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
		</script>
@endsection