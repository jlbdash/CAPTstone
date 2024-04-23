<?php

$hint = "";
$q = $_REQUEST["q"];

function test_input($q) {
    $q = trim($q);
    $q = stripslashes($q);
    $q = htmlspecialchars($q);
    return true;
}

if (test_input($q) === true) {
    $lowerCaseLetters = "/[a-z]/";
    if (!(preg_match($lowerCaseLetters, $q))) {
        $hint .= "needs at least one lowercase character<br>";
    } else {
        
    }
// Validate capital letters
    $upperCaseLetters = "/[A-Z]/";
    if (!(preg_match($upperCaseLetters, $q))) {
        $hint .= "needs at least one uppercase character<br>";
    }
// Validate numbers
    $numbers = "/\d/";
    if (!(preg_match($numbers, $q))) {
        $hint .= "needs at least one number character<br>";
    }
// Validate length
    if (!(strlen($q) >= 8)) {
        $hint .= "needs to be at least eight characters<br>";
    }
    if (preg_match($lowerCaseLetters, $q) AND
            preg_match($upperCaseLetters, $q) AND
            preg_match($numbers, $q) AND (strlen($q) >= 8)) {
        $hint = 'Valid';
    }
}
echo $hint;

