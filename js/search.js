function resetsearch() {

	$("#searchdata").val("");
	$("#add_err").hide();
}

function searching(string) {

		
	if(string.length > 3) {
		
		$("#main").html("<div id='adr_err'></div>");
		
		$.ajax({
		type : "POST",
		url : "search.php",
		data : {"searchdata" : string},
		success: function(data){
		$("#main").html(data);
		
   },
   beforeSend:function()
   {
    $("#add_err").html("<div class='animation_image'><img src='img/ajax-loader.gif'></div>")
   }		
		});
		
	}
}