function validate() {
	const x = document.getElementById("firstname");
	const y = document.getElementById("lastname");
    const z = document.getElementById("nid");
    const l = document.getElementById("presentaddress");
    const m = document.getElementById("permanentaddress");
    const n = document.getElementById("phonenumber");
    const o = document.getElementById("email");
    const p = document.getElementById("username");
    const q = document.getElementById("password");
    const r = document.getElementById("confirmpassword");
 
	const a = document.getElementById("error1");
	const b = document.getElementById("error2");
    const c = document.getElementById("error3");
    const d = document.getElementById("error4");
    const e = document.getElementById("error5");
    const f = document.getElementById("error6");
    const g = document.getElementById("error7");
    const h = document.getElementById("error8");
    const i = document.getElementById("error9");
    const j = document.getElementById("error10");
 
	let flag = true;
	if(x.value === "") {
		a.innerHTML = "*Please flll up the firstname";
		flag = false;
	}
	if (y.value === "") {
		b.innerHTML = "*Please flll up the lastname";
		flag = false;
	}
    if (z.value === "") {
		c.innerHTML = "*Please flll up the nid";
		flag = false;
	}
    if (l.value === "") {
		d.innerHTML = "*Please flll up the presentaddress";
		flag = false;
	}
    if (m.value === "") {
		e.innerHTML = "*Please flll up the permanentaddress";
		flag = false;
	}
    if (n.value === "") {
		f.innerHTML = "*Please flll up the phonenumber";
		flag = false;
	}
    if (o.value === "") {
		g.innerHTML = "*Please flll up the email";
		flag = false;
	}
    if (p.value === "") {
		h.innerHTML = "*Please flll up the username";
		flag = false;
	}
    if (q.value === "") {
		i.innerHTML = "*Please flll up the password";
		flag = false;
	}
    if (r.value === "") {
		j.innerHTML = "*Please flll up the confirmpassword";
		flag = false;
	}
 
	return flag;
}