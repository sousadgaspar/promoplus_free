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
					<img class="icon" src="/image/settings.svg">
					<span>Configurações</span>
				</div>

			</div>
		<hr>
	</div>


	<!-- Create New VipCode -->
	<div class="card" id="newCampaignCard">

		<img class="icon" src="/image/settings.svg"> <span class="title">Configura&ccedil;&otilde;es</span>
		

		<div class="configurationOptions">
			
			@if((Auth::user()->role->name == 'Reseller') or (Auth::user()->role->name == 'Administrador'))

				<div class="row">
					<div class="col-md-12 rowOdd">
						<a href="/company/create">
							<img class="icon-small" src="/image/partnership.svg">
						</a>
						<span class="title-small"> 
							<a href="/company/create">Novo parceiro</a>
						</span>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 rowEven">
						<a href="/user/create">
							<img class="icon-small" src="/image/addcompanyuser.svg">
						</a>
						<span class="title-small"> 
							<a href="/user/create">Novo usu&aacute;rio</a>
						</span>
					</div>
				</div>

			@endIf
			

			<div class="row">
				<div class="col-md-12 rowOdd">
					<a href="/subscription">
						<img class="icon-small" src="/image/subscription.svg">
					</a>
					<a href="/subscription">
						<span class="title-small">Subscri&ccedil;&atilde;o</span>
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12 rowOdd">
					<a href="/senderid/create">
						<img class="icon-small" src="/image/recipient.svg">
					</a>
					<a href="/senderid/create">
						<span class="title-small">Novo Remetente</span>
					</a>
				</div>
			</div>
			

			@if(Auth::user()->role->name == 'Administrador')

				<div class="row">
					<div class="col-md-12 rowEven">
						<a href="/subscription">
							<img class="icon-small" src="/image/license.svg">
						</a>
						<a href="/subscription/validate">
							<span class="title-small">Subscri&otilde;es pendentes</span>
						</a>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 rowOdd">
						<a href="/senderid/review">
							<img class="icon-small" src="/image/rating.svg">
						</a>
						<a href="/senderid/review">
							<span class="title-small">Remetentes pendentes</span>
						</a>
					</div>
				</div>


			@endIf

		</div>
		


	</div><!-- End Create New VipCode -->

@endSection