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

    $username = $_POST['username'];
    $password = $_POST['password'];

    // For security, consider using prepared statements and password hashing
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        // Authentication successful
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to the dashboard or any other page
        exit();
    } else {
        // Authentication failed
        $error_message = "Invalid username or password";
        echo $error_message; // Add this line for debugging
    }

    $conn->close();
}
?>
