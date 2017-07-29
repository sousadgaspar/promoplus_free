
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
	var card = $(".card");
	var dashBoard = $("#dashborad-card");
	var createNewVipCodeFormCard = $("#createNewVipCodeFormCard");
	var recomendVipCodeToFriendsCard = $("#recomendVipCodeToFriendsCard");
	var validateVipCodeCard = $("#validateVipCodeCard");
	var successNotificationCard = $("#successNotificationCard");
	var failNotificationCard = $("#failNotificationCard");
	var newVipCodeBtnCard = $("#newVipCodeBtnCard");
	var standardReportCard = $("#standardReportCard");
	var newEnterpriseCard = $("#newEnterpriseCard");
	var configurationCard = $("#configurationCard");
	var basicReportCard = $("#basicReportCard");
	var formLoad = $("#formLoad");
	var singleKPIReportCard = $("#singleKPIReportCard");
	var reportContainer = $("#reportContainer");
	
	
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
	var configurationCardCloseCard = $("#configurationCardCloseCard");
	var basicReportCardCloseCard = $('#basicReportCardCloseCard');
	var formLoadCloseCard = $("#formLoadCloseCard");
	
	
	
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
	
	//reports icon
	btnReportsVipCodeIcon.on("click", function(Event) {		
		menuTableContent.hide();
		dashBoard.hide();
		formLoad.append(reportContainer).show();
		//reportContainer.show();
		//basicReportCard.html(loadMainGraphReportData).css("padding", "0").append(reportContainer).show();
		
		
				
	})
	
	//VipCode configuration
	btnConfigurationVipCodeIcon.on("click", function(Event) {
		menuTableContent.hide();
		dashBoard.hide();
		configurationCard.show();
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
		failNotificationCard.hide();
		successNotificationCard.hide();
		$('#recomendVipCodeToFriendsCard').hide();
		dashBoard.show();
	});
	
	configurationCardCloseCard.on("click", function( event ){
		menuTableContent.hide();
		failNotificationCard.hide();
		successNotificationCard.hide();
		$('#recomendVipCodeToFriendsCard').hide();
		configurationCard.hide();
		dashBoard.show();
	});
	
	basicReportCardCloseCard.on("click", function(event) {
		basicReportCard.hide();
		formLoad.hide();
		menuTableContent.hide();
		failNotificationCard.hide();
		$('#recomendVipCodeToFriendsCard').hide();
		successNotificationCard.hide();
		singleKPIReportCard.hide();
		reportContainer.hide();
		dashBoard.show();
	});
	
	newEnterpriseCardCloseCard.on("click", function( event ){
		menuTableContent.hide();
		$('#newEnterpriseCard').hide();
	});
	
	formLoadCloseCard.on("click", function(event) {
		formLoad.hide();
		dashBoard.show();
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
	                //debug
	                alert(data);
	                message = ownerName +", Parab&eacute;ns!<br />";
	                message += "<img src='../img/seccess-icon.png' /> <br />"; 
	                message += "O seu VIPCode &eacute: <br />";
	                message += "<b>" + vipCode +"</b>";
	                message += "quando voltar ao " + data.enterpriseName + " receber&aacute; um desconto de " + minDiscount + "%";
					message += " Envie esse VIPCode para at&eacute;" + data.numberOfIndicationsForMaxDiscount + " amigos o seu desconto aumentar&aacute; at&eacute; " + maxDiscount + "%. <br />";
					message += ", os seus amigos tamb&eacute;m recebem " + minDiscount + "% de desconto quando vierem ao " + data.enterpriseName + "! <br />";
					message += "Envie agora! Nos vemos em breve.";
					
					successNotificationCard.html(message);
					successNotificationCard.show();
					
					setTimeout(function(){
						successNotificationCard.hide();
						createNewVipCodeFormCard.hide();
						
						//message
						message = vipCode + "<br />";
						message += "Recomende o VIPCode para os seus amigos";
						$("#recomendVipCodeToFriendsCard #vipCodeToRecomend").attr("value", vipCode);
						successNotificationCard.html(message);
						successNotificationCard.show();
						recomendVipCodeToFriendsCard.show();
					}, 16000)
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
		
		//Close whatever opened notification 
		successNotificationCard.hide();
		failNotificationCard.hide();
		
		//Variables
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
					message = data.ownerName + ', Bem vindo ao ' + data.enterpriseName + '<br />';
					message += "<img src='../img/seccess-icon.png' /> <br />";
					message += 'Voc&ecirc; merece um desconto de ' + data.credit + '%';
					
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
	
	//save VIPCode Configuration
	var btnSaveVipCodeConfiguration = $("#saveVipCodeConfiguration");
	
	btnSaveVipCodeConfiguration.click(function(Event) {
		Event.preventDefault();
		
		var minDiscount = $("#minDiscount").val();
		var maxDiscount = $("#maxDiscount").val();
		var numberOfIndicationsForMaxDiscount = $("#numberOfIndicationsForMaxDiscount").val();
		var message = '';
		
		$.ajax({
			type: 'POST',
			url: 'app/requests/save.vipcode.configuration.php?',
			data: {
				newMinDiscount: minDiscount,
				newMaxDiscount: maxDiscount,
				newNumberOfIndicationsForMaxDiscount: numberOfIndicationsForMaxDiscount
			},
			success: function(data) {
				//debug
				//alert(data);
				message = "<b>Configura&ccedil;&otilde;es gravadas com sucesso!</b> <br />";
				message += "Novo desconto m&iacute;nimo: " + minDiscount + "% <br />";
				message += "Novo desconto m&aacute;ximo: " + maxDiscount + "% <br />";
				message += "Nº de indica&ccedil;&otilde;es para o cliente ganhar o desconto m&aacute;ximo: " + numberOfIndicationsForMaxDiscount + " pessoas <br />";
				
				setTimeout(function() {
					successNotificationCard.html(message);
					successNotificationCard.show();
				}, 5000)

				}
			})
	});
	
	
	//generate vip code report
	var btnGenerateVipCodeReport = $('#generateVipCodeReport');
	
	btnGenerateVipCodeReport.click(function(Event){
		//prevent ajax reload the page accidentally
		Event.preventDefault();
		//get inputs
		var fromDate = $('#fromDate').val();
		var toDate = $('#toDate').val();
		
		
		$.ajax({
			type: 'POST',
			url: 'app/requests/get.stats.createdvipcode.request.php?',
			data: {
				requestedFromDate: fromDate,
				requestedToDate: toDate
			},
			success: function(data) {
				console.log(data);
				console.log(data.createdVipCodeTrendDates);
				console.log(data.createdVipCodeTrendValues);
				
				
				
				//plot the chart
				loadMainGraphReportData = function() {
					var chart = new Chartist.Line('#mainChart', {
					  labels: data.createdVipCodeTrendDates,
					  series: [
					    data.createdVipCodeTrendValues,
					  ]
					}, {
					  lineSmooth: Chartist.Interpolation.simple({
					    divisor: 2
					  }),
					  fullWidth: true,
					  chartPadding: {
					    right: 20
					  },
					  low: 0
					});
				}//end loadMainGraphReportData
				
				loadAuxGraphReportData = function() {
					var chart = new Chartist.Line('#auxChart', {
					  labels: data.attendedVipCodesTrendDates,
					  series: [
					    data.attendedVipCodesTrendValues
					  ]
					}, {
					  lineSmooth: Chartist.Interpolation.simple({
					    divisor: 2
					  }),
					  fullWidth: true,
					  chartPadding: {
					    right: 20
					  },
					  low: 0
					});
				}
				//basicReportCard.prepend("<button id='basicReportCardCloseCard' class='closeCard'>X</button>");
				basicReportCard.html(loadMainGraphReportData).css("padding", "0").append(reportContainer).show();
				basicReportCard.html(loadAuxGraphReportData).append(reportContainer).show();
				reportContainer.show();
				
				//fill the KPIs card
				var totalCreated = $('label#totalGeneratedVipCode').text(data.totalOfCreatedVipCodes);
				var totalReturned = $('label#totalNumberOfAttendees').text(data.totalOfReturnedVipCodes);
				$('#vipCodeReturnRate').text(Math.round((Number(totalReturned[0].innerText) * 100)/Number(totalCreated[0].innerText)) + '%');
/*
				//Debug
				console.log(totalCreated[0].innerText);
				console.log(totalReturned[0].innerText);
*/
				
				
				
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
	