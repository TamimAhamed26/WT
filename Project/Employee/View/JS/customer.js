

    function validateAddCustomer() {
        let flag = true;
    
        // Validation for Holder Name
        const holderName = document.getElementById("holderName").value.trim();
        if (holderName === "") {
            document.getElementById("errorHolderName").innerText = "Holder name is required";
            flag = false;
        } else {
            document.getElementById("errorHolderName").innerText = "";
        }
    
        // Validation for Father's Name
        const fatherName = document.getElementById("fatherName").value.trim();
        if (fatherName === "") {
            document.getElementById("errorFatherName").innerText = "Father's name is required";
            flag = false;
        } else {
            document.getElementById("errorFatherName").innerText = "";
        }
    
        // Validation for Mother's Name
        const motherName = document.getElementById("motherName").value.trim();
        if (motherName === "") {
            document.getElementById("errorMotherName").innerText = "Mother's name is required";
            flag = false;
        } else {
            document.getElementById("errorMotherName").innerText = "";
        }
    
        // Validation for Email
        const email = document.getElementById("email").value.trim();
        if (email === "") {
            document.getElementById("errorEmail").innerText = "Email is required";
            flag = false;
        } else {
            document.getElementById("errorEmail").innerText = "";
        }
    
        // Validation for Website
        const website = document.getElementById("website").value.trim();
        if (website === "") {
            document.getElementById("errorWebsite").innerText = "Website is required";
            flag = false;
        } else {
            document.getElementById("errorWebsite").innerText = "";
        }
    
        // Validation for Phone
        const phone = document.getElementById("phone").value.trim();
        if (phone === "") {
            document.getElementById("errorPhone").innerText = "Phone number is required";
            flag = false;
        } else {
            document.getElementById("errorPhone").innerText = "";
        }
    
        // Validation for Gender
        const gender = document.querySelector('input[name="gender"]:checked');
        if (!gender) {
            document.getElementById("errorGender").innerText = "Gender is required";
            flag = false;
        } else {
            document.getElementById("errorGender").innerText = "";
        }
    
        // Validation for Blood Group
        const bloodGroup = document.getElementById("bloodGroup").value.trim();
        if (bloodGroup === "-") {
            document.getElementById("errorBloodGroup").innerText = "Blood group is required";
            flag = false;
        } else {
            document.getElementById("errorBloodGroup").innerText = "";
        }
    
        // Validation for Religion
        const religion = document.getElementById("religion").value.trim();
        if (religion === "") {
            document.getElementById("errorReligion").innerText = "Religion is required";
            flag = false;
        } else {
            document.getElementById("errorReligion").innerText = "";
        }
    
        // Validation for Details Address
        const message = document.getElementById("message").value.trim();
        if (message === "") {
            document.getElementById("errorMessage").innerText = "Details address is required";
            flag = false;
        } else {
            document.getElementById("errorMessage").innerText = "";
        }
    
        // Validation for City
        const city = document.getElementById("city").value.trim();
        if (city === "") {
            document.getElementById("errorCity").innerText = "City is required";
            flag = false;
        } else {
            document.getElementById("errorCity").innerText = "";
        }
    
        // Validation for Country
        const country = document.getElementById("country").value.trim();
        if (country === "") {
            document.getElementById("errorCountry").innerText = "Country is required";
            flag = false;
        } else {
            document.getElementById("errorCountry").innerText = "";
        }
    
        // Validation for Post Code
        const postCode = document.getElementById("postCode").value.trim();
        if (postCode === "") {
            document.getElementById("errorPostCode").innerText = "Post code is required";
            flag = false;
        } else {
            document.getElementById("errorPostCode").innerText = "";
        }
    
        // Validation for Username
        const username = document.getElementById("username").value.trim();
        if (username === "") {
            document.getElementById("errorUsername").innerText = "Username is required";
            flag = false;
        } else {
            document.getElementById("errorUsername").innerText = "";
        }
    
        // Validation for Password
        const password = document.getElementById("password").value.trim();
        if (password === "") {
            document.getElementById("errorPassword").innerText = "Password is required";
            flag = false;
        } else {
            document.getElementById("errorPassword").innerText = "";
        }
    
        // Validation for Confirm Password
        const confirmPassword = document.getElementById("confirmPassword").value.trim();
        if (confirmPassword === "") {
            document.getElementById("errorConfirmPassword").innerText = "Confirm password is required";
            flag = false;
        } else {
            document.getElementById("errorConfirmPassword").innerText = "";
        }
    
        // Validation for matching Passwords
        if (password !== confirmPassword) {
            document.getElementById("errorConfirmPassword").innerText = "Passwords do not match";
            flag = false;
        } else {
            document.getElementById("errorConfirmPassword").innerText = "";
        }
    
        // Validation for Created At (optional as it's readonly)
    
        return flag;
    }
    