
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
            <form  id="updateForm" action="{{route('update', $facture->id)}}" enctype="multipart/form-data" method="post" style="margin-left: 100px;width:100%;">
					{{ csrf_field() }}
				<div class="row">	
					<div class="form-group col-lg-4">
						<label for="recipient-name" class="col-form-label" >Type de la facture</label> <br>
						<select name="type_facture" class="form-control" value="{{ $facture->type_facture }}">
							<option value="standard">Standard</option>
							<option value="avoir">Avoir</option>
							<option  value="remplacement">Remplacement</option>
						</select>
					</div>
					<div class="form-group col-lg-4">
							<label for="recipient-name" class="col-form-label">Code de la facture:</label><br>
							<input type="text" name="code_facture" class="form-control " value="{{ $facture->code_facture }}" >
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
					<br>
					<div class="form-group col-lg" style="margin-left:180px;">
						
						<div class="form-check form-check-inline">
							<label class="form-check-label">Taxable</label>
							<input type="radio" class="form-check-input ml-2" name="partie" value="taxable">
						</div>
						<div class="form-check form-check-inline">
							<label class="form-check-label">Debour</label>
							<input type="radio" class="form-check-input ml-2" name="partie" value="debour">
						</div>
					</div>
					
			<div class="row">		
					<div class="col-lg-6" >
						
						
						<div class="form-group col-lg-8">
							<label for="recipient-name" class="col-form-label">libellé:</label><br>
							<input type="text" name="libelle" class="form-control " >
						</div>
						<div class="form-group col-lg-8">
							<label for="recipient-name" class="col-form-label">Montant HT:</label><br>
							<input id="montant_HT" type="number" name="montant_HT" class="form-control " >
						</div>
						
						
						<div class="form-group col-lg-8">
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
						<div class="form-group col-lg-8">
							<label for="recipient-name" class="col-form-label">Type comptable:</label><br>
							<input type="text" name="type_comptable" class="form-control " >
						</div>
							<div class="form-group col-lg-8">
							<label for="recipient-name" class="col-form-label">Montant TTC:</label><br>
							<input type="text" name="montant_TTC" class="form-control " >
						</div>
						
					</div>
					<div class="col-lg-6">
						
						<div class="form-group col-lg-8">
							<label for="recipient-name" class="col-form-label">libellé non taxable:</label><br>
							<input type="text" name="libelle_NT" class="form-control " >
						</div>
						
						<div class="form-group col-lg-8">
							<label for="recipient-name" class="col-form-label">Montant :</label><br>
							<input type="numbert" name="montant" class="form-control " >
						</div>
						<div class="form-group col-lg-8">
							<label for="recipient-name" class="col-form-label">Type comptable:</label><br>
							<input type="text" name="type_comptable" class="form-control " >
						</div>
					</div>
					
				</div>	
					
				</form>
			</div>
			<button id="ajouter" type="submit"  form="updateForm" class="btn sauvegarder" style="margin-left: 25em; margin-top: 10px ">
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