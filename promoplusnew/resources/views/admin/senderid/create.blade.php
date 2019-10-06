@extends ('template.master')

@section ('pageTitle')

 - Novo Remetente

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
					<a href="/configuration">
						<img class="icon" src="/image/settings.svg">
						<span>Configurações</span>
					</a>
				</div>

				<div class="col-md-3">
					<img class="icon" src="/image/recipient.svg">
					<span>Novo Rementente</span>
				</div>

			</div>
		<hr>
	</div>


	<div class="card" id="dashborad-card">
		<div id="dashBoardIconContainer">


			@include ('partials.admin.dashboard')

			<form id="" action="/senderid/store" method="POST" accept-charset="utf-8">

				@csrf
				
				<div class="textInputInvisible">
					<label for="name">Remetente </label>
					<input id="senderid" type="text" name="senderid" placeholder="Ex.: CocaCola" value="">
				</div>

				<div class="textInputInvisible">
					<label for="address">Regras para solicita&ccedil;&atilde;o de "Remetente"</label>
					<br>
					<textarea disabled="disabled">
						1 - Nao usar ....
						2 - Os pedidos 
						3 - Mais alguma coisa
					</textarea>
				</div>
				

				<input type="submit" id="submitCompany" class="btn btnBase" name="submitCompany" value="Gravar" />

			</form>
			
		</div><!-- End dashborad-card -->
	</div>


@endSection