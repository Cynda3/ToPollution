$(document).ready(function () {
    //Hide all error messages
    $('#nameError').hide();
    $('#nameError2').hide();
    $('#lastnameError').hide();
    $('#lastnameError2').hide();
    $('#emailError').hide();
    $('#emailError2').hide();
    $('#passError').hide();
    $('#passError2').hide();
    $('#cPassError').hide();

    //Regex
    var reEmail = /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/m;
    var reName = /^[A-Za-z+ +]{1,20}$/m;
    var reLastName = /^[A-Za-z+ +]{1,20}$/m;
    var rePass = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/m;

    //Every time we release a key checks validation
    $('input').keyup(function () {
        //Take all the values of inputs
        let name = document.getElementById('name').value
        let lastname = document.getElementById('lastname').value
        let email = document.getElementById('email').value
        let password = document.getElementById('password').value
        let confirmpassword = document.getElementById('password-confirm').value

        //Dont have any empty imput
        if (name === '') {
            $('#Registrarse').prop('disabled', true);
            $('#nameError').show();
            $('#nameError2').hide();
            $('#lastnameError').hide();
            $('#lastnameError2').hide();
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
        //Name regex validation
        else if(name.match(reName) === null){
            $('#Registrarse').prop('disabled', true);
            $('#nameError2').show();
            $('#nameError').hide();
            $('#lastnameError2').hide();
            $('#lastnameError').hide();
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
        else if(email === ''){
            $('#Registrarse').prop('disabled', true);
            $('#emailError').show();
            $('#nameError').hide();
            $('#nameError2').hide();
            $('#lastnameError').hide();
            $('#lastnameError2').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
         //LastName regex validation
         else if(lastname.match(reLastName) === null){
            $('#Registrarse').prop('disabled', true);
            $('#nameError2').hide();
            $('#nameError').hide();
            $('#lastnameError2').show();
            $('#lastnameError').hide();
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
        else if(email === ''){
            $('#Registrarse').prop('disabled', true);
            $('#emailError').show();
            $('#nameError').hide();
            $('#nameError2').hide();
            $('#lastnameError').hide();
            $('#lastnameError2').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
        //Email regex validation
        else if (email.match(reEmail) === null){
            $('#Registrarse').prop('disabled', true);
            $('#emailError2').show();
            $('#nameError').hide();
            $('#lastnameError').hide();
            $('#emailError').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
        else if(password === ''){
            $('#Registrarse').prop('disabled', true);
            $('#passError').show();
            $('#nameError').hide();
            $('#nameError2').hide();
            $('#lastnameError').hide();
            $('#lastnameError2').hide();
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
        //Password regex validation
        else if(password.match(rePass) === null){
            $('#Registrarse').prop('disabled', true);
            $('#passError2').show();
            $('#nameError').hide();
            $('#nameError2').hide();
            $('#lastnameError').hide();
            $('#lastnameError2').hide();
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#cPassError').hide();
        }
        //Confirm password must be same as password
        else if(password !== confirmpassword){
            $('#Registrarse').prop('disabled', true);
            $('#cPassError').show();
            $('#nameError').hide();
            $('#nameError2').hide();
            $('#lastnameError').hide();
            $('#lastnameError2').hide();
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
        }
        else {
            $('#Registrarse').prop('disabled', false);
            $('#nameError').hide();
            $('#nameError2').hide();
            $('#lastnameError').hide();
            $('#lastnameError2').hide();
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
    });

});
