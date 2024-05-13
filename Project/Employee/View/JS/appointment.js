
function validateAppointment() {
    const date = document.getElementById("date").value;
    const time = document.getElementById("time").value;
    const purpose = document.getElementById("purpose").value;
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    let flag = true;

  
    if (date.trim() === "") {
        document.getElementById("errorDate").innerText = "Date is required";
        flag = false;
    } else {
        document.getElementById("errorDate").innerText = "";
    }

    
    if (time.trim() === "") {
        document.getElementById("errorTime").innerText = "Time is required";
        flag = false;
    } else {
        document.getElementById("errorTime").innerText = "";
    }

    if (phone.trim() === "") {
        document.getElementById("errorPhone").innerText = "Phone number is required";
        flag = false;
    } else {
        document.getElementById("errorPhone").innerText = "";
    }

    if (purpose.trim() === "") {
        document.getElementById("errorPurpose").innerText = "Purpose is required";
        flag = false;
    } else {
        document.getElementById("errorPurpose").innerText = "";
    }

    if (email.trim() === "") {
        document.getElementById("errorEmail").innerText = "Email is required";
        flag = false;
    } else {
        document.getElementById("errorEmail").innerText = "";
    }

    if (name.trim() === "") {
        document.getElementById("errorName").innerText = "Name is required";
        flag = false;
    } else {
        document.getElementById("errorName").innerText = "";
    }


    return flag;
}
