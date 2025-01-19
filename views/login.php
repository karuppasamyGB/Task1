<!-- <?php
session_start();
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
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Login</h2>
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

 -->

 <!--login form 18jan 10 43-->
 <?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Body styling */
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow: hidden;
        }

        /* Modal background (dark overlay) */
        .modal-background {
            display: flex; /* Automatically shows the modal */
            position: fixed; /* Fixed at the top of the page */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
            justify-content: center;
            align-items: center;
        }

        /* Modal content styling */
        .login-form {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            position: relative;
        }

        /* Close button inside the modal */
        #close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #333;
            background: none;
            border: none;
        }

        /* Form header */
        .login-form h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Form field labels */
        .login-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        /* Form input fields */
        .login-form input {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Login button */
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

        /* Button hover effect */
        .login-form button:hover {
            background-color: #45a049;
        }

    </style>
    <!-- jQuery for handling the show/hide functionality -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>

<!-- The modal background with login form -->
<div class="modal-background">
    <div class="login-form">
        <a href="Home.php" id="close">X</a>
        <h2>Login</h2>
        <form action="/Simple web/controllers/process_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <button class="buttonload" type="submit">Login</button>
        </form>
    </div>
</div>

<script>
    // Close the login form modal when the "X" (close) button is clicked
    $('#close').on('click', function () {
        $('.modal-background').fadeOut(); // Hide the modal (popup)
    });
</script>

</body>
</html>
