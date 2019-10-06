@extends ('template.master')

@section ('content')


	@include ('partials.failnotification')

	@include ('partials.successnotification')


	<div class="whereYouAre">
		<hr>
			<div class="row">
				
				<div class="col-md-3">
					<a href="/dashboard">
						<img class="icon" src="/image/speedometer.svg">
						<span>DashBoard</span>
					</a>
				</div>

				<div class="col-md-3">
					<a href="/configuration">
						<img class="icon" src="/image/settings.svg">
						<span>Configurações</span>
					</a>
				</div>

				<div class="col-md-3">
					<img class="icon" src="/image/license.svg">
					<span>Solicita&ccedil;&otilde;es de Remetentes</span>
				</div>

			</div>
		<hr>
	</div>

	<div class="card" id="newCampaignCard">

		<img class="icon" src="/image/rating.svg"> <span class="title">Validar Remetentes</span>
		

		<div class="configurationOptions">

			@if(isset($pendingSenderIDs))

				@foreach($pendingSenderIDs as $senderID)

					<div class="row">
						<div class="col-md-12 rowEven">

							<span class="title-small"> 
								<strong>Remetenete: </strong> 
								{{ $senderID->senderid }}, {{ $senderID->created_at->diffForHumans() }}
							</span>

							<form method="POST" action="/senderid/approve">

								@csrf

								<input type="hidden" name="companyId" value="{{ \Auth()->user()->company->id }}">

								<input type="hidden" name="status" value="1">

								<input type="hidden" name="senderID" value="{{ $senderID->id }}">

								<input type="submit" class="btnGreen" name="" value="Aprovar">
							</form>

							<form method="POST" action="/senderid/decline">

								@csrf

								<input type="hidden" name="companyId" value="{{ \Auth()->user()->company->id }}">

								<input type="hidden" name="status" value="1">

								<input type="hidden" name="senderID" value="{{ $senderID->id }}">

								<input type="submit" class="btnRose" name="" value="Rejeitar">
							</form>

						</div>
					</div>

				@endForeach

			@endIf

		</div>
		


	</div><!-- End Create New VipCode -->

@endSection