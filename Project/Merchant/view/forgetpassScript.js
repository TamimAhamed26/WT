function forgetpassvalidate() {
	const x = document.getElementById("username");

	const a = document.getElementById("error1");

	let flag = true;
	if(x.value === "") {
		a.innerHTML = "Please flll up the username";
		flag = false;
	}

	return flag;

}