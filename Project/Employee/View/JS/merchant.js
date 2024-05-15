

    function validateAddMerchant() {
        let flag = true;
    
 
        const FirstName = document.getElementById("FirstName").value.trim();
        if (FirstName === "") {
            document.getElementById("errorFirstName").innerText = "First name is required";
            flag = false;
        } else {
            document.getElementById("errorFirstName").innerText = "";
        }
    
        const LastName = document.getElementById("LastName").value.trim();
        if (LastName === "") {
            document.getElementById("errorLastName").innerText = "Last name is required";
            flag = false;
        } else {
            document.getElementById("errorLastName").innerText = "";
        }

        const Email = document.getElementById("Email").value.trim();
        if (Email === "") {
            document.getElementById("errorEmail").innerText = "Email is required";
            flag = false;
        } else {
            document.getElementById("errorEmail").innerText = "";
        }
    
        const PhoneNumber = document.getElementById("PhoneNumber").value.trim();
        if (PhoneNumber === "") {
            document.getElementById("errorPhoneNumber").innerText = "Phone number is required";
            flag = false;
        } else {
            document.getElementById("errorPhoneNumber").innerText = "";
        }

        const NID = document.getElementById("NID").value.trim();
        if (NID === "") {
            document.getElementById("errorNID").innerText = "NID is required";
            flag = false;
        } else {
            document.getElementById("errorNID").innerText = "";
        }

        const PresentAddress = document.getElementById("PresentAddress").value.trim();
        if (PresentAddress === "") {
            document.getElementById("errorPresentAddress").innerText = "Present Address is required";
            flag = false;
        } else {
            document.getElementById("errorPresentAddress").innerText = "";
        }

        const PermanentAddress = document.getElementById("PermanentAddress").value.trim();
        if (PermanentAddress === "") {
            document.getElementById("errorPermanentAddress").innerText = "Permanent Address is required";
            flag = false;
        } else {
            document.getElementById("errorPermanentAddress").innerText = "";
        }
    
        // Validation for Username
        const Username = document.getElementById("Username").value.trim();
        if (Username === "") {
            document.getElementById("errorUsername").innerText = "Username is required";
            flag = false;
        } else {
            document.getElementById("errorUsername").innerText = "";
        }
    
        // Validation for Password
        const Password = document.getElementById("Password").value.trim();
        if (Password === "") {
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
        if (Password !== confirmPassword) {
            document.getElementById("errorConfirmPassword").innerText = "Passwords do not match";
            flag = false;
        } else {
            document.getElementById("errorConfirmPassword").innerText = "";
        }

    
        return flag;
    }
    