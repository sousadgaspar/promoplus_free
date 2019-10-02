<?php
	//session_start();
	//if(($_SESSION['logged'] == false) && is_null($_SESSION['name']) && is_null($_SESSION['mobilePhone']) && is_null($_SESSION['enterpriseId'])) {
		//header("Location: /index.php");
		
		
	// }
?>


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
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/chartist.css">
  <!-- Add to home screen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="VIPCode">
  <link rel="apple-touch-icon" href="images/icons/icon-152x152.png">
</head>
<body>

	<!-- start app header -->
	<header class="appHeader" id="appHeader">
		<div id="logo">
			<img src="image/logo-vip-code-horizontal-white.png" />
		</div>
	</header><!-- End start app header -->


  <!-- menuTableContent 
  <div class="" id="menuTableContent">
	<br />
	<br />
	<br />
  	<ul>
	  	<?php 
		  	var_dump($_SESSION);
	  	?>
	  	<li><a href="#"><i class="fa fa-bug" aria-hidden="true"></i>Menu #1</a></li>
	  	<li><a href="#">Menu #2</a></li>
	  	<li><a href="#">Menu #3</a></li>
	  	<li><a href="#">Menu #4</a></li>
	  	<li><a href="#">Menu #5</a></li>
	  	<li><a href="#">Menu #6</a></li>
	  	<li><a href="#">Menu #7</a></li>
  	</ul>
  </div> <!-- End menuTableContent -->

  <main class="mainApp container-fluid">
	 
	<!-- Debug -->
	<?php 
	 //var_dump($_SESSION);
	?>
	<!-- End dashborad-card -->
    <div class="card" id="dashborad-card">
	    <div id="dashBoardIconContainer">
	    	<div id="" class="row">
		    	<!-- dashboard icons -->
		    	<div id="newVipCodeIcon" class="col-xs-6 col-md-6">
		    		<img src="image/new-vip-code-icon.png"/>
		    		<div class="clearfix"></div>
		    		<label>Novo código Vip</label>
		    	</div>
		    	
		    	<div id="validateVipCodeIcon" class="col-xs-6 col-md-6">
		    		<img src="image/validate-vip-code-icon.png"/>
		    		<div class="clearfix"></div>
		    		<label>Validar código Vip</label>
		    	</div>
	    	</div><!-- End row -->
	    	
	    	<br />
	    	
	    	<div id="" class="row">
		    	<!-- dashboard icons -->
		    	<div id="reportsVipCodeIcon" class="col-xs-6 col-md-6">
		    		<img src="image/vip-code-reports-icon.png"/>
		    		<div class="clearfix"></div>
		    		<label>Relat&oacute;rios</label>
		    	</div>
		    	
		    	<div id="configurationVipCodeIcon" class="col-xs-6 col-md-6">
		    		<img src="image/vip-code-configuration.png"/>
		    		<div class="clearfix"></div>
		    		<label>Configura&ccedil;&otilde;es</label>
		    	</div>
	    	</div><!-- End row -->
	    	
	    	<br />
	    	
	    	<div id="" class="row">
		    	<!-- dashboard icons -->
		    	<div id="quitVipcodeDashIcon" class="col-xs-6 col-md-6">
		    		<a href="" alt="sair do vipCode App"><img src="image/quit-vip-code-dash-board.png"/></a>
		    		<div class="clearfix"></div>
		    		<label>Sair</label>
		    	</div>
		  	</div><!-- End row -->
	    </div><!-- End dashborad-card -->
    </div>
	
	<!-- successNotificationCard -->
	<div class="card notificationCard" id="successNotificationCard">
		{UserName}, Parab&eacute;ns!
		<br />
		<img class="" id="success-Icon" src="image/seccess-icon.png" />
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
	  <div class="card" id="createNewVipCodeFormCard">
		<button id="createNewVipCodeFormCloseCard" class="closeCard">X</button>
	  	<form id="createNewVipCodeForm" action="" method="post" accept-charset="utf-8">
		  <span class="formTitle">Novo c&oacute;digo Vip</span>
		  <br />
		  <br />
		  <div class="textInputInvisible">
		  	<label for="vipCodeOwnerName">Nome: </label><input id="vipCodeOwnerName" type="text" name="vipCodeOwnerName" placeholder="Ex. Paulo Júnior" value="">
		  	<label id="alertVipCodeOwnerName"></label>
		  </div>
		  <div class="textInputInvisible">
		  	<label for="vipCodeOwnerTelephone">Telef: </label><input id="vipCodeTelephone" type="text" name="vipCodeTelephone" placeholder="Ex. 923432XXX" value="">
		  	<label id="alertVipCodeOwnerTelephone"></label>
		  </div>
		  <div class="textInputInvisible">
		  	<label for="vipCodeOwnerEmail">Email: </label><input id="vipCodeOwnerEmail" type="text" name="vipCodeOwnerEmail" placeholder="paulo.junior@sgenial.co" value="">
		  	<label id="alertVipCodeOwnerEmail"></label>
		  </div>
		  <!--<input id="vipCodeOwnerAgreeWithPrivacyPolicy" type="checkbox" name="vipCodeOwnerAgreeWithPrivacyPolicy" checked="checked"><label for="vipCodeOwnerAgreeWithPrivacyPolicy">Concordo com os termos de privacidade. </label>-->
		  <br />
		  <br />
		  <button id="sumitNewVipCodeForm" class="btn btnBase" name="sumitNewVipCodeForm" value="">VIPCode</button>

	  	</form>
	  </div><!-- End Create New VipCode -->
	  
	  <!-- Recomend vip Code to friends -->
	  <div class="card recomendVipCodeToFriendsCard" id="recomendVipCodeToFriendsCard">
		<button id="recomendVipCodeToFriendsCardCloseCard" class="closeCard">X</button> 
		<br />
	  	<form action="index.php" method="post" accept-charset="utf-8">
		  	<input id="vipCodeToRecomend" type="hidden" name="vipCodeToRecomend" value="">
		  	<div class="textInputInvisible">
				<label for="attendeeName">Nome: </label><input id="attendeeName" type="text" name="attendeeName" placeholder="Ex. Paulo Júnior" value="">
				<label id="alertAttendeeName"></label>
			</div>
		  	<div class="textInputInvisible">
				<label for="attendeeTelephone">Telef: </label><input id="attendeeTelephone" type="text" name="attendeeTelephone" placeholder="Ex. 923432XXX" value="">
				<label id="alertAttendeeTelephone"></label>
			</div>
			
			<hr />
			
			<div class="textInputInvisible">
				<label for="attendeeName">Nome: </label><input id="attendeeName" type="text" name="attendeeName" placeholder="Ex. Paulo Júnior" value="">
				<label id="alertAttendeeTelephone"></label>
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
	  
	  <!-- basicReportCard -->
	  <div class="" id="basicReportCard">
		<button id="basicReportCardCloseCard" class="closeCard">X</button> 
	  	<div class="mainGraph row" id="mainGraph">
	  		<div class="col-xs-12" id="mainChart">
	  			
	  		</div>
	  		<div class="col-xs-12" id="auxChart">
	  			
	  		</div>
	  	</div>
	  </div><!-- End basicReportCard -->
	  
	  <!-- Form load report -->
	  <div class="card" id="formLoad">
	  	<form action="" method="post" accept-charset="utf-8">
		  	<button id="formLoadCloseCard" class="closeCard">X</button> 
		  	<br />

		  	<label class="formTitle">Selecione um intervalo para o relat&oacute;rio</label>
	  		<div class="textInputInvisible">
	  			<label for="fromDate">De:</label><input id="fromDate" type="date" name="fromDate" value="">
	  			<label id="alertFromDate"></label>
	  		</div>
	  		<div class="textInputInvisible">
	  			<label for="toDate">Para:</label><input id="toDate" type="date" name="toDate" value="">
	  			<label id="alertToDate"></label>
	  		</div>
	  		
	  		<br />
			<input type="submit" id="generateVipCodeReport" class="btn btnBase" name="generateVipCodeReport" value="Gerar relat&oacute;rio" />
	  	</form>
	  </div><!-- End Form load report -->
	  
	  <!-- report singleKPIReportCard -->
	  <div id="reportContainer" class="container-fluid">
		  <div class="row">
		  	<!-- singleKPIReportCard -->
				<div class="singleKPIReportCard col-xs-4">
					<span>VIPCode's emitidos</span>
					<br />
					<label id="totalGeneratedVipCode"></label>
				</div>
				<div class="singleKPIReportCard col-xs-4">
					<span>VIPCode's retornados</span>
					<br />
					<label id="totalNumberOfAttendees"></label>
				</div>
				<div class="singleKPIReportCard col-xs-4">
					<span>Taxa de retorno global  </span>
					<br />
					<label id="vipCodeReturnRate"></label>
				</div>
			  </div><!-- End singleKPIReportCard -->
		  </div>
		  
		  	
	  </div><!-- End report container -->
	  
	  <!-- validate vipcode card -->
	  <div class="card validateVipCodeCard" id="validateVipCodeCard">
	  	<button id="validateVipCodeCardCloseCard" class="closeCard">X</button> 
	  	<form action="index.php" method="post" accept-charset="utf-8">
		  	<span class="formTitle">Validar VipCode</span>
		  	<br />
		  	<br />
		  	<div class="textInputInvisible">
				<label for="vipCode">VIPCode</label>
				<input 	id="vipcode" 
						type="text" 
						name="vipCode" 
						value="voltoAo<?=ucfirst(strtolower($_SESSION['enterpriseName']))?>#" 
						placeholder="Ex. 87626554324345" value="">
				<label id="alertVipcode"></label>
			</div>
			
			<hr />
			
			<div class="textInputInvisible">
				<label for="name">Nome: </label><input id="name" type="text" name="name" placeholder="Ex. Paulo Júnior" value="">
				<label id="alertName"></label>
			</div>
		  	<div class="textInputInvisible">
				<label for="telephone">Telef: </label><input id="telephone" type="text" name="telephone" placeholder="Ex. 923432XXX" value="">
				<label id="alertTelephone"></label>
			</div>
			<div class="textInputInvisible">
				<label for="invoiceValue">Valor da factura: </label><input id="invoiceValue" type="text" name="invoiceValue" placeholder="" value="">
				<label id="alertInvoiceValue"></label>
			</div>
			<br />
			<button class="btn btnBase" id="validateVipCode" name="ShareVipCodeForm">Validar VipCode</button>
		  	
	  	</form>
	  </div><!-- End validate vipcode card -->
	  
	  <!-- newEnterpriseCard -->
	  <div class="card newEnterpriseCard" id="newEnterpriseCard">
	  	<button id="newEnterpriseCardCloseCard" class="closeCard">X</button> 
	  	<form action="index.php" method="post" accept-charset="utf-8">
		  	<span class="formTitle">Cadastrar novo Estabelecimento</span>
		  	<br />
		  	<br />
		  	<div class="textInputInvisible">
				<label for="enterpriseName">Nome: </label><input id="enterpriseName" type="text" name="enterpriseName" placeholder="Ex. SGenial, SA" value="">
				<label id="alertEnterpriseName"></label>
			</div>
			<div class="textInputInvisible">
				<label for="enterpriseLegalNumber">NIF: </label><input id="enterpriseLegalNumber" type="text" name="enterpriseLegalNumber" placeholder="Ex. 88766122671" value="">
				<label id="alertEnterpriseLegalNumber"></label>
			</div>
			<div class="textInputInvisible">
				<label for="enterpriseAddress">Endere&ccedil;o: </label><input id="enterpriseAddress" type="text" name="enterpriseAddress" placeholder="Ex. Av. Combatentes. Rua X, Luanda, Angola" value="">
				<label id="alertEnterpriseAddress"></label>
			</div>
			<div class="textInputInvisible">
				<label for="enterpriseTelephone">Telef: </label><input id="enterpriseTelephone" type="text" name="enterpriseTelephone" placeholder="Ex. 923432XXX" value="">
				<label id="alertEnterpriseAddress"></label>
			</div>
			<div class="textInputInvisible">
				<label for="enterpriseTelephone">Telef: </label><input id="enterpriseTelephone" type="text" name="enterpriseTelephone" placeholder="Ex. 912432XXX" value="">
				<label id="alertEnterpriseTelephone"></label>
			</div>
			<div class="textInputInvisible">
				<label for="enterpriseEmail">Email: </label><input id="enterpriseEmail" type="text" name="enterpriseEmail" placeholder="Ex. falecom@sgenial.co" value="">
				<label id="alertEnterpriseEmail"></label>
			</div>
			<div class="textInputInvisible">
				<label for="enterpriseWebSite">WebSite: </label><input id="enterpriseWebSite" type="text" name="enterpriseWebSite" placeholder="Ex. www.sgenial.co" value="">
				<label id="alertEnterpriseWebSite"></label>
			</div>
			
			
			<hr />
			
			<div class="textInputInvisible">
				<label for="enterpriseManagerName">Nome do gestor: </label><input id="enterpriseManagerName" type="text" name="enterpriseManagerName" placeholder="Paulo J&uacute;nior" value="">
				<label id="alertEnterpriseManagerName"></label>
			</div>
			<div class="textInputInvisible">
				<label for="enterpriseManagerTelephone">Telef: </label><input id="enterpriseManagerTelephone" type="text" name="enterpriseManagerTelephone" placeholder="Ex. 923432XXX" value="">
				<label id="alertEnterpriseManagerTelephone"></label>
			</div>
			<div class="textInputInvisible">
				<label for="enterpriseManagerEmail">Email: </label><input id="enterpriseManagerEmail" type="text" name="enterpriseManagerEmail" placeholder="Ex. paulo.junior@gmail.com" value="">
				<label id="alertEnterpriseManagerEmail"></label>
			</div>
			
			<br />
			<input type="submit" class="btn btnBase" name="ShareVipCodeForm" value="Gravar novo estabelecimento" />

	  </div> <!-- End newEnterpriseCard -->
	  
	  <!-- configurationCard -->
	  <div class="card configurationCard" id="configurationCard">
	  	<button id="configurationCardCloseCard" class="closeCard">X</button> 
	  	<form action="" method="post" accept-charset="utf-8">
		  	<span class="formTitle">Configura&ccedil;&otilde;es do VIPCode</span>
		  	
		  	<br />
		  	<br />
		  	<hr />
		  	
		  	<div class="textInputInvisible">
				<label for="minDiscount">Desconto minimo (%): </label><input id="minDiscount" type="text" name="minDiscount" placeholder="8" value="">
				<label id="alertMinDiscount"></label>
			</div>
			<div class="textInputInvisible">
				<label for="maxDiscount">Desconto m&aacute;ximo (%): </label><input id="maxDiscount" type="text" name="maxDiscount" placeholder="15" value="">
				<label id="alertMaxDiscount"></label>
			</div>
				<div class="clearFix"></div>
			<div class="textInputInvisible">
				<label for="numberOfIndicationsForMaxDiscount">N&uacute;mero de indica&ccedil;&otilde;es para o cliente ganhar o Desconto m&aacute;ximo (%): </label><input id="numberOfIndicationsForMaxDiscount" type="number" name="numberOfIndicationsForMaxDiscount" placeholder="5" value="">
				<label id="alertNumberOfIndicationsForMaxDiscount"></label>
			</div>
			<div class="textInputInvisible">
				<label for="numberOfDaysForVipCodeExpire">Nº de dias para o VIPCode expirar: </label><input id="numberOfDaysForVipCodeExpire" type="text" name="numberOfDaysForVipCodeExpire" placeholder="30" value="">
				<label id="alertNumberOfDaysForVipCodeExpire"></label>
			</div>

			<br />
			<input type="submit" class="btn btnBase" id="saveVipCodeConfiguration" name="saveVipCodeConfiguration" value="Gravar configura&ccedil;&otilde;es" />
	  	</form>

	  </div><!-- End configurationCard -->
	  
 
  </main>
  <!--Footer-->
  <footer>
	  VIPCode. Um produto de <a href="http://www.sgenial.co" target="_blank">SGenial.co</a>
  </footer><!--End Footer-->
  
  <!-- JS scrips -->
  <script src="js/jquery.js"></script>
  <script src="js/chartist.min.js"></script>
  <script src="js/app.js"></script>
</body>
</html>