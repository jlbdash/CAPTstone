<?php

$servername = "localhost";
$username = "CST8257";
$password = "cakeall";
$dbname = "capt";

$conn = new mysqli($servername, $username, $password);

// sql to create table
$db = "CREATE DATABASE IF NOT EXISTS capt";

if ($conn->query($db) === FALSE) {
    echo "Error creating table: " . $conn->error;
}
$conn->close();

// Creation of capt table
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$table = "CREATE TABLE IF NOT EXISTS user (
            id INT(6)UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first VARCHAR(30) NOT NULL,
            last VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            password VARCHAR(600)
            )";

if ($conn->query($table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

// Creation of events table
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$table = "CREATE TABLE IF NOT EXISTS events (
            id INT(6)UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            event VARCHAR(40) NOT NULL,
            date DATE,
            time TIME,
            host VARCHAR(50)
            )";

if ($conn->query($table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

// Creation of schedule table
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$table = "CREATE TABLE IF NOT EXISTS schedule (
            id INT(6)UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            event INT(6) NOT NULL,
            user INT(6) NOT NULL
            )";

if ($conn->query($table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

// Creation of subscription table
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$table = "CREATE TABLE IF NOT EXISTS subscription (
            id INT(6)UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            sub VARCHAR(40) NOT NULL,
            date DATE DEFAULT CURRENT_TIMESTAMP,
            level VARCHAR(50),
            background VARCHAR(50)
            )";

if ($conn->query($table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

// Creation of contact table
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$table = "CREATE TABLE IF NOT EXISTS contact (
            id INT(6)UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(40) NOT NULL,
            time DATE DEFAULT CURRENT_TIMESTAMP,
            email VARCHAR(50),
            subject VARCHAR(50),
            message VARCHAR(1000)
            )";

if ($conn->query($table) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

// Population of the user table.
// all passwords are: Password2
$conn = new mysqli($servername, $username, $password, $dbname);

// MySQLi Object-oriented
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind statment
$stmt = $conn->prepare("INSERT INTO `user` (`id`,`first`,`last`,`email`,`password`) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $id, $firstName, $lastName, $email, $hashedPassword
);

// set parameters and execute 
$id = "NULL";
$firstName = "Barbie";
$lastName = "Straizand";
$email = "Bandb@sandy.beach";
$hashedPassword = "1be0222750aaf3889ab95b5d593ba12e4ff1046474702d6b4779f4b527305b23";
$stmt->execute();

$id = "NULL";
$firstName = "Haley";
$lastName = "Comett";
$email = "longtail2@sky.rocket";
$hashedPassword = "1be0222750aaf3889ab95b5d593ba12e4ff1046474702d6b4779f4b527305b23";
$stmt->execute();

$id = "NULL";
$firstName = "Yuan";
$lastName = "Limbo";
$email = "overnotunder@stick.held";
$hashedPassword = "1be0222750aaf3889ab95b5d593ba12e4ff1046474702d6b4779f4b527305b23";
$stmt->execute();
$stmt->close();
$conn->close();



// Population of the events tables.
$conn = new mysqli($servername, $username, $password, $dbname);

// MySQLi Object-oriented
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind statment
$stmt = $conn->prepare("INSERT INTO `events` (`id`,`event`,`date`,`time`,`host`) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $id, $event, $date, $time, $host
);

// set parameters and execute 
$id = "NULL";
$event = "Wash Those Vials";
$date = "2024-11-11";
$time = "12:30:00";
$host = "Barbie Straizand";
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = "Talking to Your Sponsers";
$date = "2025-02-01";
$time = "06:30:00";
$host = "Laila Flowers";
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = "Zooming Through Your Work Calls";
$date = "2025-01-29";
$time = "14:45:00";
$host = "Ken Nashville";
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = "Tript-and Get that Turkey";
$date = "2024-12-15";
$time = "10:00:00";
$host = "Barbie Straizand";
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = "Chicks and Eggs";
$date = "2024-12-11";
$time = "15:00:00";
$host = "Barbie Straizand";
$stmt->execute();
$stmt->close();
$conn->close();



// Population of the schedule table.
$conn = new mysqli($servername, $username, $password, $dbname);

// MySQLi Object-oriented
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind statment
$stmt = $conn->prepare("INSERT INTO `schedule` (`id`,`event`,`user`) VALUES (?, ?, ?)");
$stmt->bind_param("sii", $id, $event, $user);

// set parameters and execute 
$id = "NULL";
$event = 1;
$user = 2;
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = 2;
$user = 2;
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = 3;
$user = 1;
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = 4;
$user = 1;
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = 5;
$user = 2;
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = 5;
$user = 3;
$stmt->execute();

// set parameters and execute 
$id = "NULL";
$event = 4;
$user = 3;
$stmt->execute();
$stmt->close();
echo "Complete";
$conn->close();