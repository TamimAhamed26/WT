
function validateAlert() {
    const type= document.getElementById("type").value;
    const accountNo = document.getElementById("accountNo").value;
    const threshold = document.getElementById("threshold").value;
    const notificationMethod = document.getElementById("notificationMethod").value;
    let flag = true;

  
    if (type.trim() === "") {
        document.getElementById("errorType").innerText = "type is required";
        flag = false;
    } else {
        document.getElementById("errorType").innerText = "";
    }

    
    if (accountNo.trim() === "") {
        document.getElementById("errorAccountNo").innerText = "Account is required";
        flag = false;
    } else {
        document.getElementById("errorAccountNo").innerText = "";
    }

    if (threshold.trim() === "") {
        document.getElementById("errorThreshold").innerText = "threshold is required";
        flag = false;
    } else {
        document.getElementById("errorThreshold").innerText = "";
    }

    if (notificationMethod.trim() === "") {
        document.getElementById("errorNotificationMethod").innerText = "notification Method is required";
        flag = false;
    } else {
        document.getElementById("errorNotificationMethod").innerText = "";
    }

    return flag;
}

