<?php
session_start();
include '../models/db_config.php'; // Make sure to include the correct DB configuration file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulate login using hardcoded credentials or use the following for actual login:
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Username and password are required!";
    } else {
        // Query to fetch user data from the database
        $query = "SELECT Users_Id, username, password FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $db_username, $db_password);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            // Verify the password
            if (password_verify($password, $db_password)) {
                // Successful login, store session variables
                $_SESSION['user_id'] = $id;  // Store the user's unique ID in session
                $_SESSION['username'] = $db_username;  // St-ore the username in session
                session_regenerate_id(true);  // Regenerate session ID to prevent session fixation
                header("Location: /Simple%20web/views/blogs.php");  // Redirect to the blog creation page
                exit;
            } else {
                $error = "Incorrect password!";
            }
        } else {
            $error = "No user found with that username!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        .login-form {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-form h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .login-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .login-form input {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #45a049;
        }
        .buttonload {
            background-color: #04AA6D; 
            border: none; 
            color: white; 
            padding: 12px 16px; 
            font-size: 16px; 
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Login</h2>
        <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
        <form action="/Simple web/controllers/process_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button class="buttonload" type="submit">Login</button>
        </form>
    </div>
</body>
</html>
