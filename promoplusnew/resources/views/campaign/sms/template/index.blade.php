@extends ('template.master')

@section ('content')


	@include ('partials.failnotification')

	@include ('partials.successnotification')


	
	<div class="whereYouAre">
		<hr>
			<div class="row">
				
				<div class="col-md-4">
					<a href="/dashboard">
						<img class="icon" src="/image/speedometer.svg">
						<span>DashBoard</span>
					</a>
				</div>

				<div class="col-md-4">
					<img class="icon" src="/image/template.svg">
					<span>Modelos de SMS</span>
				</div>

			</div>
		<hr>
	</div>


	<!-- Create New VipCode -->
	<div class="card" id="newCampaignCard">

		<img class="icon" src="/image/template.svg"> <span class="title">Modelos de SMS</span>
		

		<form id="" action="/sms/template/create" method="POST" accept-charset="utf-8">

			@csrf

			<div class="textInputInvisible">
				
				<label for="message">Nova mensagem modelo: </label>
				<br>
				<textarea name="message">
					

				</textarea>

			</div>
			<button id="sumitNewVipCodeForm" class="btn btnBase" name="sumitNewVipCodeForm" value="">Guardar</button>

			

		</form>
		
		<hr>

		<div class="templates">
				

			@if(isset($templates))

				@foreach($templates as $template)

					<form method="GET" action="/campaign/sms/create">
						@csrf

						<div class="textInputInvisible">

							<textarea name="template">{{trim($template->template)}}</textarea>

						</div>
						<button id="sumitNewVipCodeForm" class="btnGray" name="sumitNewVipCodeForm" value="">Usar</button>
						
					</form>

					<hr>

				@endForeach

			@endIf

		</div>
		
	</div><!-- End Create New VipCode -->

@endSection