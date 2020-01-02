@extends ('template.master')

@section ('pageTitle')

 - Histórico de campanha

@endSection



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
					<a href="/campaign/sms">
						<img class="icon" src="/image/sendcampaign.svg">
						<span>campanha por sms</span>
					</a>
				</div>

				<div class="col-md-3">
					<a href="/campaign/sms/history">
						<img class="icon" src="/image/return-to-the-past.svg">
						<span>hist&oacute;rico de campanhas</span>
					</a>
				</div>

			</div>
		<hr>
	</div>


	<div class="card" id="dashborad-card">
		<div id="dashBoardIconContainer">

			<div class="row">
				
				<div class="col-md-2"><strong>Data</strong></div>
				<div class="col-md-3"><strong>ID</strong></div>
				<div class="col-md-3"><strong>SMS</strong></div>
				<div class="col-md-1"><strong>Lista</strong></div>
				<div class="col-md-1"><strong>Enviadas</strong></div>
				<div class="col-md-1"><strong>Falhas</strong></div>
				<div class="col-md-1"><strong>Estado</strong></div>

			</div>

			@if($report) 

				@foreach($report as $campaign)

					<div class="row">
					
						<div class="col-md-2">{{ $campaign->date }}</div>
						<div class="col-md-3">{{ $campaign->campaign_id }}</div>
						<div class="col-md-3">{{ $campaign->sms_content }}</div>
						<div class="col-md-1"> {{ $campaign->list_size }} </div>
						<div class="col-md-1">{{ $campaign->sms_sent }}</div>
						<div class="col-md-1">{{ $campaign->errors }}</div>
						<div class="col-md-1">{{ ($campaign->sms_sent/$campaign->list_size) * 100 }}%</div>


					</div>

				@endForeach

			@else

				<p> Sem dados no hist&oacute;rico de campanhas</p>

			@endif
			
		</div><!-- End dashborad-card -->
	</div>

@endSection