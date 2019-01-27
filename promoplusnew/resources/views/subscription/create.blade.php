@extends ( 'template.master' )


@section ('pageTitle')
 - Estado da subscri&ccedil;&atilde;o - {{ Auth::user()->company->name }}
@endSection


@section ('content')

<div class="card" id="dashborad-card">
	<div id="dashBoardIconContainer">
		
			<div id="" class="row">

				@if(isset($plan))

				<!-- dashboard icons -->
					<div id="reportsVipCodeIcon" class="col-xs-12 col-md-12 plan planSingular">
						
						<img class="" src="/image/{{$plan->image}}"/>

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

						<form method="POST" action="/subscription/request" enctype="multipart/form-data">
							
							@csrf

							<input type="hidden" name="planId" value="{{$plan->id}}">

							<input type="hidden" name="companyId" value="{{Auth::user()->company->id}}">
							
							<input type="file" class="uploadBTN" name="paymentConfirmationDocument" value="Enviar comprovativo de pagamento" />

							<input type="submit" id="submitCompany" class="btn btnBase" name="submitCompany" value="Enviar comprovativo de pagamento" />

						</form>
						
					</div>

				@endIf
				
				

			</div><!-- End row -->


			<hr>

		
		
		<br />
		
	</div><!-- End dashborad-card -->
</div>

@endSection