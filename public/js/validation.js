//Validation of the name field in the register modal window

function validateRegisterForm() {
    //Variables of the Register form inputs
    var numeracion = 0;
    var name = document.getElementById("name");
    var mail = document.getElementById("mail");
    var password = document.getElementById("password");
    var cpassword = document.getElementById("CPassword")
    
    var nombre = name.value;
    function hasNumber(nombre) {
      return /\d/.test(nombre);
    }

    console.log(hasNumber(nombre));

    //Function to check if the email is valid
    var email = mail.value;
    function matchMail(nombre){
      return regex.test(nombre);
    }













    /*
    if (name.value === "" || hasnumber(nombre) == true ) {
      alert ("Please insert a name or check that only contains letters");
    }else if(mail.value === "" || matchMail(email) == false){
      alert("Please insert a valid email");
    }else if(password.value === " "){
      alert("Please insert an email");
    }else if(password.value != cpassword.value){
      alert("The inserted passwords dont match");
    }else{
      alert("The registration was successful");
    }
    */

    

  }