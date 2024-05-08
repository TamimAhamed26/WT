function validateField(fieldName, errorId, errorMessage, pattern) {
    const x = document.getElementById(fieldName);
    const a = document.getElementById(errorId);
    let flag = true;
  
    if (fieldName === "email" || fieldName === "phone_number" ||  fieldName === "postal_code" || fieldName === "street_address") {
        // Validation for email, phone, website, postcode, and message fields
        if (x.value === "") {
            a.innerHTML = errorMessage;
            flag = false;
        } else {
            if (!pattern.test(x.value)) {
                a.innerHTML = "Invalid format for " + fieldName;
                flag = false;
            } else {
                a.innerHTML = "";
            }
        }
    } else if (fieldName === "password") {
        // Validation for password
        if (x.value === "") {
            a.innerHTML = errorMessage;
            flag = false;
        } else if (!pattern.test(x.value)) {
            a.innerHTML = "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 digit, and 1 special character" + fieldName;
            flag = false;
        }
        
        else {
            a.innerHTML = "";
        }
    } 
    
      else {
      // Validation for other fields (text, etc.)
      if (x.value === "") {
        a.innerHTML = errorMessage;
        flag = false;
      } else if (!pattern.test(x.value)) {
        a.innerHTML = "Only letters and white space allowed for " + fieldName;
        flag = false;
      } else {
        a.innerHTML = "";
      }
    }
  
    return flag;
}

function validateDOB(fieldName, errorId, errorMessage) {
    const x = document.getElementById(fieldName);
    const a = document.getElementById(errorId);
    let flag = true;

    if (x.value === "") {
        a.innerHTML = errorMessage;
        flag = false;
    } else {
        const dob = new Date(x.value);
        const currentDate = new Date();
        const minAge = new Date(currentDate.getFullYear() - 18, currentDate.getMonth(), currentDate.getDate());

        if (isNaN(dob.getTime())) {
            a.innerHTML = "Invalid DOB format";
            flag = false;
        } else if (dob > currentDate) {
            a.innerHTML = "DOB cannot be in the future";
            flag = false;
        } else if (dob > minAge) {
            a.innerHTML = "Minimum age requirement is 18 years";
            flag = false;
        } else {
            a.innerHTML = "";
        }
    }

    return flag;
}

function validateRadioButtons(fieldName, errorId, errorMessage) {
  const radioButtons = document.getElementsByName(fieldName);
  const a = document.getElementById(errorId);
  let flag = false;

  for (let i = 0; i < radioButtons.length; i++) {
      if (radioButtons[i].checked) {
          flag = true;
          break;
      }
  }

  if (!flag) {
      a.innerHTML = errorMessage;
  } else {
      a.innerHTML = "";
  }

  return flag;
}


function validateAllFields() {
    const pattern = /^[a-zA-Z-' ]*$/;
    const addressPattern = /^[a-zA-Z0-9\s,\-\/\.'#]*$/;
    const postFieldPattern = /^[0-9]+$/;
    const emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const phonePattern = /^\+880\d{10}$/;
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/;

    const fields = [
      { fieldName: "firstname", errorId: "error1", errorMessage: "Please fill up the first name" },
      { fieldName: "lastname", errorId: "error2", errorMessage: "Please fill up the last name" },
      { fieldName: "username", errorId: "error5", errorMessage: "Please fill up the username" },
      { fieldName: "email", errorId: "error6", errorMessage: "Please fill up the email", pattern: emailPattern },
      { fieldName: "State", errorId: "error10", errorMessage: "Please select a country" },
      { fieldName: "city", errorId: "error11", errorMessage: "Please select a city" },
      { fieldName: "phone_number", errorId: "error12", errorMessage: "Please fillup phone ",  pattern: phonePattern },
     // { fieldName: "date_of_birth", errorId: "error13", errorMessage: "Please fillup the website", pattern: websitePattern },
      { fieldName: "postal_code", errorId: "error14", errorMessage: "Please fillup postcode ",  pattern: postFieldPattern },
      { fieldName: "street_address", errorId: "error15", errorMessage: "Please fillup address", pattern: addressPattern },
      { fieldName: "password", errorId: "error16", errorMessage: "Please fillup password", pattern: passwordPattern },
     
    ];
  
    let allFieldsValid = true;

    const isGenderValid = validateRadioButtons("gender", "error7", "Please select a gender");
    if (!isGenderValid) {
        allFieldsValid = false;
    }

    const isDOBValid = validateDOB("date_of_birth", "error13", "Please fill up the date of birth");
    if (!isDOBValid) {
        allFieldsValid = false;
    }


    
    
        fields.forEach(field => {
            const isValid = validateField(field.fieldName, field.errorId, field.errorMessage, field.pattern || pattern);
            if (!isValid) {
                allFieldsValid = false;
            }
        });
    

    return allFieldsValid ;
}
