<?php
session_start();
include '../models/db_config.php';  

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $title = $_POST['title'] ?? '';
    $slug = $_POST['slug'] ?? '';
    $content = $_POST['content'] ?? '';
    $author_id = $_SESSION['user_id'] ?? '';  
    $created_at = $_POST['created_at'] ?? ''; 

    if (empty($title) || empty($slug) || empty($content) || empty($author_id)) {
        die("All fields are required");
    }

    
    $stmt = $conn->prepare("INSERT INTO blogs (title, slug, content, created_at, author_id) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sssss", $title, $slug, $content, $created_at, $author_id);

   
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }

    
    $stmt->close();
    $conn->close();

    
    header("Location: /Simple%20web/views/blogs.php");  
    exit();  
} else {
    echo "Invalid request method!";
}
?>
