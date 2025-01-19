<?php
session_start();
include '../models/db_config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: register.php?error=All fields are required");
        exit;
    }

    if ($password !== $confirm_password) {
        header("Location: register.php?error=Passwords do not match");
        exit;
    }

    if (strlen($password) < 6) {
        header("Location: register.php?error=Password must be at least 6 characters");
        exit;
    }


    $query = "SELECT Users_Id FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register.php?error=Email is already registered");
        exit;
    }

    
    $query = "SELECT Users_Id FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        header("Location: register.php?error=Username is already taken");
        exit;
    }

   
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   
    $insert_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        
        header("Location: /Simple%20web/views/login.php");
        exit;
    } else {
        header("Location: register.php?error=Registration failed, please try again");
        exit;
    }
}
