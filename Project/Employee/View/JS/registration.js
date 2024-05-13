function validate() {
    const firstName = document.getElementById("firstName").value;
    const lastName = document.getElementById("lastName").value;
    const gender = document.querySelector('input[name="gender"]:checked');
    const phoneNumber = document.getElementById("phoneNumber").value;
    const dateOfBirth = document.getElementById("dateOfBirth").value;
    const email = document.getElementById("email").value;
    const streetAddress = document.getElementById("streetAddress").value;
    const city = document.getElementById("city").value;
    const state = document.getElementById("state").value;
    const postalCode = document.getElementById("postalCode").value;
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    let flag = true;

    // Validation for first name
    if (firstName.trim() === "") {
        document.getElementById("error1").innerText = "First name is required";
        flag = false;
    } else {
        document.getElementById("error1").innerText = "";
    }

    // Validation for last name
    if (lastName.trim() === "") {
        document.getElementById("error2").innerText = "Last name is required";
        flag = false;
    } else {
        document.getElementById("error2").innerText = "";
    }

    // Validation for gender
    if (!gender) {
        document.getElementById("errorGender").innerText = "Gender is required";
        flag = false;
    } else {
        document.getElementById("errorGender").innerText = "";
    }

    // Validation for phone number
    if (phoneNumber.trim() === "") {
        document.getElementById("error12").innerText = "Phone number is required";
        flag = false;
    } else {
        document.getElementById("error12").innerText = "";
    }

    // Validation for date of birth
    if (dateOfBirth.trim() === "") {
        document.getElementById("error13").innerText = "Date of birth is required";
        flag = false;
    } else {
        document.getElementById("error13").innerText = "";
    }

    // Validation for email
    if (email.trim() === "") {
        document.getElementById("error6").innerText = "Email is required";
        flag = false;
    } else {
        document.getElementById("error6").innerText = "";
    }

    // Validation for street address
    if (streetAddress.trim() === "") {
        document.getElementById("error15").innerText = "Street address is required";
        flag = false;
    } else {
        document.getElementById("error15").innerText = "";
    }

    // Validation for city
    if (city.trim() === "") {
        document.getElementById("error11").innerText = "City is required";
        flag = false;
    } else {
        document.getElementById("error11").innerText = "";
    }

    // Validation for state
    if (state.trim() === "") {
        document.getElementById("error10").innerText = "State is required";
        flag = false;
    } else {
        document.getElementById("error10").innerText = "";
    }

    // Validation for postal code
    if (postalCode.trim() === "") {
        document.getElementById("error14").innerText = "Postal code is required";
        flag = false;
    } else {
        document.getElementById("error14").innerText = "";
    }

    // Validation for username
    if (username.trim() === "") {
        document.getElementById("error5").innerText = "Username is required";
        flag = false;
    } else {
        document.getElementById("error5").innerText = "";
    }

    // Validation for password
    if (password.trim() === "") {
        document.getElementById("error16").innerText = "Password is required";
        flag = false;
    } else {
        document.getElementById("error16").innerText = "";
    }

    // Validation for confirming password
    if (confirmPassword.trim() === "") {
        document.getElementById("error17").innerText = "Please confirm your password";
        flag = false;
    } else if (password !== confirmPassword) {
        document.getElementById("error17").innerText = "Passwords do not match";
        flag = false;
    } else {
        document.getElementById("error17").innerText = "";
    }

    return flag;
}
