<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>VipCode <upper>Beta</upper></title>
  <link rel="manifest" href="/manifest.json">
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-grid-system.min.css">
  <!-- Add to home screen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Weather PWA">
  <link rel="apple-touch-icon" href="images/icons/icon-152x152.png">
</head>
<body>
  <header class="header">
   <div id="logo" class="logo">
   	VIPCode
   </div>
  </header>

  <main class="main container-fluid">
	 <br />
	 <br />
    <div class="card" id="dashborad-card">
	    <div id="dashBoardIconContainer">
	    	<div id="" class="row">
		    	<!-- dashboard icons -->
		    	<div id="newVipCodeIcon" class="col-xs-6">
		    		<img src="img/new-vip-code-icon.png"/>
		    		<div class="clearfix"></div>
		    		<label>Novo código Vip</label>
		    	</div>
		    	
		    	<div id="newVipCodeIcon" class="col-xs-6">
		    		<img src="img/validate-vip-code-icon.png"/>
		    		<div class="clearfix"></div>
		    		<label>Validar código Vip</label>
		    	</div>
	    	</div><!-- End row -->
	    	
	    	<br />
	    	
	    	<div id="" class="row">
		    	<!-- dashboard icons -->
		    	<div id="newVipCodeIcon" class="col-xs-6">
		    		<img src="img/vip-code-reports-icon.png"/>
		    		<div class="clearfix"></div>
		    		<label>Relat&oacute;rios</label>
		    	</div>
		    	
		    	<div id="newVipCodeIcon" class="col-xs-6">
		    		<img src="img/vip-code-configuration.png"/>
		    		<div class="clearfix"></div>
		    		<label>Configura&ccedil;&oacute;es</label>
		    	</div>
	    	</div><!-- End row -->
	    	
	    	<br />
	    	
	    	<div id="" class="row">
		    	<!-- dashboard icons -->
		    	<div id="newVipCodeIcon" class="col-xs-6">
		    		<img src="img/quit-vip-code-dash-board.png"/>
		    		<div class="clearfix"></div>
		    		<label>Sair</label>
		    	</div>
		  	</div><!-- End row -->
	    </div><!-- End dashborad-card -->
    </div>
	
	<div class="card notificationCard" id="successNotificationCard">
		{UserName}, Parab&eacute;ns!
		<br />
		<img class="" id="success-Icon" src="img/seccess-icon.png" />
		<br />
	
		O seu código VIP é:
		<b>BackToMoments#908765</b> Ao voltar ao {enterpriseName} receberá um desconto de {minDiscount}% e para cada amigo seu que vir ao {enterpriseName} com esse códigoVip o seu desconto aumenta e os seus amigos têm {minDiscount}% também.
		<br />
		Partilhe! Nos vemos em breve.
		<br />
		codigoVip válido até: {validTill}
	</div><!-- End Sucess-notification-card -->

	<!-- Fail notification  card -->
	<div class="card notificationCard" id="failNotificationCard">
		O código VIP 
		<br />
		<img class="" id="error-Icon" src="img/error-icon.png" />
		<br />
		<b>DeVoltaAoMoments#908765</b>
		<br />
		Já não é válido :(
	</div><!-- End Fail notification  card -->
	
	  <!-- NewVipCodeBtnCard -->
	  <div class="card" id="newVipCodeBtnCard">
	  	<button class="btn btnBase">Novo VipCode</button>
	  </div><!-- End NewVipCodeBtnCard -->
	  
	  <!-- Create New VipCode -->
	  <div class="card" id="createNewVipCodeForm">
		<button class="closeCard">X</button>
	  	<form action="" method="post" accept-charset="utf-8">
		  <span class="formTitle">Novo c&oacute;digo Vip</span>
		  <br />
		  <br />
		  <div class="textInputInvisible">
		  	<label for="vipCodeOwnerName">Nome: </label><input id="vipCodeOwnerName" type="text" name="vipCodeOwnerName" placeholder="Ex. Paulo Júnior" value="">
		  </div>
		  <div class="textInputInvisible">
		  	<label for="vipCodeOwnerTelephone">Telef: </label><input id="vipCodeTelephone" type="text" name="vipCodeTelephone" placeholder="Ex. 923432XXX" value="">
		  </div>
		  <div class="textInputInvisible">
		  	<label for="vipCodeOwnerEmail">Email: </label><input id="vipCodeOwnerEmail" type="text" name="vipCodeOwnerEmail" placeholder="paulo.junior@sgenial.co" value="">
		  </div>
		  <!--
		  <div class="textInputInvisible">
		  	<label for="vipCodeOwnerFaceBook">FaceBook: </label><input id="vipCodeOwnerFaceBook" type="text" name="vipCodeOwnerFaceBook" placeholder="www.faceboo.com/paulo.junior" value="">
		  </div>
		  <div class="textInputInvisible">
		  	<label for="vipCodeOwnerAddress">Endere&ccedil;o: </label><input id="vipCodeOwnerAddress" type="text" name="vipCodeOwnerAddress" placeholder="Alvalade, Rua do hotel Alvalade" value="">
		  </div>-->
		  <input id="vipCodeOwnerAgreeWithPrivacyPolicy" type="checkbox" name="vipCodeOwnerAgreeWithPrivacyPolicy" checked="checked"><label for="vipCodeOwnerAgreeWithPrivacyPolicy">Concordo com os termos de privacidade. </label>
		  <br />
		  <br />
		  <input type="submit" class="btn btnBase" name="sumitNewVipCodeForm" value="Novo c&oacute;digoVip" />

	  	</form>
	  </div><!-- End Create New VipCode -->
	  
	  <!-- Recomend vip Code to friends -->
	  <div class="card recomendVipCodeToFriendsCard" id="recomendVipCodeToFriendsCard">
		<button class="closeCard">X</button> 
	  	<form action="index.php" method="post" accept-charset="utf-8">
		  	<span class="formTitle">Recomendar amigos</span>
		  	<br />
		  	<br />
		  	<div class="textInputInvisible">
				<label for="attendeeName">Nome: </label><input id="attendeeName" type="text" name="attendeeName" placeholder="Ex. Paulo Júnior" value="">
			</div>
		  	<div class="textInputInvisible">
				<label for="attendeeTelephone">Telef: </label><input id="attendeeTelephone" type="text" name="attendeeTelephone" placeholder="Ex. 923432XXX" value="">
			</div>
			
			<hr />
			
			<div class="textInputInvisible">
				<label for="attendeeName">Nome: </label><input id="attendeeName" type="text" name="attendeeName" placeholder="Ex. Paulo Júnior" value="">
			</div>
		  	<div class="textInputInvisible">
				<label for="attendeeTelephone">Telef: </label><input id="attendeeTelephone" type="text" name="attendeeTelephone" placeholder="Ex. 923432XXX" value="">
			</div>
			
			<hr />
			
			<div class="textInputInvisible">
				<label for="attendeeName">Nome: </label><input id="attendeeName" type="text" name="attendeeName" placeholder="Ex. Paulo Júnior" value="">
			</div>
		  	<div class="textInputInvisible">
				<label for="attendeeTelephone">Telef: </label><input id="attendeeTelephone" type="text" name="attendeeTelephone" placeholder="Ex. 923432XXX" value="">
			</div>
			
			<hr />
			
			<div class="textInputInvisible">
				<label for="attendeeName">Nome: </label><input id="attendeeName" type="text" name="attendeeName" placeholder="Ex. Paulo Júnior" value="">
			</div>
		  	<div class="textInputInvisible">
				<label for="attendeeTelephone">Telef: </label><input id="attendeeTelephone" type="text" name="attendeeTelephone" placeholder="Ex. 923432XXX" value="">
			</div>
			<br />
			<input type="submit" class="btn btnBase" name="ShareVipCodeForm" value="Partilhar desconto" />
		  </form>
	  </div><!-- End Recomend vip Code to friends -->
	  
	  <!-- standardReportCard -->
	  <div class="card standardReportCard" id="standardReportCard">
	  	<div class="standardReportCardHeader" id="standardReportCardHeader">
		  	<label>Desempenho do VipCode</label>
	  	</div>
	  	<div id="" class="standardReportCardBody">
	  		<p><b>DeVoltaAoMoments#908765</b></p>
	  		
	  		<div id="numberOfVipCodesIndications">
	  			<p><span class="number">4</span><span class="label">
		  			<br />Indica&ccedil;&otilde;es</span>
	  			</p>
	  		</div>
	  	</div>
	  </div><!-- End standardReportCard -->
	  
	  <!-- validate vipcode card -->
	  <div class="card validateVipCodeCard" id="validateVipCodeCard">
	  	<button class="closeCard">X</button> 
	  	<form action="index.php" method="post" accept-charset="utf-8">
		  	<span class="formTitle">Validar VipCode</span>
		  	<br />
		  	<br />
		  	<div class="textInputInvisible">
				<label for="vipCode">BackTo{enterprise}# </label><input id="vipCode" type="number" name="vipCode" placeholder="Ex. 87626554324345" value="">
			</div>
			
			<hr />
			
			<div class="textInputInvisible">
				<label for="name">Nome: </label><input id="name" type="text" name="name" placeholder="Ex. Paulo Júnior" value="">
			</div>
		  	<div class="textInputInvisible">
				<label for="attendeeTelephone">Telef: </label><input id="attendeeTelephone" type="text" name="attendeeTelephone" placeholder="Ex. 923432XXX" value="">
			</div>
			<br />
			<input type="submit" class="btn btnBase" name="ShareVipCodeForm" value="Validar VipCode" />
		  	
	  	</form>
	  </div><!-- End validate vipcode card -->
 
  </main>
  


  <div class="dialog-container">
  . . .
  </div>

  <div class="loader">
    <svg viewBox="0 0 32 32" width="32" height="32">
      <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
    </svg>
  </div>

  <!-- Insert link to app.js here -->
</body>
</html>