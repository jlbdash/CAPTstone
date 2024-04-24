<?php

// Server Connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "capt";

// Finding Friends
// MySQLi Object-oriented
// Check connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// set parameters and execute
$userid = $_SESSION['id'];
$events = "SELECT * FROM schedule WHERE `user` = '$userid'";
$eventTimes = $conn->query($events);

if ($eventTimes->num_rows > 0) {
// output data of each row
    while ($row = $eventTimes->fetch_assoc()) {
        $eventId = $row['event'];

        $selection = "SELECT * FROM events WHERE `id` = '$eventId'";
        $event = $conn->query($selection);
        $event = $event->fetch_assoc();

        if ($row['event'] == $event['id']) {
            echo "- Event: " . $event["event"] . " on " . $event["date"] . " at " . $event["time"] . "<br>";
        }
    }
} else {
    echo "0 results";
}
