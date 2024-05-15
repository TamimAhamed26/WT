function validate() {
	const x = document.getElementById("username");
	const y = document.getElementById("password");
    const z = document.getElementById("confirmpassword");
 
	const a = document.getElementById("error1");
	const b = document.getElementById("error2");
    const c = document.getElementById("error3");
 
	let flag = true;
	if(x.value === "") {
		a.innerHTML = "Please flll up the Username";
		flag = false;
	}
	if (y.value === "") {
		b.innerHTML = "Please flll up the Password";
		flag = false;
	}
    if (z.value === "") {
		c.innerHTML = "Please flll up the Confirm Password";
		flag = false;
	}
 
	return flag;
}