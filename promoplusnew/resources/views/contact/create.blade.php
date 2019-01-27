@extends ('template.master')

@section ('pageTitle')

 - Novo contacto

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
					<a href="/contact">
						<img class="icon" src="/image/addcontacts.svg">
						<span>contactos</span>
					</a>
				</div>

				<div class="col-md-3">
					<img class="icon" src="/image/addcontacts.svg">
					<span>adicionar</span>
				</div>

			</div>
		<hr>
	</div>


	<div class="card" id="dashborad-card">
		<div id="dashBoardIconContainer">


			@include ('partials.contactmenu')

			<form id="" action="/contact/store" method="POST" accept-charset="utf-8">

				@csrf
				
				<div class="textInputInvisible">
					<label for="firstName">Primeiro nome </label>
					<input id="firstName" type="text" name="firstName" placeholder="Ex.: Freddy" value="">
				</div>

				<div class="textInputInvisible">
					<label for="lastName">&Uacute;ltimo nome </label>
					<input id="lastName" type="text" name="lastName" placeholder="Ex.: Costa" value="">
				</div>

				<div class="textInputInvisible">
					<label for="mobilePhoneNumber">N&uacute;mero de telefone</label>
					<input id="mobilePhoneNumber" value="244" type="text" name="mobilePhoneNumber" placeholder="Ex.: 923555500" value="">
				</div>

				<!-- <div class="textInputInvisible">
					<label for="email">E-mail</label>
					<br>
					<input id="email" type="text" name="email" placeholder="Ex.: freddy.costa@promoplus.co.ao" value="">
				</div> -->

				<div class="textInputInvisible">
					<label for="anniversaryDate">Data de anivers&aacute;rio</label>
					<input id="anniversaryDate" type="date" name="anniversaryDate" value="">
				</div>


				<div class="textInputInvisible">
					<label for="gender">G&ecirc;nero</label>

					<select name="gender" id="gender">

						<option value="male">Homem</option>

						<option value="female">Mulher</option>
						
					</select>

				</div>


				@if(isset($distributionLists))

					<div class="textInputInvisible">
						<label for="gender">Selecione uma ou várias listas</label>

						<select multiple="multiple" name="distributionLists[]">

							<!-- <option value="all">todos os contactos</option> -->

							@foreach($distributionLists as $distributionList)

								<option value="{{$distributionList->id}}">{{ $distributionList->name }}</option>

							@endForeach

						</select>
					</div>

				@endIf
				

				<input type="submit" id="sumitNewVipCodeForm" class="btn btnBase" name="submitContact" value="Gravar" />

			</form>
			
		</div><!-- End dashborad-card -->
	</div>


@endSection