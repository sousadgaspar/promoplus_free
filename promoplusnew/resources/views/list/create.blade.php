@extends ('template.master')

@section ('pageTitle')

 - Criar lista de distribuição

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

			<div class="col-md-3">
				<a href="/list">
					<img class="icon" src="/image/addlist.svg">
					<span>Listas</span>
				</a>
			</div>

			<div class="col-md-3">
				<img class="icon" src="/image/managelists.svg">
				<span>adicionar</span>
			</div>

		</div>
	<hr>
</div>



	<div class="card" id="dashborad-card">
		<div id="dashBoardIconContainer">

			@include ('partials.failnotification')

			@include ('partials.successnotification')

			@include ('partials.contactmenu')


			<form id="" action="/list/store" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

				@csrf
				
				<div class="textInputInvisible">
					<label for="name">Nome da lista </label>
					<input id="listName" type="text" name="name" placeholder="clientes que compraram perfumes" value="">
				</div>

				<div class="textInputInvisible">
					<label for="description">Fa&ccedil;a uma descri&ccedil;&atilde;o </label>
					<br>
					<textarea cols="3" rows="3" id="to" type="text" name="description" placeholder="Ex: Clientes que compraram perfumes em faze de promo&ccedil;&atilde;o">

					</textarea>
				</div>

				<div class="textInputInvisible">
					<label for="description">Carregue um fecheiro com n&uacute;meros </label>
					<br>
					<input type="file" name="list">
				</div>

				<button id="sumitNewVipCodeForm" class="btn btnBase" name="sumitNewVipCodeForm" value="">Enviar</button>

			</form>
			
		</div><!-- End dashborad-card -->
	</div>


@endSection