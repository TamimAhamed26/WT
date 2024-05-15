function validate() {
    const x = document.getElementById("account");
   


    
    const a = document.getElementById("error1");
   

    let flag = true;
    if (x.value === "") {
        a.innerHTML = "Please fill up the account name";
        flag = false;
    } else {
        a.innerHTML = "";
    }

    return flag;
}