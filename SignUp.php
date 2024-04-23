<?php
// session start
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="overallCSS.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="validation.js"></script>
    </head>
    <body>
        <header>
            <?php require "HandF/header.php"; ?>
        </header>
        <br>
        <section>
            <h2>Sign Up Form</h2>
            <br>
            <div class="section-row">
                <div class="section-column">
                    <div class="section-item">
                        <!-- Validation for Form -->
                        <?php
                        $firstNameE = $lastNameE = $passE = $emailE = "";
                        $firstName = $lastName = $passcode = $email = "";
                        ?>


                        <!-- start of Form -->
                        <form id="signin" method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            First Name: <input type="text" id="firstname" name="firstName" value="<?php echo $firstName; ?>" onkeyup="firstKey(this.value)" required> <span name="firstNameE" id="firstNameE" class="error"></span> <br>
                            Last Name: <input type="text" id="lastname" name="lastName" value="<?php echo $lastName; ?>" onkeyup="lastKey(this.value)" required> <span name="lastNameE" id="lastNameE" class="error"></span> <br>
                            E-mail: <input type="text" id="email" name="email" value="<?php echo $email; ?>" onkeyup="emailKey(this.value)" onchange="submission()" required> <span name="emailE" id="emailE" class="error"></span> <br>
                            Password: <input type="password" id="passcode" name="passcode" value="<?php echo $passcode; ?>" onkeyup="passKey(this.value)" onchange="submission()" required> <span name="passE" id="passE" class="error"></span> <br>
                            <input type="submit" id="submit" name="submit" value="Submit" disabled> 
                        </form>
                    </div>
                    <div class="section-item">

                        <?php
                        if ($_POST != Null) {
                            $servername = "localhost";
                            $username = "CST8257";
                            $password = "cakeall";
                            $dbname = "capt";

                            $conn = new mysqli($servername, $username,
                                    $password, $dbname);

// MySQLi Object-oriented
// Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

// prepare and bind statment
                            $stmt = $conn->prepare("INSERT INTO `user` (`id`,`first`,`last`,`email`,`password`) VALUES (?, ?, ?, ?, ?)");
                            $stmt->bind_param("sssss", $id, $firstName,
                                    $lastName, $email, $hashedPassword
                            );

// set parameters and execute 
                            $id = "NULL";
                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $email = $_POST['email'];
                            $hashedPassword = hash("sha256", $_POST['passcode']
                            );
                            $stmt->execute();
                            $stmt->close();
                            $conn->close();

                            echo "You are signed up as a member";
                        }
                        ?>
                    </div>
                </div>
                <div class = "section-item">
                    <img class="tallImg" src = "images/stock3.avif" alt = "alt"/>
                </div>
            </div>
            <br>
        </section>
        <footer>
<?php require "HandF/footer.php"; ?>
        </footer>
    </body>
</html>
