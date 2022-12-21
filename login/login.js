function validateForm() {
    let username = document.forms["loginForm"]["username"].value;
    let password = document.forms["loginForm"]["password"].value;
    var isValid = true;
    if (username == "") {
        document.getElementById("username").innerHTML = "Username must be filled!";
        isValid = false;
    }

    if (password == "") {
        document.getElementById("password").innerHTML = "Password must be filled!";
        isValid = false;
    }

    return isValid;
}

document.getElementsByName('username')[0].addEventListener('keydown', function(event) {
    document.getElementById("username").innerHTML = "";
});
document.getElementsByName('password')[0].addEventListener('keydown', function(event) {
    document.getElementById("password").innerHTML = "";
});