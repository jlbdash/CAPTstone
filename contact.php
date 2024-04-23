<?php
// session start
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="overallCSS.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="Validation.js"></script>
    </head>
    <body>
        <header>
            <?php require "HandF/header.php"; ?>
        </header>
        <br>
        <section>
            <h2>Contact Us</h2>
            <br>
            <div class="section-row">
                <div class="section-column">
                    <div class="section-item">
                        <!-- Validation for Form -->
                        <?php
                        $firstNameE = $subjectE = $emailE = "";
                        $name = $subject = $message = $email = "";
                        ?>


                        <!-- start of Form -->
                        <form id="contact" method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            First Name: <input type="text" id="name" name="name" value="<?php echo $name; ?>" onkeyup="firstKey(this.value)" required> <span name="firstNameE" id="firstNameE" class="error"></span> <br>
                            E-mail: <input type="text" id="email" name="email" value="<?php echo $email; ?>" onkeyup="emailCKey(this.value)" required> <span name="emailE" id="emailE" class="error"></span> <br>
                            Subject: <input type="text" id="subject" name="subject" value="<?php echo $subject; ?>" onkeyup="lastKey(this.value)" required> <span name="lastNameE" id="lastNameE" class="error"></span> <br>
                            Message: <br>
                            <textarea type="message" id="message" name="message" value="<?php echo $message; ?>" required"></textarea><br>
                            <input type="submit" id="submit" name="submit" value="Submit" > 
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
                            $stmt = $conn->prepare("INSERT INTO `contact` (`id`,`name`,`time`,`email`,`subject`,`message`) VALUES (?, ?, ?, ?, ?, ?)");
                            $stmt->bind_param("ssssss", $id, $name, $time,
                                    $email, $subject, $message
                            );
                            
// set parameters and execute 
                            $id = "NULL";
                            $name = $_POST['name'];
                            $time = "NULL";
                            $email = $_POST['email'];
                            $subject = $_POST['subject'];
                            $message = $_POST['message'];
                            $stmt->execute();
                            $stmt->close();
                            $conn->close();

                            echo "Your message has been sent";
                        }
                        ?>
                    </div>
                </div>
                <div class = "section-item">
                    <img src = "images/stock3.avif" class ="tallImg" alt = "alt"/>
                </div>
            </div>
            <br>
        </section>
        <footer>
            <?php require "HandF/footer.php"; ?>
        </footer>
    </body>
</html>
