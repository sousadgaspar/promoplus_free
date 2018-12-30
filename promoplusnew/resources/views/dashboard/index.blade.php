@extends ( 'template.master' )

@section ('content')

<div class="card" id="dashborad-card">
	<div id="dashBoardIconContainer">
		<div id="" class="row">
			<!-- dashboard icons -->
			<div id="newVipCodeIcon" class="col-xs-6 col-md-6">

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
			
			<div id="validateVipCodeIcon" class="col-xs-6 col-md-6">

				<a href="/contact">
					<img src="/image/addcontacts.svg"/>
				</a>
				
				<div class="clearfix"></div>

				<a href="/contact">
					<label>Contactos</label>
				</a>
				
			</div>
		</div><!-- End row -->
		
		<br />
		
		<div id="" class="row">
			<!-- dashboard icons -->
			<div id="reportsVipCodeIcon" class="col-xs-6 col-md-6">
				<a href="/list">
					<img src="/image/managelists.svg"/>
				</a>
				<div class="clearfix"></div>
				<label>
					<a href="/list">
						Listas de distribuição
					</a>
				</label>
			</div>
			
			<div id="configurationVipCodeIcon" class="col-xs-6 col-md-6">
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
		
		<br />
		
	</div><!-- End dashborad-card -->
</div>

@endSection