$(document).ready(function(){
	$("#addRunner").submit(function(){
		return false;
	});
	
	$('#btnSave').click(function() {
		var data = $("#addRunner :input").serializeArray();
		
		$.post($("#addRunner").attr('action'), data, function(json){
			if(json.status == "fail"){
				alert(json.message);
				clearInputs();
			}
			if(json.status == "success"){
				alert(json.message);
				clearInputs();
			}
		}, "json");
	});
	
	function clearInputs(){
		$("#txtFirstName").val('');
		$("#txtLastName").val('');
	}
});