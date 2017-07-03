<?php
	
	session_start();
	if((@$_SESSION['logged'] == true) && !is_null($_SESSION['name']) && !is_null($_SESSION['mobilePhone']) && !is_null($_SESSION['enterpriseId'])) {
		header("Location: /app.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VipCode Beta :: Login</title>
  <link rel="manifest" href="/manifest.json">
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-grid-system.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <!-- Add to home screen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Weather PWA">
  <link rel="apple-touch-icon" href="images/icons/icon-152x152.png">
</head>
<body>
  <main class="main container-fluid" id="welcomeHomeScreen">
	<br />
	<br />
	<br />
	<br />
	
	<!-- home logo -->
	<div id="welcomeHomeLogo">
	   <img src="img/logo-vip-code-vertical.png" />
    </div><!-- End home logo -->
    
    <!-- login form -->
    <div class="card" id="login-card">
	    <form action="" method="post" accept-charset="utf-8">
	    	<div class="textInputInvisible">
			  <label for="email">Email: </label><input id="userEmail" type="text" name="email" placeholder="Ex. paulo.junior@gmail.com" value="">
			</div>
			<div class="textInputInvisible">
			  <label for="password">Pass: </label><input id="userPassword" type="password" name="password" placeholder="*********************************" value="">
			</div>
			<br />
			<button id="btnRequestLogin" class="btn btnRose" name="login">Entrar</button>
		</form> 
    </div><!-- End login form -->
    
	     
  </main>
  <!-- JS scrips -->
  <script src="js/jquery.js"></script>
  <script src="js/app.js"></script>
</body>
</html>