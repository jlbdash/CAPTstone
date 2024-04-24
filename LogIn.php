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

        <!-- Validation for Form -->
        <?php
        $pass = $email = "";
        ?>
        <section>
            <!-- Start of Form -->
            <h2>Log In</h2>
            <div class="section-row">
                <div class="section-item">
                    <form name="login" id="login" method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        E-mail: <input type="text" id="email" name="email" value="<?php echo $email; ?>" required> <span name="emailE" id="emailE" class="error"></span> <br>
                        Password: <input type="password" id="pass" name="pass" value="<?php echo $pass; ?>" required> <span name="passE" id="passE" class="error"></span> <br>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                    <br>
                </div>
                <div class="section-item"></div>
            </div>
            <div class="section-row">
                <div class="section-item">
                    <?php
                    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
                        $servername = "localhost";
                        $username = "username";
                        $password = "password";
                        $dbname = "capt";
                        $conn = new mysqli($servername, $username, $password,
                                $dbname);

                        // MySQLi Object-oriented
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $id = "NULL";
                        $passcode = hash("sha256", $_POST['pass']);
                        $email = $_POST['email'];

                        //get the hash of the user entered password
                        $selectUser = "SELECT * FROM user WHERE email = '$email' ";
                        $row = $conn->query($selectUser);
                        $result = $row->fetch_assoc();

                        if ($result == 0) {
                            echo "Incorrect Email or Password";
                        } else if ($passcode === $result["password"]) {
                            $_SESSION["id"] = $result['id'];
                            $_SESSION["email"] = $result['email'];
                            $_SESSION["firstName"] = $result['first'];
                            $_SESSION["lastName"] = $result['last'];
                            $_SESSION["toggle"] = "loggedin";
                            header("location:home.php");
                        } else {
                            echo "<strong>Failed</strong>";
                        }

                        $conn->close();
                    }
                    ?>
                </div>
                <div class="section-item"></div>
                <div class="section-item"></div>
            </div>
            <br>
            <div class="section-row">
                <div class="section-item">
                    If you are not a member,&nbsp;<a href="SignUp.php">sign up here</a>!
                </div>
                <div class="section-item"></div>
                <div class="section-item"></div>
            </div>
        </section>

        <footer>
            <?php require "HandF/footer.php"; ?>
        </footer>
    </body>
</html>
