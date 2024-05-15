function validate() {
	const x = document.getElementById("PASS");

	const a = document.getElementById("error1");

	let flag = true;
	if(x.value === "") {
		a.innerHTML = "Please flll up the OTP";
		flag = false;
	}

	return flag;

}