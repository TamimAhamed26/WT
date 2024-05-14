/*
function validate() {
	const x = document.getElementById("firstname");
	const y = document.getElementById("lastname");
    const z = document.getElementById("nid");
    const l = document.getElementById("presentaddress");
    const m = document.getElementById("permanentaddress");
    const n = document.getElementById("phonenumber");
    const o = document.getElementById("email");
    const p = document.getElementById("username");
    const q = document.getElementById("password");
    const r = document.getElementById("confirmpassword");
 
	  const a = document.getElementById("error1");
	  const b = document.getElementById("error2");
    const c = document.getElementById("error3");
    const d = document.getElementById("error4");
    const e = document.getElementById("error5");
    const f = document.getElementById("error6");
    const g = document.getElementById("error7");
    const h = document.getElementById("error8");
    const i = document.getElementById("error9");
    const j = document.getElementById("error10");
 
	let flag = true;
	if(x.value === "") {
		a.innerHTML = "*Please flll up the firstname";
		flag = false;
	}
	if (y.value === "") {
		b.innerHTML = "*Please flll up the lastname";
		flag = false;
	}
    if (z.value === "") {
		c.innerHTML = "*Please flll up the nid";
		flag = false;
	}
    if (l.value === "") {
		d.innerHTML = "*Please flll up the presentaddress";
		flag = false;
	}
    if (m.value === "") {
		e.innerHTML = "*Please flll up the permanentaddress";
		flag = false;
	}
    if (n.value === "") {
		f.innerHTML = "*Please flll up the phonenumber";
		flag = false;
	}
    if (o.value === "") {
		g.innerHTML = "*Please flll up the email";
		flag = false;
	}
    if (p.value === "") {
		h.innerHTML = "*Please flll up the username";
		flag = false;
	}
    if (q.value === "") {
		i.innerHTML = "*Please flll up the password";
		flag = false;
	}
    if (r.value === "") {
		j.innerHTML = "*Please flll up the confirmpassword";
		flag = false;
	}
 
	return flag;
}
*/

function validateField(fieldName, errorId, errorMessage, pattern) {
    const x = document.getElementById(fieldName);
    const a = document.getElementById(errorId);
    let flag = true;
  
    if (fieldName === "email" || fieldName === "phone" || fieldName === "website" || fieldName === "postcode" || fieldName === "message") {
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
    else if (fieldName === "confirm-password") {
      // Validation for confirm-password
      const password = document.getElementById("password").value;
      if (x.value === "") {
          a.innerHTML = errorMessage;
          flag = false;
      } else if (x.value !== password) {
          a.innerHTML = "Passwords do not match";
          flag = false;
      } else {
          a.innerHTML = "";
      }
  }
    
    else if (x.tagName.toLowerCase() === "select") {
      // Validation for select fields
      if (x.value === "") {
        a.innerHTML = errorMessage;
        flag = false;
      }
       else {
        a.innerHTML = "";
      }
    }  else {
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
    const websitePattern = /^(?:https?:\/\/)?(?:www\.)?[-a-z0-9+&@#\/%?=~_|!:,.;]*[a-z0-9\/](\.com|\.net|\.gov|\.edu)(\/[-a-z0-9+&@#\/%?=~_|!:,.;]*)?$/i;
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/;

    const fields = [
      { fieldName: "first-name", errorId: "error1", errorMessage: "Please fill up the first name" },
      { fieldName: "last-name", errorId: "error2", errorMessage: "Please fill up the last name" },
      { fieldName: "father-name", errorId: "error3", errorMessage: "Please fill up the father's name" },
      { fieldName: "mother-name", errorId: "error4", errorMessage: "Please fill up the mother's name" },
      { fieldName: "user-name", errorId: "error5", errorMessage: "Please fill up the username" },
      { fieldName: "email", errorId: "error6", errorMessage: "Please fill up the email", pattern: emailPattern },
      { fieldName: "blood-group", errorId: "error8", errorMessage: "Please select a blood group" },
      { fieldName: "religion", errorId: "error9", errorMessage: "Please select a religion" },
      { fieldName: "country", errorId: "error10", errorMessage: "Please select a country" },
      { fieldName: "city", errorId: "error11", errorMessage: "Please select a city" },
      { fieldName: "phone", errorId: "error12", errorMessage: "Please fillup phone ",  pattern: phonePattern },
      { fieldName: "website", errorId: "error13", errorMessage: "Please fillup the website", pattern: websitePattern },
      { fieldName: "postcode", errorId: "error14", errorMessage: "Please fillup postcode ",  pattern: postFieldPattern },
      { fieldName: "message", errorId: "error15", errorMessage: "Please fillup address", pattern: addressPattern },
      { fieldName: "password", errorId: "error16", errorMessage: "Please fillup password", pattern: passwordPattern },
      { fieldName: "confirm-password", errorId: "error17", errorMessage: "cannot be empty" },

    ];
  
    let allFieldsValid = true;

    const isGenderValid = validateRadioButtons("gender", "error7", "Please select a gender");
    if (!isGenderValid) {
        allFieldsValid = false;
    }

    
    fields.forEach(field => {
      const isValid = validateField(field.fieldName, field.errorId, field.errorMessage, field.pattern || pattern);
      if (!isValid) {
        allFieldsValid = false;
      }
    });
  
    return allFieldsValid;
}
function updateLastModifiedAndSaveDraft() {
  var now = new Date();
  var formattedDate = now.toLocaleString();
  var expirationDate = new Date(now.getTime() + 600000); // 10 minutes from now
  localStorage.setItem('lastModified', JSON.stringify({ date: formattedDate, expires: expirationDate }));

  // Save form data into cookies
  const formFields = document.querySelectorAll('input[type=text], input[type=password], input[type=email], select, input[type=radio]:checked, input[type=url], input[type=tel]');
  formFields.forEach(field => {
    setCookie(field.id, field.value, 1 / 144); // 10 minutes expiration (in days)
  });

  document.getElementById('lastModified').innerText = formattedDate;
  return false; // Prevent form submission
}

function checkLastModifiedAndLoadDraft() {
  var savedData = JSON.parse(localStorage.getItem('lastModified'));
  if (savedData && new Date() < new Date(savedData.expires)) {
    document.getElementById('lastModified').innerText = savedData.date;
  } else {
    updateLastModifiedAndSaveDraft();
  }

  document.querySelectorAll('input, select').forEach(function(input) {
    var savedValue = getCookie(input.id);
    if (savedValue) {
      if (input.type === 'radio') {
        // Check the radio button with the saved value
        document.querySelectorAll(`input[name="${input.name}"][value="${savedValue}"]`).forEach(radio => {
          radio.checked = true;
        });
      } else {
        input.value = savedValue;
      }
    }
  });
}

function setCookie(name, value, days) {
  var expires = "";
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

window.onload = checkLastModifiedAndLoadDraft;