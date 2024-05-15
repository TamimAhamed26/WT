function jsvalidate() {
	const x = document.getElementById("first-name");
	const y = document.getElementById("last-name");
    const z = document.getElementById("female");
    const l = document.getElementById("male");
    
    
    const femaleRadio = document.getElementById("female");
    const maleRadio = document.getElementById("male");

    const m = document.getElementById("father-name");
    const n = document.getElementById("mother-name");
    const o = document.getElementById("blood-group");
    const p = document.getElementById("religion");
    const q = document.getElementById("email");
    const r = document.getElementById("phone");
    const s = document.getElementById("website");
    const t = document.getElementById("country");    
    const xx = document.getElementById("city");  
    const xy = document.getElementById("message"); 
    const xz = document.getElementById("postcode"); 
    const xl = document.getElementById("user-name"); 
    const xm = document.getElementById("password"); 
    const xn = document.getElementById("confirm-password"); 





//////////////////////////////////////////////////////

    const a = document.getElementById("error1");
	const b = document.getElementById("error2");
    const errorGender = document.getElementById("error7");

    const c = document.getElementById("error3");
    const d = document.getElementById("error4");
    const e = document.getElementById("error8");
    const f = document.getElementById("error9");
    const g = document.getElementById("error6");
    const h = document.getElementById("error12");
    const i = document.getElementById("error13");
    const j = document.getElementById("error10");
    const aa = document.getElementById("error11");   
    const ab = document.getElementById("error15");  
    const ac = document.getElementById("error14"); 
    const ad = document.getElementById("error5"); 
    const ae = document.getElementById("error16"); 
    const af = document.getElementById("error17"); 
 
	let flag = true;
	
	if (y.value === "") {
		b.innerHTML = " Error: Please flll up the last name";
		flag = false;
	}
    else {
        b.innerHTML = "";
    }
    if (x.value === "") {
		a.innerHTML = " Error: Please flll up the first name";
		flag = false;
	
    }
    else {
        a.innerHTML = "";
    }

    if (!femaleRadio.checked && !maleRadio.checked) {
        errorGender.textContent = "Error: Please select a gender";
        flag = false;
    } else {
        errorGender.textContent = "";
    }

    if (m.value === "") {
		c.innerHTML = " Error: Please flll up the father name";
		flag = false;
	}
    else {
        c.innerHTML = "";
    }
    if (n.value === "") {
		d.innerHTML = " Error: Please flll up the motheer name";
		
        flag = false;
	}
    else {
        d.innerHTML = "";
    }
    if (o.value === "") {
		e.innerHTML = " Error: Please flll up the blood group";
		flag = false;
	}

    else {
        e.innerHTML = "";
    }
    if (p.value === "") {
		f.innerHTML = " Error: Please flll up the religion";
		flag = false;
	}
    else {
        f.innerHTML = "";
    }
    if (q.value === "") {
		g.innerHTML = " Error: Please flll up the email";
		flag = false;
        
	}
    else {
        g.innerHTML = "";
    }
    if (r.value === "") {
		h.innerHTML = " Error: Please flll up the phone number";
		flag = false;
	}
    else {
        h.innerHTML = "";
    }
    if (s.value === "") {
		i.innerHTML = " Error: Please flll up the website";
		flag = false;
	}
    else {
        i.innerHTML = "";
    }
    if (t.value === "") {
		j.innerHTML = " Error: Please flll up the country";
		flag = false;
	}
    else {
        j.innerHTML = "";
    }

    if (xx.value === "") {
		aa.innerHTML = " Error: Please flll up the city";
		flag = false;
	}
    else {
    aa.innerHTML = "";
    }

    if (xy.value === "") {
		ab.innerHTML = " Error: Please flll up the address";
		flag = false;
	}
    else {
    ab.innerHTML = "";
    }
    if (xz.value === "") {
		ac.innerHTML = " Error: Please flll up the post code";
		flag = false;
	}
    else {
    ac.innerHTML = "";
    }

    if (xl.value === "") {
		ad.innerHTML = " Error: Please flll up the use name";
		flag = false;
	}
    else {
    ad.innerHTML = "";
    }
    if (xm.value === "") {
		ae.innerHTML = " Error: Please flll up the password";
		flag = false;
	}
    else {
    ae.innerHTML = "";
    }

    if (xn.value === "") {
		af.innerHTML = " Error: Please flll up the confirm password";
		flag = false;
	}
    else {
    af.innerHTML = "";
    }

 
	return flag;
}
