function otpvalidate() {
	const x = document.getElementById("OTP");

	const a = document.getElementById("error1");

	let flag = true;
	if(x.value === "") {
		a.innerHTML = "Please flll up the OTP";
		flag = false;
	}

	return flag;

}