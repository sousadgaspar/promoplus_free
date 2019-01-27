@extends ( 'template.master' )


@section ('pageTitle')
 - Estado da subscri&ccedil;&atilde;o - {{ Auth::user()->company->name }}
@endSection


@section ('content')

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
				<img class="icon" src="/image/subscription.svg">
				<span>Planos</span>
			</div>

		</div>
	<hr>
</div>

<div class="card" id="dashborad-card">


	<div id="dashBoardIconContainer">
		
			<div id="" class="row">

				@if(Auth::check() and Auth::user()->company->account) 

					<ul class="accountStatus">
						<li>
							
							<strong>Empresa: </strong> {{Auth::user()->company->name}}

						</li>
						<li>
							<strong>Saldo actual: </strong> {{Auth::user()->company->account->current_sms_balance}} SMS's
						</li>

						<li>
							<strong>V&aacute;lido at&eacute;: </strong> {{ Auth::user()->company->account->validTill }}
						</li>

						<li>
							<strong>Usu&aacute;rio: </strong> {{ Auth::user()->name }} ({{ Auth::user()->email }})
						</li>
					</ul>

				@endIf

			</div><!-- End row -->


			<hr>

		
		
		<br />
		
	</div><!-- End dashborad-card -->


	<div id="dashBoardIconContainer">
		
			<div id="" class="row">

				@foreach($plans as $plan)

				<!-- dashboard icons -->
					<div id="reportsVipCodeIcon" class="col-xs-4 col-md-4 plan">
						
						<img class="planImage" src="/image/{{$plan->image}}"/>

						<p class="planName">

								{{ $plan->name }}

						</p>

						<p class="smsAmount">
								
							{{ $plan->sms_amount }} 

							<small>SMS</small>

						</p>

						<p class="planPrice">
							
							{{ number_format($plan->price, 2, ',', '.') }} <small>Kz</small>

						</p>
						<br>

						<form method="POST" action="/subscription/create">
							
							@csrf

							<input type="hidden" name="planId" value="{{$plan->id}}">
							<input type="submit" id="submitCompany" class="btn btnBase" name="submitCompany" value="Subscrever" />

						</form>
						
					</div>

				@endForeach
				
				

			</div><!-- End row -->


			<hr>

		
		
		<br />
		
	</div><!-- End dashborad-card -->
</div>

@endSection