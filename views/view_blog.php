<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
button {
    background-color: #4CAF50; /* Green background */
    color: white;              /* White text */
    padding: 10px 20px;        /* Padding to make the button larger */
    border: none;              /* Remove the default border */
    border-radius: 5px;        /* Rounded corners */
    cursor: pointer;          /* Pointer cursor on hover */
    font-size: 16px;           /* Font size */
    text-align: center;        /* Center the text inside the button */
    display: inline-block;     /* Keep the button inline */
    transition: background-color 0.3s ease; /* Smooth transition for background color */
}

/* Hover Effect */
button:hover {
    background-color: #45a049; /* Darker green when hovered */
}

/* Optional: Focus Effect for Accessibility */
button:focus {
    outline: none;             /* Remove the default focus outline */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Add a subtle shadow for focus */
}
* {box-sizing: border-box;}
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}


.header {
  overflow: hidden;
  background-color: rgb(235, 191, 95);
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: rgb(111, 78, 55);
  color: white;
}

.header-right {
  float: right;
}

.header-bottom {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
  padding: 10px;
}

    </style>
</head>
<body>
<div class="header">
  <a href="Home.php" class="logo">Qr</a>
  <div class="header-right">
    <a href="Home.php">Home</a>
    <a href="blogs.php">Blogs</a>
    <a href="#contactform">Contact</a>
    <a href="about.php">About Us</a>
    <a href="login.php">Login</a>
    <a href="register.php">Signup</a>
  </div>
</div>
</body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Include your database configuration
include '../models/db_config.php';

// Get the logged-in user's ID from the session
$logged_in_user_id = $_SESSION['user_id'] ?? null; // Assuming 'user_id' is stored in the session

// Get the blog ID from the URL
$blog_id = $_GET['id'] ?? null;

if ($blog_id) {
    // echo $blog_id;
    // Prepare the SQL query to fetch blog details along with the author's information
    $query = "SELECT blogs.*, users.Users_Id AS author_id, users.username AS author_username 
              FROM blogs 
              JOIN users ON blogs.author_id = users.Users_Id 
              WHERE Blogs_id = ?";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $blog_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $title = htmlspecialchars($row['title']);
            $blog_id = htmlspecialchars($row['Blogs_id']);
            $content = htmlspecialchars($row['content']);
            $formatted_time = date("F j, Y, g:i a", strtotime($row['created_at']));
            $author_username = htmlspecialchars($row['author_username']);
            $author_id = $row['author_id'];
            
            // Display the blog details
            echo "<h1>$title</h1>";
            echo "<p><strong>Posted on:</strong> $formatted_time</p>";
            echo "<p><strong>Author:</strong> $author_username</p>";
            echo "<p><strong>blogid:</strong> $blog_id</p>"; 
            echo "<div>$content</div>";
            echo "<a href='/Simple%20web/views/blogs.php'>
                    <button>Back to Blogs</button>
                  </a>";

            // Check if the logged-in user is the author of the blog
            if ($logged_in_user_id == $author_id) {
                echo "<a href='/Simple%20web/views/edit_blog.php?id=" . urlencode($blog_id) . "'>
                        <button>Edit</button>
                      </a>
                      <a href='/Simple%20web/controllers/delete_blog.php?id=" . urlencode($blog_id) . "'>
                        <button>Delete</button>
                      </a>";
            }
        } else {
            echo "<p>Blog not found.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Error preparing the SQL statement.</p>";
    }
} else {
    echo "<p>No blog ID specified.</p>";
}

$conn->close();
?>

<!-- Footer -->
<div>
    <?php include('footer.php'); ?>
</div>


