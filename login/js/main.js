const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

var state = false;
function toggle(){
	if(state){
		document.getElementById("password").
		setAttribute("type","password");
		document.getElementById("eye").style.color='#999999e0';
		state = false;
	}
	else {
		document.getElementById("password").
		setAttribute("type","text");
		document.getElementById("eye").style.color='#38d39f';
		state = true;
	}
}

var state = false;
function confirmtoggle(){
	if(state){
		document.getElementById("confirmPassword").
		setAttribute("type","password");
		document.getElementById("eye2").style.color='#999999e0';
		state = false;
	}
	else {
		document.getElementById("confirmPassword").
		setAttribute("type","text");
		document.getElementById("eye2").style.color='#38d39f';
		state = true;
	}
}
