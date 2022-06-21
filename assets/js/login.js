function validate(){
    let email=document.getElementById("email").value;
    let emailRegex=/[a0-z9]@[a-z][.com]/g;
    let pwd=document.getElementById("pwd").value;
    let passwordRegex=/[aA0-zZ9]/g;
    if(!emailRegex.test(email))
    {
        alert("Please enter a valid Username");
        return false;
    }
    if(!passwordRegex.test(pwd))
    {
        alert("Enter only Alphanumeric value");
        return false;
    }

}
function validateForm() {
   let x =
       document.forms["login-form"]
    ["email"].value;
   if (x==="") {
       alert("username is empty");
       return false;
   }
    let y =
        document.forms["login-form"]
            ["password"].value;
    if (y==="") {
        alert("password is incorrect");
        return false;
    }
}
function  myFunction() {
   let x =
       document.getElementById("pwd");
   if (x.type === "password"){
       x.type = "text";
   } else {
       x.type ="password";
   }
}