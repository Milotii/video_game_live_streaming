function validateForm(){
    let name = document.forms["registerForm"]["name"].value;
    let surname = document.forms["registerForm"]["surname"].value;
    let email = document.forms["registerForm"]["email"].value;
    let password = document.forms["registerForm"]["password"].value;
    let confirmPassword = document.forms["registerForm"]["confirm-password"].value;
    var isValid = true;

    if (name == "") {
        document.getElementById("name").innerHTML = "Name must be filled!";
        isValid = false;
    }

    if (surname == "") {
        document.getElementById("surname").innerHTML = "Surname must be filled!";
        isValid = false;
    }

    if (email == "") {
        document.getElementById("email").innerHTML = "Email must be filled!";
        isValid = false;
    }

    if (password == "") {
        document.getElementById("password").innerHTML = "Password must be filled!";
        isValid = false;
    }

    if (confirmPassword == "") {
        document.getElementById("confirm-password").innerHTML = "Confirm password must be filled!";
        isValid = false;
    }

    return isValid;
}

document.getElementsByName('name')[0].addEventListener('keydown', function(event) {
    document.getElementById("name").innerHTML = "";
});
document.getElementsByName('surname')[0].addEventListener('keydown', function(event) {
    document.getElementById("surname").innerHTML = "";
});
document.getElementsByName('email')[0].addEventListener('keydown', function(event) {
    document.getElementById("email").innerHTML = "";
});
document.getElementsByName('password')[0].addEventListener('keydown', function(event) {
    document.getElementById("password").innerHTML = "";
});
document.getElementsByName('confirm-password')[0].addEventListener('keydown', function(event) {
    document.getElementById("confirm-password").innerHTML = "";
});