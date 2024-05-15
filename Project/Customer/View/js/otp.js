function validate() {
    const x = document.getElementById("OTP");
   


    
    const a = document.getElementById("error1");
   

    let flag = true;
    if (x.value === "") {
        a.innerHTML = "OTP can not be empty";
        flag = false;
    } else {
        a.innerHTML = "";
    }

    return flag;
}
