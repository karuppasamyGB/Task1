<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blogs</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<style>
/* Header Styles */
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

.header .user-info {
  display: flex;
  align-items: center;
  gap: 10px;
}

.header .user-info img {
  width: 30px;
  height: 30px;
  border-radius: 50%;
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

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  text-align: center;
  font-family: arial;
  max-width: 300px; 
  flex: 1 1 300px; 
  border-radius:15px;
  overflow:hidden;
  flex-direction: row;  /* This aligns children in a horizontal row */
  justify-content: space-around; 
  align-items: center;
}

.card img {
  width: 300px;
  height:300px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  font-size: 18px;
  width: auto; 
  max-width: 100%; 
  margin-top: 10px;
  display: inline-block; 
  margin-top: auto;
}

.card button:hover {
  opacity: 0.7;
}


body {
  background-color: white;
  padding: 0;
  margin: 0;
}

.container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center; 
  gap: 20px; 
  padding: 20px;
}

.more {
  display: none;
  font-size: 18px;
}

button {
  margin: 10px;
  padding: 5px;
  background-color: cadetblue;
  border: none;
  font-size: 18px;
  outline: none;
  display: block;
  cursor: pointer;
  color: wheat;
}

/* General button styles */
/* General button styles */
.styled-button {
  border: none;
  outline: 0;
  padding: 12px 20px;
  color: white;
  text-align: center;
  cursor: pointer;
  font-size: 18px;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.styled-button:hover {
  opacity: 0.8;
}

.styled-button:focus {
  box-shadow: 0 0 5px #ddd;
}

/* Edit button specific styles */
/*css for drop down menu*/
/* User Info Container */
.user-info {
    position: relative;
    display: inline-block;
    cursor: pointer;
    align-items: center;
    gap: 10px;
    display: flex;
}

.user-info img {
    width: 45px !important;
    height: 45px !important;
    border-radius: 50%;
}



/*  Dropdown Menu Styling */
.dropdown {
    position: absolute;
    top: 35px;
    right: 0;
    background-color:rgb(255, 255, 255);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc;
    border-radius: 5px;
    min-width: 150px;
    z-index: 1000;
}

.dropdown a {
    display: block;
    padding: 2px;
    text-decoration: none;
    color: black;
    font-size: 14px;
}

.dropdown a:hover {
    background-color:rgb(111, 78, 55);
    color: white;
}

/* Hidden class for hiding the dropdown */
.hidden {
    display: none;
} 


</style>
</head>
<body>

<!-- Header -->
<div class="header">
  <a href="Home.php" class="logo">Qr</a>
  <div class="header-right">
    <a href="Home.php">Home</a>
    <a href="blogs.php">Blogs</a>
    <a href="contact.php">Contact</a>
    <a href="about.php">About Us</a>
    

    <?php
    session_start();
    include '../models/db_config.php'; 

    
    $username = $_SESSION['username'] ?? null;

    
    if ($username) {
      
      $user_id = $_SESSION['user_id']; // Make sure you are storing user_id in the session
      $query = "SELECT username FROM users WHERE Users_Id = '$user_id'"; // Only select the username based on user ID
      $user_result = $conn->query($query);
      
      if ($user_result && $user_result->num_rows > 0) {
          $user = $user_result->fetch_assoc();
          $username = $user['username']; // Fetch the username based on the user ID
          
          echo "
              <div class='user-info'>
              
    <img src='/Simple%20web/assets/default.png' alt='User Avatar' id='user-avatar'>
   
    <div class='dropdown hidden' id='user-dropdown'>
     <a id='user-name'>$username</a>
    <a href='/Simple%20web/views/create_blog_page.php'>create blog</a>
        <a href='/Simple%20web/controllers/logout.php'>Logout</a>
    </div>
</div>";
      }
  }else{
    echo"
    <a href='login.php'>Login</a>
    <a href='register.php'>Signup</a>
    ";
  }
    ?>
  </div>
</div>

<!-- Main Blog Content -->
<h2 style="text-align:center">Blogs</h2>
<div class="container"> 
<?php
// Fetch all blogs (visible to everyone)
$query = "SELECT * FROM blogs join users on users.Users_Id=blogs.author_id ORDER BY blogs.created_at DESC";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = htmlspecialchars($row['title']);
        $slug = htmlspecialchars($row['slug']);
        $author_username= htmlspecialchars($row['username']);
        $content = htmlspecialchars($row['content']);
        $created_at = $row['created_at'];
        $author_id = $row['author_id']; // The blog's author ID

       
        $formatted_time = date("F j, Y, g:i a", strtotime($created_at));
        
        $short_content = substr($content, 0, 100); 

        echo "
        <div class='card'>
          <img src='$slug' alt='Blog Image'>
          <h1><a href='/Simple%20web/views/view_blog.php?id={$row['Blogs_id']}'>$title</a></h1>
          <p><strong><i class='fas fa-calendar-alt'></i> Posted on:</strong> $formatted_time</p>
          <p><strong><i class='fas fa-user'></i> Posted By:</strong> $author_username</p>
          <p >$short_content...</p>
          <a href='/Simple%20web/views/view_blog.php?id={$row['Blogs_id']}'>
            <button>Read More</button>
          </a>
        ";

        if ($username && $user['id'] === $author_id) {
          echo "
          <a href='/Simple%20web/views/edit_blog.php?id={$row['Blogs_id']}'>
              <button class='styled-button edit-button'>Edit</button>
          </a>
          <a href='/Simple%20web/controllers/delete_blog.php?id={$row['Blogs_id']}'>
              <button class='styled-button delete-button'>Delete</button>
          </a>
      ";
        }

        echo "</div>"; 
    }
} else {
    echo "<p>No blogs available.</p>";
}

?>

</div>

<!-- Footer -->
<div>
  <?php include('footer.php'); ?>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '.read', function() {
        const card = $(this).closest('.card');
        const dots = card.find('.dots'); 
        const more = card.find('.more'); 
        
        dots.toggle(); 
        more.toggle(); 
        
        if ($(this).text() === 'Read More') {
            $(this).text('Read Less');
        } else {
            $(this).text('Read More');
        }
    });
});
</script>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const userInfo = document.querySelector(".user-info");
    const dropdown = document.getElementById("user-dropdown");

    userInfo.addEventListener("click", () => {
        dropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", (event) => {
        if (!userInfo.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });
});

</script>
</body>
</html>
