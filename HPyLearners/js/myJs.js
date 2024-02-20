function clear_login(){
	document.getElementById("inputEmail4").value='';
	document.getElementById("inputPassword4").value='';
}

function login_show(){
	var d = document.getElementById("inputPassword4");
	if (d.type === "password") {
	d.type = "text";
	}
	else {
	d.type = "password";
	}
}

function show_pass(){
	var x = document.getElementById("u_password1");
	var y = document.getElementById("u_password2");
	if (x.type === "password") {
	x.type = "text";
	}
	else {
	x.type = "password";
	}
	
	if(y.type === "password"){
	y.type = "text";
	}
	else {
	y.type = "password";
	}
}

function replay(ss,ssMail){
	var ho = ss;
	document.getElementById("user_comment").value="@"+ho+", ";
	document.getElementById("custId_mail").value = ""+ssMail;
}

function clear_functionJS() {
	document.getElementById("input_serial_no").value='';
	document.getElementById("input_Video_Name").value='';
	document.getElementById("input_Code_link").value='';
	document.getElementById("input_Video_link").value='';
	document.getElementById("vid_desc").value='';
	$('select').prop('selectedIndex', 0);
}

function clear_functionJS1() {
	document.getElementById("input_mcq_no").value='';
	document.getElementById("input_Video_no").value='';
	document.getElementById("input_question").value='';
	document.getElementById("op_A").value='';
	document.getElementById("op_B").value='';
	document.getElementById("op_C").value='';
	document.getElementById("op_D").value='';
	document.getElementById("op_ans").value='';
	$('select').prop('selectedIndex', 0);
}

function readMore(){
	var dots = document.getElementById("dots");
	var moreText = document.getElementById("more");
	var btnText = document.getElementById("readMoreBtn");

	if (dots.style.display === "none") {
		dots.style.display = "inline";
		btnText.innerHTML = "Read more"; 
		moreText.style.display = "none";
	} 
	else {
		dots.style.display = "none";
		btnText.innerHTML = "Read less"; 
		moreText.style.display = "inline";
	}
}



