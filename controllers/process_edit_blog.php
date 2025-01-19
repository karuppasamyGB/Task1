<?php
session_start();
include '../models/db_config.php'; 


if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to edit a blog.");
}
// if (!isset($_SESSION['Blogs_id']))
// $blog_id = $_GET['Blogs_id'] ?? null;

// Get the blog data from the form
$blog_id = $_POST['id'] ?? null;
$title = $_POST['title'] ?? '';
$slug = $_POST['slug'] ?? '';
$content = $_POST['content'] ?? '';
$user_id = $_SESSION['user_id']; 


if (!$blog_id) {
    die("Blog trestgfdv ID not provided.");
}

$query = "SELECT author_id FROM blogs WHERE Blogs_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $blog_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($author_id);
$stmt->fetch();

if ($author_id !== $user_id) {
    die("You are not the author of this blog.");
}


$update_query = "UPDATE blogs SET title = ?, slug = ?, content = ? WHERE Blogs_id = ?";
$update_stmt = $conn->prepare($update_query);
$update_stmt->bind_param("sssi", $title, $slug, $content, $blog_id);

if ($update_stmt->execute()) {
    echo "Blog updated successfully!";
    header("Location: /Simple%20web/views/blogs.php"); 
    exit();
} else {
    die("Error updating blog: " . $update_stmt->error);
}

$update_stmt->close();
$conn->close();
?>
