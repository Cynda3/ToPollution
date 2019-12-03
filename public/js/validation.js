//Validation of the name field in the register modal window

function validateRegisterForm() {
    //Variables of the Register form inputs
    var name = document.getElementById("name");
    var mail = document.getElementById("mail");
    var password = document.getElementById("password");

    //Regluar expresion to check if the email is valid
    var regex = new RegExp('^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$');

    console.log(mail.value);
   
    //Function to check if the name contains numbers
    var nombre = name.value;
    function hasnumber(nombre){
      return /\d/.test(nombre);
    }
    //Function to check if the email is valid
    var email = mail.value;
    function matchMail(nombre){
      return regex.test(nombre);
    }

    //Function to check the length of the password
    var passwordv = password.value;
    function checkPassword(passwordv){
     var cantCharacters = passwordv.length;
     return cantCharacters;
    }
    
    console.log(hasnumber(nombre));
    console.log(matchMail(email));
    console.log(checkPassword(passwordv));

    if (name.value === "" || hasnumber(nombre) == true ) {
      alert ("Please insert a name or check that only contains letters");
    }else if(mail.value === "" || matchMail(email) == false){
      alert("el mail introducido no es valido");
    }
  }


  