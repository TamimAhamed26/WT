function validate() {
    const x = document.getElementById("PASS");
   


    
    const a = document.getElementById("error1");
   

    let flag = true;
    if (x.value === "") {
        a.innerHTML = "Password can not be empty";
        flag = false;
    } else {
        a.innerHTML = "";
    }

    return flag;
}