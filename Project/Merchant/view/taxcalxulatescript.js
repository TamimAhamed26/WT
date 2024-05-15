function validate() {
	const x = document.getElementById("income");
	const y = document.getElementById("month");
 
	const a = document.getElementById("error1");
	const b = document.getElementById("error2");

	let flag = true;
	if(x.value === "") {
		a.innerHTML = "Please flll up the income field";
		flag = false;
	}
	if (y.value === "") {
		b.innerHTML = "Please flll up the Month field";
		flag = false;
	}
 
	return flag;
}