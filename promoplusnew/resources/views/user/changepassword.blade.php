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

			<form id="" action="/user/changepassword" method="POST" accept-charset="utf-8">

				@csrf


				<div class="textInputInvisible">

					<label for="password">
						Troque a senha. Digite uma nova senha 
					</label>

					<input 
						id="password" 
						type="text" 
						name="password" 
						placeholder="" 
						value="">

					<input 	id="id" 
							type="hidden" 
							name="id" 
							value="{{ Auth::user()->id }}"
							placeholder="" 
							value="">
				</div>


				<input 
					type="submit" 
					id="submitCompany" 
					class="btn btnBase" 
					name="submitCompany" 
					value="Alterar" />

			</form>
			
		</div><!-- End dashborad-card -->
	</div>


@endSection