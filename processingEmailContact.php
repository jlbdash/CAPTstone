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
        $mail = "";
    }
}
echo $mail;
