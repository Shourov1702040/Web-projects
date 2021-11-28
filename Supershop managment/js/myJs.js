
function clear_login(){
	document.getElementById("user_id").value='';
	document.getElementById("password1").value='';
	
}

function show_pass(){
	var x = document.getElementById("password1");
	if (x.type === "password") {
	x.type = "text";
	}
	else {
	x.type = "password";
	}
}

