
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

	btnLogin.click(function(Event){

		var userPassword = $('#userPassword').val();
		var userEmail = $('#userEmail').val();
		
		if((userEmail == '') || (userPassword == '')) {
			Event.preventDefault();
			if(userEmail == '') {
				$('#alertUserEmail').html("<label class='wrong'>Preencha o e-mail por favor.</label>");
				}
			else {
				$('#alertUserEmail').html('');
			}
			
			if(userPassword == '') {
				$('#alertUserPassword').html("<label class='wrong'>Preencha a senha por favor.</label>");
			}
			else {
					$('#alertUserPassword').html('');
				}
			
			//alert('Preencha os campos por favor.');
		}
		else {
			$.post("/app/requests/login.request.php?",
				{
					password: userPassword,
					email: userEmail
					
				}, function(data) {
					console.log(data);
						if(data.logged == false) {
							var message = "<label class='wrong'>O e-mail ou a senha não está certa.</label>";
							$('#alertUserEmail').html(message);
							$('#alertUserPassword').html(message);
						}
						else {
							redirect('/app.php');
						}
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
		//message header
		var message = "<b>Preencha todos os campos!</b> <br />";
		
		
		var ownerName = $('#vipCodeOwnerName').val();
		var ownerTelephone = $('#vipCodeTelephone').val();
		var ownerEmail = $('#vipCodeOwnerEmail').val();
		
		//Validate form
		//integer validation
			var telephone = /\b^9\d{8}\b/;
			var alphaNumeric = /\b^[a-zA-Z]\w+\b/g;
			var email = /\w+/;
			
			
			if(!alphaNumeric.test(ownerName) && ownerName != '') {
				message += "Preencha correctamente o campo nome. <br />";
				showErrorCard(message);
				return;
			}	
			else if(!telephone.test(ownerTelephone) && ownerTelephone != '') {
				message += "Preencha correctamente o campo telefone. <br />";
				showErrorCard(message);
				return;
			}
			else if(!email.test(ownerEmail) && ownerEmail != '') {
				message += "Preencha correctamente o campo e-mail. <br />";
				showErrorCard(message);
				return;
			}
			else if((ownerName == '') || (ownerTelephone == '') || (ownerEmail == '')) {
				
				showErrorCard(message);
				return;
			}
			else {
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
                console.log(data);
                
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
		                console.log(data);
		                console.log(data.smsresponse1);
		                console.log(data.smsresponse2);
		                
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
							//createNewVipCodeFormCard.hide();
							
							//message
							message = vipCode + "<br />";
							message += "Recomende o VIPCode para os seus amigos";
							$("#recomendVipCodeToFriendsCard #vipCodeToRecomend").attr("value", vipCode);
							successNotificationCard.html(message);
							successNotificationCard.show();
							//recomendVipCodeToFriendsCard.show();
						}, 16000)
	                }
	                
	                
					
					
					//reset Fields
					resetFieldSumitNewVipCodeFormCard();
	            }
			});
			}

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
		var attendeeInvoiceValue = $('#invoiceValue').val();
		
		
		//validate form REGEX
		
			//integer validation
			var interger = /\b^\d+,?\d+$\b/;
			var telephone = /\b^9\d{8}\b/;
			var alphaNumeric = /\b^[a-zA-Z]\w+\b/g;
			var vipcodePatern = /\b^voltoAo\w+#[0-9]{5}-[0-9]{4}-[0-9]{2}$\b/
			//message header
			message = "<b>Preencha todos os campos!</b> <br />";
			
			if(!interger.test(attendeeInvoiceValue) && attendeeInvoiceValue != '') {
				message += "O campo Valor da factura so aceita numeros. <br />";
				showErrorCard(message);
			}	
			else if(!alphaNumeric.test(attendeeName) && attendeeName != '') {
				message += "O campo Nome deve conter somente alfanumericos. <br />";
				showErrorCard();
			}
			else if(!telephone.test(attendeeTelephone) && attendeeTelephone != '') {
				message += " O campo telefone deve ser no formato 9XXxxxxxx sem espa&ccedil;o. <br />";
				showErrorCard(message);
			}
			else if(!vipcodePatern.test(attendeeVipCode) && attendeeVipCode != '') {
				message += " Voc&ecirc; n&atilde;o escreveu correctamente o c&oacute;digo VIP. <br /> Corrija!"
				showErrorCard(message);
			}
			else if((attendeeVipCode == '') || (attendeeName == '') || (attendeeTelephone == '') || (attendeeInvoiceValue == '')) {

			showErrorCard(message);

			}
			else {
					$.ajax({
							type: 'POST',
							url: 'app/requests/validate.vipcode.php?',
							data: {
								vipCode: attendeeVipCode,
								telephone: attendeeTelephone,
								name: attendeeName,
								invoiceValue: attendeeInvoiceValue
							},
							success: function(data) {
								//debug
								//alert(data);
								var bucks = '';
								if(data.ownerAttended) {
									bucks = (data.credit * data.invoiceValue)/100;
								}
								else {
									bucks = (data.minVipCodeDiscount * data.invoiceValue)/100;
								}
								
								var message = '';
								var validity = data['validity'];
								//return a card depending of the return
								//if vipCode is no longer valid
								if((data.validity == 'expired') || (data.validity == 'ownerAttended')) {
									message = "<img src='../img/error-icon.png' /> <br />";
									message += 'O c&oacute;digo VIP ' + data.vipcode + ' j&aacute; n&atilde;o &eacute; v&aacute;lido :( <br /> Pe&ccedil;a um novo.';
									
									showErrorCard(message);
									newVipCodeBtnCard.show();
									
								}//check if is Owner 
								else if(data.ownerAttended) {
									message = data.ownerName + ', Bem vindo ao ' + data.enterpriseName + '<br />';
									message += "<img src='../img/seccess-icon.png' /> <br />";
									message += 'Voc&ecirc; merece um desconto de ' + bucks + "kz, " + data.credit + '%  da sua fatura';
									
									//show success notification card
									successNotificationCard.html(message);
									successNotificationCard.show();
									
									//reset card
									resetFieldsValidateVipCodeCard();
								}
								else if(data.newAttendee) {
									message = data.attendeeName + ', Benvindo ao ' + data.enterpriseName + '<br />';
									message += "<img src='../img/seccess-icon.png' /> <br />";
									message += 'Voc&ecirc; merece um desconto de ' + bucks + "kz, " + data.minVipCodeDiscount + '%' + ' da sua factura. Agrade&ccedil;a ao ' + data.ownerName;
									//show success notification card
									successNotificationCard.html(message);
									successNotificationCard.show();
									
									setTimeout(function(){
										successNotificationCard.hide();
									}, 5000);
									
									//reset card
									resetFieldsValidateVipCodeCard();
									
								}
							}
						}); //End of AJAX

			}//End of main condition
		
	});
	
	//save VIPCode Configuration
	var btnSaveVipCodeConfiguration = $("#saveVipCodeConfiguration");
	
	btnSaveVipCodeConfiguration.click(function(Event) {
		Event.preventDefault();
		
		var minDiscount = $("#minDiscount").val();
		var maxDiscount = $("#maxDiscount").val();
		var numberOfIndicationsForMaxDiscount = $("#numberOfIndicationsForMaxDiscount").val();
		var numberOfDaysForVipCodeExpire = $("#numberOfDaysForVipCodeExpire").val();
		var message = '';
		
		//validate the form 
		if((minDiscount == '') || (maxDiscount == '') || (numberOfIndicationsForMaxDiscount == '') || (numberOfDaysForVipCodeExpire == '')) {
			
			message = "<b>Preencha todos os campos!</b> <br />";

			failNotificationCard.html(message);
			
			//show fail notification card
			failNotificationCard.show();
			setTimeout(function(){
				failNotificationCard.hide();
				}, 5000);
				
			return;
			
			
		}
		else {
				$.ajax({
				type: 'POST',
				url: 'app/requests/save.vipcode.configuration.php?',
				data: {
					newMinDiscount: minDiscount,
					newMaxDiscount: maxDiscount,
					newNumberOfIndicationsForMaxDiscount: numberOfIndicationsForMaxDiscount,
					newNumberOfDaysForVipCodeExpire: numberOfDaysForVipCodeExpire
				},
				success: function(data) {
					//debug
					console.log(data);
					message = "<b>Configura&ccedil;&otilde;es gravadas com sucesso!</b> <br />";
					message += "Novo desconto m&iacute;nimo: " + minDiscount + "% <br />";
					message += "Novo desconto m&aacute;ximo: " + maxDiscount + "% <br />";
					message += "Nº de indica&ccedil;&otilde;es para o cliente ganhar o desconto m&aacute;ximo: " + numberOfIndicationsForMaxDiscount + " pessoas <br />";
					
					successNotificationCard.html(message);
					successNotificationCard.show();
	
					}
				})
		}
	});
	
	
	//generate vip code report
	var btnGenerateVipCodeReport = $('#generateVipCodeReport');
	
	btnGenerateVipCodeReport.click(function(Event){
		//prevent ajax reload the page accidentally
		Event.preventDefault();
		//get inputs
		var fromDate = $('#fromDate').val();
		var toDate = $('#toDate').val();
		
		//validate form
		if((fromDate == '') || (toDate == '')) {
			var date  = new Date();
			if(fromDate == '') {
				fromDate = date.getFullYear() + "/" + (date.getMonth() - 1) + "/" + date.getDay();
			}
			
			if(toDate == '') {
				toDate = date.getFullYear() + "/" + date.getMonth() + "/" + date.getDay();
			}
		}
		
		
		//Make the post request to get the report data
		$.ajax({
			type: 'POST',
			url: 'app/requests/get.stats.request.php?',
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
		$('#invoiceValue').val('');
	}
	
	//function resetFieldSumitNewVipCodeFormCard
	function resetFieldSumitNewVipCodeFormCard() {
		$('#vipCodeOwnerName').val('');
		$('#vipCodeTelephone').val('');
		$('#vipCodeOwnerEmail').val('');
	}
	
	
	function showErrorCard(message) {
		failNotificationCard.html(message);
			//show fail notification card
			failNotificationCard.show();
			setTimeout(function(){
				failNotificationCard.hide();
				}, 8000);
				
			return;
	}
	
	
	/*
		Forms validation
	*/
	//create new vipcode form
	
	
}) 
	