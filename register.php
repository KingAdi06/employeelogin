<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "workers";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // For security, consider using prepared statements and password hashing
    $sql = "INSERT INTO users (name, dob, gender, address, city, state, username, password) VALUES ('$name', '$dob', '$gender', '$address', '$city', '$state', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
