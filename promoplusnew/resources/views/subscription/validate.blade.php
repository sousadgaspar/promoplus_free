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
					<span>Subscri&ccedil;&otilde;es pendentes</span>
				</div>

			</div>
		<hr>
	</div>


	<!-- Create New VipCode -->
	<div class="card" id="newCampaignCard">

		<img class="icon" src="/image/license.svg"> <span class="title">Validar Subscri&ccedil;&atilde;o</span>
		

		<div class="configurationOptions">

			@if(isset($subscriptionRequests))
			
				@foreach($subscriptionRequests as $subscriptionRequest)

					<div class="row">
						<div class="col-md-12 rowEven">
							<a href="/public/paymentconfimations/{{ $subscriptionRequest->paymentConfirmationDocument }}">
								{{ $subscriptionRequest->company->name }}
							</a>

							<a href="">
								Plano: {{ $subscriptionRequest->plan->name }}
							</a>

							<a href="">
								Valor: {{ number_format($subscriptionRequest->plan->price, 2, ',', '.')}} Kz
							</a>
							<span class="title-small"> 
								{{ $subscriptionRequest->status }}
							</span>
							<br>

							<a target="_new" href="/storage/paymentconfimations/{{ $subscriptionRequest->paymentConfirmationDocument }}">
								Comprovativo de pagamento
							</a>

							<form method="POST" action="/subscription/approve">

								@csrf

								<input type="hidden" name="companyId" value="{{ $subscriptionRequest->company->id }}">

								<input type="hidden" name="planId" value="{{ $subscriptionRequest->plan->id }}">

								<input type="hidden" name="status" value="approved">

								<input type="hidden" name="requestId" value="{{ $subscriptionRequest->id }}">

								<input type="submit" class="btnGreen" name="" value="Aprovar">
							</form>

							<form method="POST" action="/subscription/decline">

								@csrf

								<input type="hidden" name="companyId" value="{{ $subscriptionRequest->company->id }}">

								<input type="hidden" name="planId" value="{{ $subscriptionRequest->plan->id }}">

								<input type="hidden" name="status" value="declined">

								<input type="hidden" name="requestId" value="{{ $subscriptionRequest->id }}">

								<input type="submit" class="btnRose" name="" value="Rejeitar">
							</form>

						</div>
					</div>

				@endForeach

			@endIf

		</div>
		


	</div><!-- End Create New VipCode -->

@endSection