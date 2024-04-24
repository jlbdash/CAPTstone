<?php

$mail = "";
$checker = "";
$q = $_REQUEST["q"];

function test_input($q) {
    $q = trim($q);
    $q = stripslashes($q);
    $q = htmlspecialchars($q);
    return true;
}

if (test_input($q) === true) {
    if (!filter_var($q, FILTER_VALIDATE_EMAIL)) {
        $mail = "needs format of: example@mail.here";
    } else {

        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "capt";

        $conn = new mysqli($servername, $username, $password, $dbname);

// MySQLi Object-oriented
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE email = '$q' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $mail = "Email taken";
        } else {
            $mail = "Valid";
        }
        $conn->close();
    }
}
echo $mail;

