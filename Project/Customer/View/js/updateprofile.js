function updateProfileValidate() {
	const x = document.getElementById("first-name");
	const y = document.getElementById("last-name");
    const z = document.getElementById("email");
    const a = document.getElementById("message");   
    const b = document.getElementById("phone"); 
    const c = document.getElementById("father-name");
    const d = document.getElementById("website");  













//////////////////////////////////////////////////////

    const xx = document.getElementById("error1");
	const yy = document.getElementById("error2");
    const zz = document.getElementById("error6");
    const aa = document.getElementById("error15");
    const bb = document.getElementById("error12");
    const cc = document.getElementById("error3");
    const dd = document.getElementById("error13");















	let flag = true;
	
	
    if (x.value === "") {
		xx.innerHTML = " Error: Please flll up the first name";
		flag = false;
	
    }
    else {
        xx.innerHTML = "";
    } 
    if (y.value === "") {
		yy.innerHTML = " Error: Please flll up the last name";
		flag = false;
	
    }
    else {
        yy.innerHTML = "";
    } 


    if (z.value === "") {
		zz.innerHTML = " Error: Please flll up the email";
		flag = false;
	
    }
    else {
        zz.innerHTML = "";
    } 


    if (a.value === "") {
		aa.innerHTML = " Error: Please flll up the address";
		flag = false;
	
    }
    else {
        aa.innerHTML = "";
    }

    if (b.value === "") {
		bb.innerHTML = " Error: Please flll up the phone number";
		flag = false;
	
    }
    else {
        bb.innerHTML = "";
    } 
    

    if (c.value === "") {
		cc.innerHTML = " Error: Please flll up fathers name";
		flag = false;
	
    }
    else {
        cc.innerHTML = "";
    } 




    if (d.value === "") {
		dd.innerHTML = " Error: Please flll up website";
		flag = false;
	
    }
    else {
        dd.innerHTML = "";
    } 











	return flag;

 
}