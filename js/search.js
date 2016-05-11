function resetsearch() {
	$("#searchdata").val("");
	$("#add_err").hide();
}

function searching(string) {
	if(string.length > 3) {
		$(".content").html('');
		$(".title").html("Search Result");
		$.ajax({
		type : "POST",
		url : "Control/search.php",
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