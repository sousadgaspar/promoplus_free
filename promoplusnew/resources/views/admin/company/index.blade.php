@extends ('template.master')

@section ('pageTitle')

 - gest&atilde;o da app

@endSection



@section ('content')


	@include ('partials.failnotification')

	@include ('partials.successnotification')


	<div class="card" id="dashborad-card">
		<div id="dashBoardIconContainer">


			@include ('partials.admin.dashboard')

			<form id="" action="/company/create" method="POST" accept-charset="utf-8">

				@csrf
				
				<div class="textInputInvisible">
					<label for="name">Nome da empresa </label>
					<input id="name" type="text" name="name" placeholder="Ex.: SGenial" value="">
				</div>

				<div class="textInputInvisible">
					<label for="marketingName">&Uacute;ltimo nome </label>
					<input id="marketingName" type="text" name="marketingName" alt="Nome que vai aparecer na mensagem para o cliente" placeholder="Ex.: SGenial" value="">
				</div>

				<div class="textInputInvisible">
					<label for="address">Endere&ccedil;o</label>
					<br>
					<input id="address" type="text" name="address" value="">
				</div>
				

				<input type="submit" id="submitCompany" class="btn btnBase" name="submitCompany" value="Gravar" />

			</form>
			
		</div><!-- End dashborad-card -->
	</div>


@endSection