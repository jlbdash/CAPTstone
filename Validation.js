//Validation for Sign Up Name
function firstKey(str) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("firstNameE").innerHTML = this.responseText;
    };
    xhttp.open("GET", "processingName.php?q=" + str);
    xhttp.send();

}

function lastKey(str) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("lastNameE").innerHTML = this.responseText;
    };
    xhttp.open("GET", "processingName.php?q=" + str);
    xhttp.send();

}

//Validation for Sign Up Password
function passKey(str) {
    var passE = document.getElementById("passE");
    var xhttp;
    if (str === "") {
        passE.innerHTML = "";
    } else {
        xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            passE.innerHTML = this.responseText;
        };
        xhttp.open("GET", "processingPass.php?q=" + str);
        xhttp.send();
    }
}

//Validation for sign Up Email
function emailKey(str) {
    var emailE = document.getElementById("emailE");
    var xhttp;
    if (str === "") {
        emailE.innerHTML = "";
    } else {
        xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            emailE.innerHTML = this.responseText;
        };
        xhttp.open("GET", "processingEmail.php?q=" + str);
        xhttp.send();
    }
}

//Validation for sign Up Email on the Contact Us Page
function emailCKey(str) {
    var emailE = document.getElementById("emailE");
    var xhttp;
    if (str === "") {
        emailE.innerHTML = "";
    } else {
        xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            emailE.innerHTML = this.responseText;
        };
        xhttp.open("GET", "processingEmailContact.php?q=" + str);
        xhttp.send();
    }
}

// Allowance for Sign Up Submission
function submission() {
    if (document.getElementById("emailE").innerHTML === "Valid") {
        if (document.getElementById("passE").innerHTML === "Valid") {
            document.forms["signin"]["submit"].removeAttribute("disabled");
        }
    }
}
