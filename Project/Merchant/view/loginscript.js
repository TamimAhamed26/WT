function validate() {
	const x = document.getElementById("username");
	const y = document.getElementById("password");
 
	const a = document.getElementById("error1");
	const b = document.getElementById("error2");
 
	let flag = true;
	if(x.value === "") {
		a.innerHTML = "Please flll up the username";
		flag = false;
	}
	if (y.value === "") {
		b.innerHTML = "Please flll up the password";
		flag = false;
	}
 
	return flag;
}

