@extends ('template.master')

@section ('content')


	@include ('partials.failnotification')

	@include ('partials.successnotification')


	<!-- Create New VipCode -->
	<div class="card" id="newCampaignCard">

		<img class="icon" src="/image/sendcampaign.svg"> <span class="title">Nova campanha</span>
		

		<form id="" action="/campaign/sms/store" method="POST" accept-charset="utf-8">

			@csrf

			<div class="textInputInvisible">

				<label for="from">De:</label>

				<select name="from">
						
					<option value="{{Auth::user()->company->marketingName}}">{{Auth::user()->company->name}}</option>
				</select>
			
			</div>

			<div class="textInputInvisible">
				
				<label for="message">Mensagem: </label>
				<br>
				<textarea name="message">
					
					@if(isset($template))

						{{ $template }}

					@endIf

				</textarea>

			</div>


			@if(isset($distributionLists))
					
					<div class="textInputInvisible">
						<label for="toPreDefinedList">Destinat&aacute;rio(s): </label>
						<select type="text" name="toPreDefinedList">

							<option value="-1">Selecione a lista de clientes</option>
								<option value="all">todos os contactos</option>
								
							@foreach($distributionLists as $distributionList)

								<option value="{{$distributionList->id}}">
									{{ $distributionList->name }} 
									({{ count($distributionList->contacts) }} clientes)
								</option>

							@endForeach

						</select>
					</div>

			@endIf


			<div class="textInputInvisible">

				<label for="toRowList"> Digite ou cole os n&uacute;meros de telefone: um por linha. </label>
				<br>
				<textarea name="toRowList" placeholder="">
					
				</textarea>

			</div>




		<!-- 	@if(isset($distributionLists))
					
					<div class="textInputInvisible">
						<label for="distributionLists">Ou selecione listas: </label>
						<select multiple="multiple" name="distributionLists[]">

							@foreach($distributionLists as $distributionList)

								<option value="{{$distributionList->id}}">{{ $distributionList->name }}</option>

							@endForeach

						</select>
					</div>

			@endIf -->


			

			<!--<input id="vipCodeOwnerAgreeWithPrivacyPolicy" type="checkbox" name="vipCodeOwnerAgreeWithPrivacyPolicy" checked="checked"><label for="vipCodeOwnerAgreeWithPrivacyPolicy">Concordo com os termos de privacidade. </label>-->
			<br />
			<button id="sumitNewVipCodeForm" class="btn btnBase" name="sumitNewVipCodeForm" value="">Enviar</button>

		</form>
	</div><!-- End Create New VipCode -->

@endSection