
function validateDeposit() {
    const accountNo = document.getElementById("accountNo").value;
    const type = document.getElementById("type").value;
    const amount = document.getElementById("amount").value;
    const description = document.getElementById("description").value;
    let flag = true;

  
    if (accountNo.trim() === "") {
        document.getElementById("errorAccountNo").innerText = "Account is required";
        flag = false;
    } else {
        document.getElementById("errorAccountNo").innerText = "";
    }

    if (type.trim() === "") {
        document.getElementById("errorType").innerText = "Type is required";
        flag = false;
    } else {
        document.getElementById("errorType").innerText = "";
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
