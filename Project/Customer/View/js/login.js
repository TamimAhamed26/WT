function validate() {
    const x = document.getElementById("username");
    const y = document.getElementById("password");


    
    const a = document.getElementById("error1");
    const b = document.getElementById("error2");

    let flag = true;
    if (x.value === "") {
        a.innerHTML = "Please fill up the username";
        flag = false;
    } else {
        a.innerHTML = "";
    }
    if (y.value === "") {
        b.innerHTML = "Please fill up the password";
        flag = false;
    } else {
        b.innerHTML = "";
    }

    return flag;
}