<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        .signup-form {
            width: 100%;
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .signup-form h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .signup-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .signup-form input {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .signup-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .signup-form button:hover {
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
    <div class="signup-form">
        <h2>Sign Up</h2>
        <?php if (isset($_GET['error'])) { echo "<p style='color: red;'>" . htmlspecialchars($_GET['error']) . "</p>"; } ?>
        <form action="/Simple web/controllers/process_register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

            <button class="buttonload" type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>