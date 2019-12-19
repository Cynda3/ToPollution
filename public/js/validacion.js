$(document).ready(function () {
    //Hide all error messages
    $('#nameError').hide();
    $('#emailError').hide();
    $('#emailError2').hide();
    $('#passError').hide();
    $('#passError2').hide();
    $('#cPassError').hide();

    //Email regex
    var re = new RegExp("^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$");

    //Every time we release a key checks validation
    $('input').keyup(function () {
        //Take all the values of inputs
        let name = document.getElementById('name').value
        let email = document.getElementById('email').value
        let password = document.getElementById('password').value
        let confirmpassword = document.getElementById('password-confirm').value

        //Dont have any empty imput
        if (name === '') {
            $('#Registrarse').prop('disabled', true);
            $('#nameError').show();
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
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
        //Email regex validation
        else if (!re.test(email)){
            $('#Registrarse').prop('disabled', true);
            $('#emailError2').show();
            $('#nameError').hide();
            $('#emailError').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
        else if(password === ''){
            $('#Registrarse').prop('disabled', true);
            $('#passError').show();
            $('#nameError').hide();
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
        //Password length
        else if(password.length < 8){
            $('#Registrarse').prop('disabled', true);
            $('#passError2').show();
            $('#nameError').hide();
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
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
        }
        else {
            $('#Registrarse').prop('disabled', false);
            $('#nameError').hide();
            $('#emailError').hide();
            $('#emailError2').hide();
            $('#passError').hide();
            $('#passError2').hide();
            $('#cPassError').hide();
        }
    });

});
