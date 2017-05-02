$(document).ready(function(){
	//fix img sai path 
	$("img").each(function(){
		console.log( $(this).attr("src" , $(this).attr("src").replace("../upload/" , window.homeUrl +  "/upload/") ) );
	});
});