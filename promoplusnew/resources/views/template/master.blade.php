<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PromoPlus @yield ('pageTitle')</title>
	<link rel="manifest" href="/manifest.json">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-grid-system.min.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/chartist.css">
	<!-- Add to home screen for Safari on iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="VIPCode">
	<link rel="apple-touch-icon" href="/images/icons/icon-152x152.png">
</head>
<body>

	<!-- start app header -->
	<header class="appHeader" id="appHeader">
		

		<nav class="mainMenu">
			
			<ul>

				@if(!Auth::check())

					<li id="logo">
						<a href="/">
							
							<img src="/image/promopluslogo.svg" />
							<span>PromoPlus</span>

						</a>
						
					</li>

				@endIf
				
				


				@if(Auth::check())

					<li id="logo">
						<a href="/dashboard">
							
							<img src="/image/promopluslogo.svg" />
							<span>PromoPlus</span>

						</a>
						
					</li>

					<li><a href="/dashboard">Dashboard</a></li>

					<li><a href="/subscription">Subscri&ccedil;&atilde;o e estado</a></li>

					<li><a href="/logout" class="ml">logout</a></li>

				@endif

			</ul>

		</nav>

		<div class="loggedUser">
			
			@if(Auth::check()) 

				<!-- {{Auth::user()->name}} | {{Auth::user()->company->name}} -->

			@endif

		</div>
	</header><!-- End start app header -->


	<main class="mainApp container-fluid">

		@yield( 'content' )

	</main>
	<!--Footer-->
	<footer>
		PromoPlus. Um produto de <a href="http://www.sgenial.co" target="_blank">SGenial.co</a>
	</footer><!--End Footer-->

	<!-- JS scrips -->
<!-- 	<script src="/js/jquery.js"></script>
	<script src="/js/chartist.min.js"></script>
	<script src="/js/app.js"></script> -->
</body>
</html>