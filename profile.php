<?php
// session start
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="overallCSS.css">
    </head>
    <body>
        <header>
<?php require "HandF/header.php"; ?>
        </header>
        <br>
        <section>
            <div class ="section-column">
                <h2> <!-- Change Section Heading -->
                    Profile
                </h2>
                <div class="section-side">
                    <h3>Events</h3>
                    <p><!-- Change Content -->
                        <?PHP
                        require "profileEvents.php";
                        ?>
                    </p>
                </div>
                <div class="section-side"><!-- Rewrite Content -->
                    <h3>Heading</h3>
                    <p></p>
                </div>
                <br>
                <div class="section-side">
                    <h3>Heading</h3><!-- Change Heading -->
                </div>
                <div class="section-side"><!-- Rewrite Content -->
                    <p> A thing
                    </p>
                </div>
            </div>
        </section>
        <footer>
<?php require "HandF/footer.php"; ?>
        </footer>
    </body>
</html>