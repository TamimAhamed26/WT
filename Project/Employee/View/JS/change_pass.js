function validateChangePassword() {
    const currentPassword = document.getElementById("cur-passwd");
    const newPassword = document.getElementById("new-passwd");
    const retypePassword = document.getElementById("re-new-passwd");
    const errorElement = document.getElementById("error1");
    const errorElement1 = document.getElementById("error2");
    const errorElement2 = document.getElementById("error3");

    let flag = true;

    // Validate current password
    if (currentPassword.value === "") {
        errorElement.innerHTML = "Current password is required.";
        flag = false;
    } else {
        errorElement.innerHTML = "";
    }

    // Validate new password
    if (newPassword.value === "") {
        errorElement1.innerHTML = "New password is required.";
        flag = false;
    } else if (newPassword.value.length < 8) {
        errorElement1.innerHTML = "New password must be at least 8 characters long.";
        flag = false;
    } else {
        errorElement1.innerHTML = "";
    }

    // Validate retype new password
    if (retypePassword.value === "") {
        errorElement2.innerHTML = "Retype new password is required.";
        flag = false;
    } else if (retypePassword.value !== newPassword.value) {
        errorElement2.innerHTML = "New password and retype password do not match.";
        flag = false;
    } else {
        errorElement2.innerHTML = "";
    }

    return flag;
}
