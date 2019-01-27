@extends ( 'template.master' )

@section ('pageTitle')
 - Criar campanha por SMS
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

			<div class="col-md-4">
				<img class="icon" src="/image/sendcampaign.svg">
				<span>Campanha por SMS</span>
			</div>
		</div>

	<hr>
</div>


<div class="card" id="dashborad-card">
	<div id="dashBoardIconContainer">
		<div id="" class="row">
			<!-- dashboard icons -->
			<div id="newVipCodeIcon" class="col-xs-6 col-md-6">

				<a href="/campaign/sms/create">
					<img src="/image/sendcampaign.svg"/>
				</a>

				<div class="clearfix"></div>

				<label>
					<a href="/campaign/sms/create">
						Criar campanha
					</a>
				</label>

			</div>
			
			<div id="validateVipCodeIcon" class="col-xs-6 col-md-6">

				<a href="/sms/templates/">
					<img src="/image/template.svg"/>
				</a>
				
				<div class="clearfix"></div>
				<a href="/sms/templates/">
					
				</a>
				<label>

					<a href="/sms/templates/">
						Modelos
					</a>

				</label>
			</div>
		</div><!-- End row -->
		
		<br />
		
		<div id="" class="row">
			<!-- dashboard icons -->
			<div id="reportsVipCodeIcon" class="col-xs-6 col-md-6">
				<a href="/campaign/sms/history">
					
					<img src="/image/history.svg"/>

				</a>
				
				<div class="clearfix"></div>

				<label>
					<a href="/campaign/sms/history">
						Hist&oacute;rico
					</a>
				</label>

			</div>
			
			<div id="configurationVipCodeIcon" class="col-xs-6 col-md-6">

				<a href="/campaign/sms/report">

					<img src="/image/analysis.svg"/>

				</a>

				
				<div class="clearfix"></div>
				<label>
					<a href="/campaign/sms/report">
						Relat&oacute;rios
					</a>
				</label>
			</div>
		</div><!-- End row -->
		
		<br />
		
	</div><!-- End dashborad-card -->
</div>

@endSection