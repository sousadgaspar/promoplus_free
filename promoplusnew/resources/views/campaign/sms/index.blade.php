@extends ( 'template.master' )

@section ('pageTitle')
 - Criar campanha por SMS
@endSection

@section ('content')


<!-- <div class="siteMap">
	<ul>
		
		<li><i class="fas fa-home"></i>In&iacute;cio</li>
		<li>Campanha</li>
		<li>SMS</li>

	</ul>
</div> -->


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

				<a href="/templates/">
					<img src="/image/template.svg"/>
				</a>
				
				<div class="clearfix"></div>
				<a href="/templates/">
					
				</a>
				<label>

					<a href="/templates/">
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