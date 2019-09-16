@extends ('template.master')

@section ('pageTitle')

 - Novo usu&accute;rio

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
					<img class="icon" src="/image/addcompanyuser.svg">
					<span>Novo parceiro</span>
				</div>

			</div>
		<hr>
	</div>


	<div class="card" id="dashborad-card">
		<div id="dashBoardIconContainer">


			@include ('partials.admin.dashboard')

			<form id="" action="/user/store" method="POST" accept-charset="utf-8">

				@csrf

				<div class="textInputInvisible">
					<label for="company_id"> Empresa </label>

					@if(isset($companies))

						<select name="company_id">
							
								@foreach($companies as $company)

									@if($company->name == 'PromoplusAdmin' || $company->name == 'PromoplusSeller')

										<option value="{{$company->id}}"> {{ $company->name }} </option>

									@else

										<option value="{{$company->id}}"> {{ $company->name }} </option>

									@endif

								@endForeach

						</select>

					@endIf

				</div>


				
				<div class="textInputInvisible">
					<label for="name">Nome </label>
					<input id="name" type="text" name="name" placeholder="Ex.: SGenial" value="">
				</div>

				<div class="textInputInvisible">
					<label for="role_id"> Categoria </label>

					@if(isset($roles))

						<select name="role_id">
							
								@foreach($roles as $role)

									@if(Auth::user()->role->name == 'Administrador')

										<option value="{{ $role->id }}"> {{ $role->name }} </option>

									@else

										
										@if(($role->name != 'Administrador') 
																		and 
																		($role->name != 'Reseller'))
											<option value="{{ $role->id }}"> {{ $role->name }} </option>

										@endif


									@endif

								@endforeach

						</select>

					@endIf

				</div>



				<div class="textInputInvisible">
					<label for="email"> E-mail </label>
					<input id="email" type="text" name="email" alt="" placeholder="Ex.: voce@suaempresa.co.ao" value="">
				</div>


				<div class="textInputInvisible">
					<label for="telephoneNumber">Telefone</label>
					<input id="telephoneNumber" type="text" name="telephoneNumber" placeholder="Ex.: 922999999" value="">
				</div>
				

				<div class="textInputInvisible">
					<label for="password">Defina uma senha</label>
					<input id="password" type="password" name="password" placeholder="" value="">
				</div>

				<input type="submit" id="submitCompany" class="btn btnBase" name="submitCompany" value="Gravar" />

			</form>
			
		</div><!-- End dashborad-card -->
	</div>


@endSection