function validateForm() {
    let username = document.forms["registerForm"]["username"].value;
    let email = document.forms["registerForm"]["email"].value;
    let password = document.forms["registerForm"]["password_1"].value;
    let confirmPassword = document.forms["registerForm"]["password_2"].value;
    var isValid = true;

    if (username == "") {
        document.getElementById("username").innerHTML = "Username must be filled!";
        isValid = false;
    }

    if (email == "") {
        document.getElementById("email").innerHTML = "Email must be filled!";
        isValid = false;
    }

    if (password == "") {
        document.getElementById("password_1").innerHTML = "Password must be filled!";
        isValid = false;
    }

    if (!checkPassword(password)) {
        document.getElementById("password_1").innerHTML =
            `Password must contain at least: <br/><br/>
                Minimum 6 characters <br/>
                Maximum 20 characters <br/>
                At least one digit <br/>
                At least one special character
            `;
        isValid = false;
    }

    if (confirmPassword == "") {
        document.getElementById("password_2").innerHTML = "Confirm password must be filled!";
        isValid = false;
    }

    if (password !== confirmPassword) {
        document.getElementById("password_2").innerHTML = "Passwords do not match!";
        isValid = false;
    }

    return isValid;
}

function checkPassword(password) {
    var regularExpression = /^(?=.*\d)(?=.*[a-zA-Z!#$%&? "])[a-zA-Z0-9!#$%&?]{6,20}$/;
    return regularExpression.test(password);
}

document.getElementsByName('username')[0].addEventListener('keydown', function (event) {
    document.getElementById("username").innerHTML = "";
});

document.getElementsByName('email')[0].addEventListener('keydown', function (event) {
    document.getElementById("email").innerHTML = "";
});
document.getElementsByName('password_1')[0].addEventListener('keydown', function (event) {
    document.getElementById("password_1").innerHTML = "";
});
document.getElementsByName('password_2')[0].addEventListener('keydown', function (event) {
    document.getElementById("password_2").innerHTML = "";
});