function validateForm() {
    let username = document.forms["contactForm"]["username"].value;
    let surname = document.forms["contactForm"]["surname"].value;
    let email = document.forms["contactForm"]["email"].value;
    let tel = document.forms["contactForm"]["tel"].value;
    let message = document.forms["contactForm"]["message"].value;
    var isValid = true;


    if (username == "") {
        document.getElementById("username").innerHTML = "Username must be filled!";
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

    if (tel == "") {
        document.getElementById("tel").innerHTML = "Phone number must be filled!";
        isValid = false;
    }

    if (message == "") {
        document.getElementById("message").innerHTML = "Please write a message!";
        isValid = false;
    }

    if (isValid) {
        alert("Message sent successfully!");
    }

    return isValid;
}

document.getElementsByName('username')[0].addEventListener('keydown', function (event) {
    document.getElementById("username").innerHTML = "";
});
document.getElementsByName('surname')[0].addEventListener('keydown', function (event) {
    document.getElementById("surname").innerHTML = "";
});
document.getElementsByName('email')[0].addEventListener('keydown', function (event) {
    document.getElementById("email").innerHTML = "";
});
document.getElementsByName('tel')[0].addEventListener('keydown', function (event) {
    document.getElementById("tel").innerHTML = "";
});
document.getElementsByName('message')[0].addEventListener('keydown', function (event) {
    document.getElementById("message").innerHTML = "";
});