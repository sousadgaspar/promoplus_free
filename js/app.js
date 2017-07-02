
$(document).ready(function(){
	/*
		Event Listners - All event listners from btns, links and images
	*/
	
	//menuTable
	
	var menu = $("#menuTable");
	var menuTableContent = $("#menuTableContent");
	
	menu.on("click", function( event ){
		$('#menuTableContent').toggle();
	});
	
	//Cards
	var dashBoard = $("#dashborad-card");
	var createNewVipCodeFormCard = $("#createNewVipCodeFormCard");
	var recomendVipCodeToFriendsCard = $("#recomendVipCodeToFriendsCard");
	var validateVipCodeCard = $("#validateVipCodeCard");
	var successNotificationCard = $("#successNotificationCard");
	var failNotificationCard = $("#failNotificationCard");
	var newVipCodeBtnCard = $("#newVipCodeBtnCard");
	var standardReportCard = $("#standardReportCard");
	var newEnterpriseCard = $("#newEnterpriseCard");
	
	/*
		DashBoard Actions
	*/
	var bntHome = $("#applicationHome");
	var btnNewVipCodeIcon = $("#newVipCodeIcon");
	var btnValidateVipCodeIcon = $("#validateVipCodeIcon");
	var btnReportsVipCodeIcon = $("#reportsVipCodeIcon");
	var btnConfigurationVipCodeIcon = $("#configurationVipCodeIcon");
	var btnQuitVipcodeDashBoard = $("#quitVipcodeDashBoard");
	
	
	//CloseCardActions
	var createNewVipCodeFormCloseCard = $("#createNewVipCodeFormCloseCard");
	var recomendVipCodeToFriendsCloseCard = $("#recomendVipCodeToFriendsCardCloseCard");
	var validateVipCodeCardCloseCard = $("#validateVipCodeCardCloseCard");
	var newEnterpriseCardCloseCard = $("#newEnterpriseCardCloseCard");
	
	
	/*
		Evet handlers
	*/
	
	//Create new VipCode
	btnNewVipCodeIcon.on("click", function(Event) {
		menuTableContent.hide();
		dashBoard.hide();
		createNewVipCodeFormCard.show();
	})
	
	//validate VipCode
	btnValidateVipCodeIcon.on("click", function(Event) {
		menuTableContent.hide();
		dashBoard.hide();
		validateVipCodeCard.show();
		
	})
	
	//validate VipCode
	btnReportsVipCodeIcon.on("click", function(Event) {
		menuTableContent.hide();
		alert("no reports at the moment");
		
	})
	
	//validate VipCode
	btnConfigurationVipCodeIcon.on("click", function(Event) {
		menuTableContent.hide();
		alert("no configuration card at the moment");
		
	})
	
	
	
	
	
	//Close cards events
	createNewVipCodeFormCloseCard.on("click", function( event ){
		menuTableContent.hide();
		failNotificationCard.hide();
		successNotificationCard.hide();
		dashBoard.show();
		$('#createNewVipCodeFormCard').hide();
		
	});
	
	validateVipCodeCardCloseCard.on("click", function( event ){
		menuTableContent.hide();
		failNotificationCard.hide();
		successNotificationCard.hide();
		newVipCodeBtnCard.hide();
		dashBoard.show();
		$('#validateVipCodeCard').hide();
	});
	
	recomendVipCodeToFriendsCloseCard.on("click", function( event ){
		menuTableContent.hide();
		$('#recomendVipCodeToFriendsCard').hide();
	});
	
	
	
	newEnterpriseCardCloseCard.on("click", function( event ){
		menuTableContent.hide();
		$('#newEnterpriseCard').hide();
	});
	
	
	//for validation
	$("#vipCodeOwnerName").on("focus", function(Event) {
		
	})
	
	//login events
	
	$("#email").on("focus", function(Event) {
		$("#welcomeHomeLogo").css("width", "36%");
	})

	/*
		AJAX requests
	*/
	
	//redirect
	function redirect(url) {
		window.location.assign(url);
	}

	//Login Process
	var btnLogin = $('#btnRequestLogin');

	btnLogin.click(function(){
		var userPassword = $('#userPassword').val();
		var userEmail = $('#userEmail').val();
		
		if((userEmail == '') || (userPassword == '')) {
			alert('Preencha os campos por favor.');
		}
		else {
			$.post("/app/requests/login.request.php?",
				{
					password: userPassword,
					email: userEmail
					
				}, function(data) {
					console.log('Bem vindo de volta!');
					}
					
				);
		}
	});
	
	//Quit vipCode dashBoard
	var bntQuitVipcodeDashIcon = $("#quitVipcodeDashIcon");
	
	bntQuitVipcodeDashIcon.click(function(){

		$.post("app/requests/logout.request.php",null, function(data) {
				if(data.toString() == 1) {
					console.log("By by! :)");
					redirect('/index.php');
				}	
		
		});
	
	})
	

	//create new VipCode
	var btnSumitNewVipCodeForm = $('#sumitNewVipCodeForm');

	btnSumitNewVipCodeForm.click(function(Event) {
		
		Event.preventDefault();
		var ownerName = $('#vipCodeOwnerName').val();
		var ownerTelephone = $('#vipCodeTelephone').val();
		var ownerEmail = $('#vipCodeOwnerEmail').val();
		var message = '';
		
		$.ajax({
			type: 'post',
            url: 'app/requests/create.new.vipcode.request.php',
            data: {
	            name: ownerName,
	            telephone: ownerTelephone,
	            email: ownerEmail
            },
            success: function (data) {
                //debug
                //alert(data);
                
                ownerName = data['name'];
                var vipCode = data['vipcode'];
                var minDiscount = data['minDiscount'];
                var maxDiscount = data['maxDiscount'];
                var validityPeriod = data['validTill'];
             
				//check if user user as a valid vipcode
                if(data.hasAnOpenVipCode) {
	                message = "<img src='../img/error-icon.png' /> <br />"; 
	                message += ownerName +", Voc&ecirc; possui um VIPCode v&aacute;lido com um desconto de " + data.credit + "%.<br />"; 
	                message += "VIPCode: <br />";
	                message += "<b>" + data.vipcode +"</b>";
					
					failNotificationCard.html(message);
					failNotificationCard.show();
					createNewVipCodeFormCard.hide();
					
					//fill validate vipcode fields
					$('#vipcode').val(data.vipcode);
					$('#name').val(data.name);
					$('#telephone').val(data.telephone);
					
					validateVipCodeCard.show();
					
					
                }
                else {
	                message = ownerName +", Parab&eacute;ns!<br />";
	                message += "<img src='../img/seccess-icon.png' /> <br />"; 
	                message += "O seu VIPCode &eacute: <br />";
	                message += "<b>" + vipCode +"</b>";
	                message += "quando voltar ao " + data.enterpriseName + " receber&aacute; um desconto de " + minDiscount + "%";
					message += "Se partilhar esse VIPCode com os seus amigos o seu desconto pode aumentar at&eacute; " + maxDiscount + "%. <br />";
					message += ", eles tamb&eacute;m recebem " + minDiscount + "% de desconto! <br />";
					message += "Partilhe! Nos vemos em breve.";
					
					successNotificationCard.html(message);
					successNotificationCard.show();
                }
                
				
				
				//reset Fields
				resetFieldSumitNewVipCodeFormCard();
            }
		});
	});

	
	//validate vipCode
	var btnValidateVipCode = $('#validateVipCode');
	
	btnValidateVipCode.click(function(Event) {
		Event.preventDefault();
		var attendeeVipCode = $('#vipcode').val();
		var attendeeName = $('#name').val();
		var attendeeTelephone = $('#telephone').val();
		
		$.ajax({
			type: 'POST',
			url: 'app/requests/validate.vipcode.php?',
			data: {
				vipCode: attendeeVipCode,
				telephone: attendeeTelephone,
				name: attendeeName
			},
			success: function(data) {
				//debug
				//alert(data);
				
				var message = '';
				var validity = data['validity'];
				//return a card depending of the return
				//if vipCode is no longer valid
				if((data.validity == 'expired') || (data.validity == 'ownerAttended')) {
					message = "<img src='../img/error-icon.png' /> <br />";
					message += 'O vipcode ' + data.vipcode + ' j&aacute; n&atilde;o &eacute; v&aacute;lido :( <br /> Pe&ccedil;a um novo.';
					failNotificationCard.html(message);
					failNotificationCard.show();
					newVipCodeBtnCard.show();
					
				}//check if is Owner 
				else if(data.ownerAttended) {
					alert('e o owner ' + data.ownerAttended);
					message = data.ownerName + ', Benvindo ao ' + data.enterpriseName + '<br />';
					message += "<img src='../img/seccess-icon.png' /> <br />";
					message += 'Vo&ccedil;&ecirc; merece um desconto de ' + data.credit + '%';
					
					//show success notification card
					successNotificationCard.html(message);
					successNotificationCard.show();
					
					//reset card
					resetFieldsValidateVipCodeCard();
				}
				else if(data.newAttendee) {
					message = data.attendeeName + ', Benvindo ao ' + data.enterpriseName + '<br />';
					message += "<img src='../img/seccess-icon.png' /> <br />";
					message += 'Vo&ccedil;&ecirc; merece um desconto de ' + data.minVipCodeDiscount + '%' + ' do ' + data.ownerName;
					//show success notification card
					successNotificationCard.html(message);
					successNotificationCard.show();
					
					//reset card
					resetFieldsValidateVipCodeCard();
					
				}
			}
		});
	});
	
	
	//reset validateVipCodeCard
	function resetFieldsValidateVipCodeCard() {
		$('#vipcode').val('');
		$('#name').val('');
		$('#telephone').val('');
	}
	
	//function resetFieldSumitNewVipCodeFormCard
	function resetFieldSumitNewVipCodeFormCard() {
		$('#vipCodeOwnerName').val('');
		$('#vipCodeTelephone').val('');
		$('#vipCodeOwnerEmail').val('');
	}
}) 
	