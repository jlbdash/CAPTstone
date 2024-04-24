<?php
if (empty($_SESSION["toggle"])) {
    $_SESSION["toggle"] = "loggedoff";
} elseif ($_SESSION["toggle"] != "loggedin"){
    $_SESSION["toggle"] = "loggedoff";
}
?>

<html>
    <head>
        <Title>CAPT</Title> <!<!-- For the Tab Title -->
        <link rel="stylesheet" href="HandF/header.css">

        <script src="HandF/hamburgerMenu.js"></script>
    </head>
    <div class="header-flex-row">
        <img id="logo" src="images/logo.png" alt="CAPT logo - four people representations, two leaning left and two leaning right"/>
        <div class="header-flex-column">
            <div class="header-flex-row">
                <div class="header-flex-box"> <!<!-- Website Title! -->
                    <h1> Canadian Association for Population Therapeutics </h1>
                </div>
                <div class="header-flex-box">
                    <?php if ($_SESSION["toggle"] === "loggedoff") { ?>
                        <button onclick="document.location = 'LogIn.php'">Log In</button>
                    <?php } ?>
                </div>
            </div>
            <div class="header-flex-row">
                <div class="hamburger-menu" onclick="toggleMenu()">
                    <div class="hamburger-icon">&#9776;</div>
                </div>
                <div class="header-flex-box">
                </div>
                <nav class="header-flex-row" id="hamburger-menu">
                    <ul><a href="home.php">Home </a></ul>
                    <ul><a href="about.php">About Us </a></ul>
                    <ul class=$_SESSION["toggle"] ><a href="profile.php">Profile </a></ul>
                    <ul><a href="about.php">Events </a></ul>
                    <ul><a href="contact.php">Contact Us </a></ul>
                </nav>
                <div class="header-flex-box">
                </div>
                <div class="header-flex-box">
                </div>
            </div>
        </div>
    </div>
</html>