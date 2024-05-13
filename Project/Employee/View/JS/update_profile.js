function validateUpdateProfile() {
    const firstName = document.getElementsByName("firstName")[0].value;
    const lastName = document.getElementsByName("lastName")[0].value;
    const email = document.getElementsByName("email")[0].value;
    const dateOfBirth = document.getElementsByName("dateOfBirth")[0].value;
    const phoneNumber = document.getElementsByName("phoneNumber")[0].value;
    const streetAddress = document.getElementsByName("streetAddress")[0].value;
    const city = document.getElementsByName("city")[0].value;
    const state = document.getElementsByName("state")[0].value;
    const postalCode = document.getElementsByName("postalCode")[0].value;

    let flag = true;

    // Validation for first name
    if (firstName.trim() === "") {
        document.getElementById("errorFirstName").innerText = "First name is required";
        flag = false;
    } else {
        document.getElementById("errorFirstName").innerText = "";
    }

    // Validation for last name
    if (lastName.trim() === "") {
        document.getElementById("errorLastName").innerText = "Last name is required";
        flag = false;
    } else {
        document.getElementById("errorLastName").innerText = "";
    }

    // Validation for email
    if (email.trim() === "") {
        document.getElementById("errorEmail").innerText = "Email is required";
        flag = false;
    } else {
        document.getElementById("errorEmail").innerText = "";
    }

    // Validation for date of birth
    if (dateOfBirth.trim() === "") {
        document.getElementById("errorDateOfBirth").innerText = "Date of birth is required";
        flag = false;
    } else {
        document.getElementById("errorDateOfBirth").innerText = "";
    }

    // Validation for phone number
    if (phoneNumber.trim() === "") {
        document.getElementById("errorPhoneNumber").innerText = "Phone number is required";
        flag = false;
    } else {
        document.getElementById("errorPhoneNumber").innerText = "";
    }

    // Validation for street address
    if (streetAddress.trim() === "") {
        document.getElementById("errorStreetAddress").innerText = "Street address is required";
        flag = false;
    } else {
        document.getElementById("errorStreetAddress").innerText = "";
    }

    // Validation for city
    if (city.trim() === "") {
        document.getElementById("errorCity").innerText = "City is required";
        flag = false;
    } else {
        document.getElementById("errorCity").innerText = "";
    }

    // Validation for state
    if (state.trim() === "") {
        document.getElementById("errorState").innerText = "State is required";
        flag = false;
    } else {
        document.getElementById("errorState").innerText = "";
    }

    // Validation for postal code
    if (postalCode.trim() === "") {
        document.getElementById("errorPostalCode").innerText = "Postal code is required";
        flag = false;
    } else {
        document.getElementById("errorPostalCode").innerText = "";
    }

    return flag;
}
