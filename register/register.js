function validateForm() {
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

    if (!checkPassword(password)) {
        document.getElementById("password").innerHTML =
            `Password must contain at least: <br/><br/>
                Minimum 6 characters <br/>
                Maximum 20 characters <br/>
                At least one digit <br/>
                At least one special character
            `;
        isValid = false;
    }

    if (confirmPassword == "") {
        document.getElementById("confirm-password").innerHTML = "Confirm password must be filled!";
        isValid = false;
    }

    if (password !== confirmPassword) {
        document.getElementById("confirm-password").innerHTML = "Passwords do not match!";
        isValid = false;
    }

    return isValid;
}

function checkPassword(password) {
    var regularExpression = /^(?=.*\d)(?=.*[a-zA-Z!#$%&? "])[a-zA-Z0-9!#$%&?]{6,20}$/;
    return regularExpression.test(password);
}

document.getElementsByName('name')[0].addEventListener('keydown', function (event) {
    document.getElementById("name").innerHTML = "";
});
document.getElementsByName('surname')[0].addEventListener('keydown', function (event) {
    document.getElementById("surname").innerHTML = "";
});
document.getElementsByName('email')[0].addEventListener('keydown', function (event) {
    document.getElementById("email").innerHTML = "";
});
document.getElementsByName('password')[0].addEventListener('keydown', function (event) {
    document.getElementById("password").innerHTML = "";
});
document.getElementsByName('confirm-password')[0].addEventListener('keydown', function (event) {
    document.getElementById("confirm-password").innerHTML = "";
});