function jsRedirect(argLocation){
	window.setTimeout( function() {window.location = argLocation;}, 1500);
}

$(document).ready(function(){
	$("#HideBut").mouseenter( function(){
		$("#SearchLeftChat").css("width", "20%");
		$("#WholePage").css("width", "80%");
		$("#CircleBox").css("height", "125%");
		$("#logoutBut span").css("font-size", "1em");
	});
	$("#WholePage").mouseenter( function(){
		$("#SearchLeftChat").css("width", "0%");
		$("#WholePage").css("width", "100%");
		$("#CircleBox").css("height", "149%");
		$("#logoutBut span").css("font-size", "0em");
	});	
	
	$("#logoutBut").click( function(){
		window.location = "./logout.php";
	});
});