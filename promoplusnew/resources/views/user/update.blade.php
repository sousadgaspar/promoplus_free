@extends ('template.master')

@section ('pageTitle')

 - Actualizar dados do usu&accute;rio

@endSection



@section ('content')


	@include ('partials.failnotification')

	@include ('partials.successnotification')


	<div class="card" id="dashborad-card">
		<div id="dashBoardIconContainer">


			@include ('partials.admin.dashboard')

			<form id="" action="/user/store" method="POST" accept-charset="utf-8">

				@csrf

				<div class="textInputInvisible">
					<label for="company_id"> Empresa </label>

					@if(isset($companies))

						<select name="company_id">

								@if(Auth::check())

								<option value="{{Auth::user()->company->id}}"> {{ Auth::user()->company->name }} - empresa actual </option>

								@endIf
							
								@foreach($companies as $company)

									<option value="{{$company->id}}"> {{ $company->name }} </option>

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

									<option value="{{ $role->id }}"> {{ $role->name }} </option>

								@endForeach

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