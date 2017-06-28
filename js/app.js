

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

