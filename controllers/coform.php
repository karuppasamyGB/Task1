<?php

// include '../models/db_config.php';  
// require __DIR__ . '/vendor/autoload.php';
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     echo "Form submitted!<br>";

//     $name = $_POST['name'] ?? '';
//     $email = $_POST['email'] ?? '';
//     $message = $_POST['message'] ?? '';

//     echo "Name: $name, Email: $email, Message: $message<br>";

//     // Check if the connection is valid
//     if ($conn) {
//         echo "Database connected successfully.<br>";
//     } else {
//         die("Error: Database connection failed.<br>");
//     }

//     // Prepare SQL statement
//     $stmt = $conn->prepare("INSERT INTO contactus (name, email, message, submitted_at) VALUES (?, ?, ?, NOW())");

//     if ($stmt === false) {
//         die("Error preparing statement: " . $conn->error);
//     }

//     // Bind parameters and execute query
//     $stmt->bind_param("sss", $name, $email, $message);

//     // Check if query executes successfully
//     if (!$stmt->execute()) {
//         die("Error executing statement: " . $stmt->error);
//     }

//     // Success: data saved
//     echo "Data saved successfully!";
//     $stmt->close();
//     $conn->close();
// } else {
//     echo "Invalid request method!";
// }


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Get form input values
//     $name = htmlspecialchars($_POST['name']);
//     $email = htmlspecialchars($_POST['email']);
//     $message = htmlspecialchars($_POST['message']);

//     // Mailtrap SMTP settings
//     $mailtrapHost = 'sandbox.smtp.mailtrap.io'; // Replace with Mailtrap's SMTP host
//     $mailtrapPort = 2525;               // Port for secure transmission
//     $mailtrapUsername = 'ea86c4fa6254df'; // Replace with your Mailtrap username
//     $mailtrapPassword = 'a6993c213585c0'; // Replace with your Mailtrap password

//     // Email details
//     $to = 'karuppasamy17235@gmail.com'; // Replace with the recipient's email
//     $subject = "New Contact Us Submission from $name";
//     $body = "You have received a new message from the contact form:\n\n" .
//             "Name: $name\n" .
//             "Email: $email\n\n" .
//             "Message:\n$message";

//     // Email headers
//     $headers = [
//         'From' => $email,
//         'Reply-To' => $email,
//         'X-Mailer' => 'PHP/' . phpversion()
//     ];

//     // Using PHPMailer for sending the email
//     require 'PHPMailer/PHPMailer.php';
//     require 'PHPMailer/SMTP.php';

//     $mail = new PHPMailer\PHPMailer\PHPMailer();

//     try {
//         // Server settings
//         $mail->isSMTP();
//         $mail->Host = $mailtrapHost;
//         $mail->SMTPAuth = true;
//         $mail->Username = $mailtrapUsername;
//         $mail->Password = $mailtrapPassword;
//         $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port = $mailtrapPort;

//         // Recipient and content
//         $mail->setFrom($email, $name);
//         $mail->addAddress($to);
//         $mail->Subject = $subject;
//         $mail->Body = $body;

//         // Send email
//         if ($mail->send()) {
//             echo "Message sent successfully!";
//         } else {
//             echo "Message could not be sent. Error: " . $mail->ErrorInfo;
//         }
//     } catch (Exception $e) {
//         echo "Mailer Error: " . $mail->ErrorInfo;
//     }
// }


// Include database configuration
include '../models/db_config.php';  

// Load Composer's autoloader for PHPMailer
require __DIR__ . '/../vendor/autoload.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and validate form input values
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    // Mailtrap SMTP settings
    $mailtrapHost = 'sandbox.smtp.mailtrap.io';
    $mailtrapPort = 2525;
    $mailtrapUsername = 'ea86c4fa6254df';
    $mailtrapPassword = 'a6993c213585c0';

    // Recipient email
    $to = 'karuppasamy17235@gmail.com';
    $subject = "New Contact Us Submission from $name";
    $body = "You have received a new message from the contact form:\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Message:\n$message";

    // Initialize PHPMailer
    $mail = new PHPMailer();

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = $mailtrapHost;
        $mail->SMTPAuth = true;
        $mail->Username = $mailtrapUsername;
        $mail->Password = $mailtrapPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $mailtrapPort;

        // Set recipient and sender details
        $mail->setFrom($email, $name);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Send email
        if ($mail->send()) {
            echo "Message sent successfully!";
            echo "<a href='/Simple%20web/views/Home.php'>Go back</a>";
        } else {
            echo "Message could not be sent. Error: " . $mail->ErrorInfo;
        }
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}

?>