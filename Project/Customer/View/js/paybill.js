function validate() {
    const x = document.getElementById("amount");
    


    
    const a = document.getElementById("error1");
   

    let flag = true;
    if (x.value === "") {
        a.innerHTML = "amount can not be empty";
        flag = false;
    } else {
        a.innerHTML = "";
    }
    

    return flag;
}