
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
		dashBoard.show();
		$('#createNewVipCodeFormCard').hide();
		
	});
	
	validateVipCodeCardCloseCard.on("click", function( event ){
		menuTableContent.hide();
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
	//newAJAXObject
	function newAJAXObject() {
		var AJAXObject = false;
		if(window.XMLHttpRequest) {
			AJAXObject = new XMLHttpRequest();
		}
		else if(window.ActivexObject) {
			AJAXObject = new ActivexObject("Msxml2.XMLHTTP");
			if(!AJAXObject) {
				AJAXObject = new ActivexObject("Microsoft.XMLHTTP");
			}
		}
		else {
			AJAXObject = false;
		}
		return AJAXObject;	
	}
	
	//AJAX information sent
	function getAJAXInformationState(paramAJAXObject, state) {
		var AJAXObject = paramAJAXObject;
		if(!AJAXObject) {
			return false;
		}
		
		if(AJAXObject.readystate == state) {
			return true;
		}
		else {
			return false;
		}
	}
	
	//redirect
	function redirect(url) {
		window.location.assign(url);
	}
	


	//App requests
	var btnRequestLogin = $("#btnRequestLogin");
	var userEmail = $("#email").text();
	var userPassword = $("#password").text();
	
	btnRequestLogin.on('click', function(Event) {
		var ajax = newAJAXObject();
		
		ajax.open("POST", '../app/requests/login.request.php?', true);
		ajax.send("email=userEmail&password=userPassword");
		
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4) {
				alert(ajax.responseText + ' ' + userEmail + ' '+ userPassword);
			}
		}
		
	});
	
}) 
	