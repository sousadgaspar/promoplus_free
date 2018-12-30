@extends ( 'template.master' )


@section ('pageTitle')
 - Estado da subscri&ccedil;&atilde;o - {{ Auth::user()->company->name }}
@endSection


@section ('content')

<div class="card" id="dashborad-card">
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