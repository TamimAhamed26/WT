
function validateForgetPassword() {
    const x = document.getElementById("username");
    const a = document.getElementById("error1");
   
    let flag = true;
    if (x.value === "") {
        a.innerHTML = "Please fill up the username";
        flag = false;
    } else {
        a.innerHTML = "";
    }
    return flag;
}


function validateOTPForm() {
    const x = document.getElementById("OTP");
    const a = document.getElementById("error1");

    let flag = true;
    if (x.value === "") {
        a.innerHTML = " OTP is required.";
        flag = false;
    } else {
        a.innerHTML = "";
    }
    return flag;
}


function validateNewPasswordForm() {
    const x = document.getElementById("password");
    const a = document.getElementById("error1");
 
    let flag = true;
    if (x.value === "") {
        a.innerHTML = " Password is required.";
        flag = false;
    } else {
        a.innerHTML = "";
    }
    return flag;
}