@extends ('template.master')

@section ('pageTitle')

 - Login

@endSection



@section ('content')

		
	@include('partials.successnotification')

	@include('partials.failnotification')

	
	<!-- login form -->
    <div class="card" id="loginCard">

    	<h1>
    		Login
    	</h1>
	    <form action="/session/store" method="POST" accept-charset="utf-8">

	    	@csrf

	    	<div class="textInputInvisible">

			  <label for="email">Email ou n&uacute;mero de telefone: </label><input id="userEmail" type="text" name="email" placeholder="" value="">
			  
			</div>
			<div class="textInputInvisible">

			  <label for="password">Pass: </label><input id="userPassword" type="password" name="password" placeholder="*********************************" value="">
			  
			</div>
			<br />
			<button id="btnRequestLogin" class="btn btnRose" name="login">Entrar</button>
		</form> 
    </div><!-- End login form -->


@endSection
