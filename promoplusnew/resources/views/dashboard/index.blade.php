@extends ( 'template.master' )

@section ('content')

<div class="whereYouAre">
	<hr>
		<div class="row">
			
			<div class="col-md-4">
				<img class="icon" src="/image/speedometer.svg">
				<span>DashBoard</span>
			</div>

		</div>
	<hr>
</div>

<div class="card" id="dashborad-card">


	<div id="dashBoardIconContainer">
		<div id="" class="row">
			<!-- dashboard icons -->
			<div id="newVipCodeIcon" class="col-xs-4 col-md-4">

				<a href="/campaign/sms">
					<img src="/image/campaign.svg"/>
				</a>

				<div class="clearfix"></div>

				<label>
					<a href="/campaign/sms">
						Campanhas por SMS
					</a>
				</label>

			</div>
			
			<div id="validateVipCodeIcon" class="col-xs-4 col-md-4">

				<a href="/contact">
					<img src="/image/addcontacts.svg"/>
				</a>
				
				<div class="clearfix"></div>

				<a href="/contact">
					<label>Contactos</label>
				</a>
				
			</div>


			<!-- dashboard icons -->
			<div id="configurationVipCodeIcon" class="col-xs-4 col-md-4">
				<a href="/configuration">
					<img src="/image/settings.svg"/>
				</a>
				<div class="clearfix"></div>
				<label>
					<a href="/configuration">
						Configura&ccedil;&otilde;es
					</a>
				</label>
			</div>
		</div><!-- End row -->
		
		<div id="" class="row">

		</div><!-- End row -->

		
		<br />
		
	</div><!-- End dashborad-card -->
</div>

@endSection