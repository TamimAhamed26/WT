function validate() {
    const x = document.getElementById("password");
    const y = document.getElementById("npassword");
    const z= document.getElementById("rnpassword");  


    
    const a = document.getElementById("error1");
    const b = document.getElementById("error2");
    const c = document.getElementById("error3");  

    let flag = true;
    if (x.value === "") {
        a.innerHTML = "Please fill up the current password";
        flag = false;
    } else {
        a.innerHTML = "";
    }
    if (y.value === "") {
        b.innerHTML = "Please fill up the new password";
        flag = false;
    } else {
        b.innerHTML = "";
    }

    if (z.value === "") {
        c.innerHTML = "Please fill up the  retype new password";
        flag = false;
    } else {
        c.innerHTML = "";
    }

    return flag;
}