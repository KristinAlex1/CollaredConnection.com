<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username, e.g., 'root'
$password = "kris"; // Replace with your MySQL password, if you have one
$dbname = "collared_connection"; // Replace with the name of your database, e.g., 'collared_connection'

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>

