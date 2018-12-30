@extends ('template.master')

@section ('pageTitle')

 - Criar lista de distribuição

@endSection



@section ('content')





	<div class="card" id="dashborad-card">
		<div id="dashBoardIconContainer">

			@include ('partials.failnotification')

			@include ('partials.successnotification')

			@include ('partials.contactmenu')


			<form id="" action="/list/store" method="POST" accept-charset="utf-8">

				@csrf
				
				<div class="textInputInvisible">
					<label for="name">Nome da lista </label>
					<input id="listName" type="text" name="name" placeholder="clientes que compraram perfumes" value="">
				</div>

				<div class="textInputInvisible">
					<label for="description">Fa&ccedil;a uma descri&ccedil;&atilde;o </label>
					<br>
					<textarea cols="3" rows="3" id="to" type="text" name="from" placeholder="Clientes que compraram perfumes em faze de promo&ccedil;&atilde;o">

					</textarea>
				</div>

				<button id="sumitNewVipCodeForm" class="btn btnBase" name="sumitNewVipCodeForm" value="">Enviar</button>

			</form>
			
		</div><!-- End dashborad-card -->
	</div>


@endSection