
function validateLoan() {
    const purpose = document.getElementById("purpose").value;
    const monthlyIncome = document.getElementById("monthlyIncome").value;
    const amount = document.getElementById("amount").value;
    const phone = document.getElementById("phone").value;
    let flag = true;

  
    if (purpose.trim() === "") {
        document.getElementById("errorPurpose").innerText = "purpose is required";
        flag = false;
    } else {
        document.getElementById("errorPurpose").innerText = "";
    }

    
    if (monthlyIncome.trim() === "") {
        document.getElementById("errorMonthlyIncome").innerText = "monthly Income is required";
        flag = false;
    } else {
        document.getElementById("errorMonthlyIncome").innerText = "";
    }

    if (amount.trim() === "") {
        document.getElementById("errorAmount").innerText = "Amount is required";
        flag = false;
    } else {
        document.getElementById("errorAmount").innerText = "";
    }

    if (phone.trim() === "") {
        document.getElementById("errorPhone").innerText = "phone is required";
        flag = false;
    } else {
        document.getElementById("errorPhone").innerText = "";
    }

    return flag;
}
