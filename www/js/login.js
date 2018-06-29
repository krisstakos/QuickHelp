var valid_name=0;
var jsonURL = [];
var patt = new RegExp(/^[a-z0-9\u0400-\u04FF]+$/i);
var num_pat = new RegExp(/^[0-9]+$/i);
var name = document.getElementById("name");
var button=document.getElementById("send");
function check_name(){
	var name = document.getElementById("name");
	var status =document.getElementById("status");
	if(name.value.length<3){
		name.style.border = "solid #ff4d4d";
		status.innerHTML="Името е твърде късо!";		   
	}
	else if (name.value.length>40){
		name.style.border = "solid #ff4d4d";
		status.innerHTML="Името е твърде дълго!";
	}
	else if (!patt.test(name.value)){
		name.style.border = "solid #ff4d4d";
		status.innerHTML="Името съдържа забранени знаци!";
	}
	else{
	name.style.border = "solid #4dff4d";
	status.innerHTML="";	
	valid_name=1;
	}
}
function send(){	
var name = document.getElementById("name");
var phone = document.getElementById("phone");
var status =document.getElementById("status");
if(valid_name==1){	
    var oreg = new XMLHttpRequest();	
	oreg.onreadystatechange = function() {
		if (oreg.readyState == 4 && oreg.status == 200) {
			jsonURL = JSON.parse(oreg.responseText);
			var msg=jsonURL[0].msg1;
			status.innerHTML=msg;
			if(jsonURL[0].url!="")
				window.location=jsonURL[0].url;
			switch(jsonURL[0].stat) {
				case 1:
					phone.style.border="solid #4dff4d";
					name.style.border="solid #4dff4d";
					break;
				case 0:
					phone.style.border="solid #ff4d4d";
					name.style.border="solid #ff4d4d";
					break;
			} 
			return false;
		}
	};
	oreg.open("post", "us_login.php", true);
	oreg.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	oreg.send("name="+name.value+"&phone="+phone.value);	
}
else
name.style.border="solid #ff4d4d";	
}
document.getElementById("name").addEventListener("keyup", check_name);
button.addEventListener('mousedown', send);

