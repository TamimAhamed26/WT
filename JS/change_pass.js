function validateForm() {
    let isValid = true;
    
    // current password
    const curPasswd = document.getElementById("cur-passwd").value;
    const curPasswdError = document.getElementById("cur-passwd-error");
    if (curPasswd === "") {
        curPasswdError.innerHTML = "Please enter your current password";
        isValid = false;
    } else {
        curPasswdError.innerHTML = "";
    }
    
    // new password
    const newPasswd = document.getElementById("new-passwd").value;
    const newPasswdError = document.getElementById("new-passwd-error");
    if (newPasswd === "") {
        newPasswdError.innerHTML = "Please enter a new password";
        isValid = false;
    } else {
        newPasswdError.innerHTML = "";
    }
    
    //  re-typed new password
    const reNewPasswd = document.getElementById("re-new-passwd").value;
    const reNewPasswdError = document.getElementById("re-new-passwd-error");
    if (reNewPasswd === "") {
        reNewPasswdError.innerHTML = "Please re-enter your new password";
        isValid = false;
    } else if (reNewPasswd !== newPasswd) {
        reNewPasswdError.innerHTML = "Passwords do not match";
        isValid = false;
    } else {
        reNewPasswdError.innerHTML = "";
    }
    
    return isValid;
}
