
function validateTransfer() {
    const toAccount = document.getElementById("toAccount").value;
    const fromAccount = document.getElementById("fromAccount").value;
    const amount = document.getElementById("amount").value;
    const description = document.getElementById("description").value;
    let flag = true;

  
    if (toAccount.trim() === "") {
        document.getElementById("errorToAccount").innerText = "Account is required";
        flag = false;
    } else {
        document.getElementById("errorToAccount").innerText = "";
    }

    
    if (fromAccount.trim() === "") {
        document.getElementById("errorFromAccount").innerText = "Account is required";
        flag = false;
    } else {
        document.getElementById("errorFromAccount").innerText = "";
    }

    if (amount.trim() === "") {
        document.getElementById("errorAmount").innerText = "Amount is required";
        flag = false;
    } else {
        document.getElementById("errorAmount").innerText = "";
    }

    if (description.trim() === "") {
        document.getElementById("errorDescription").innerText = "Description is required";
        flag = false;
    } else {
        document.getElementById("errorDescription").innerText = "";
    }

    return flag;
}
