<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "blog app";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


$servername = "localhost";  // Database server (localhost for local development)
$username = "root";         // MySQL username
$password = "";             // MySQL password (blank by default for XAMPP)
$dbname = "simple_blog";    // Name of the database (change to simple_blog)

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  // If the connection fails, show error
}



?>
