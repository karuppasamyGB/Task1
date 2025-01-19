// Include database configuration
include '../models/db_config.php';  

require __DIR__ . '/../vendor/autoload.php';

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

    
    $mailtrapHost = 'sandbox.smtp.mailtrap.io';
    $mailtrapPort = 2525;
    $mailtrapUsername = 'ea86c4fa6254df';
    $mailtrapPassword = 'a6993c213585c0';

    
    $to = 'karuppasamy17235@gmail.com';
    $subject = "New Contact Us Submission from $name";
    $body = "You have received a new message from the contact form:\n\n" .
            "Name: $name\n" .
            "Email: $email\n\n" .
            "Message:\n$message";


    $mail = new PHPMailer();

    try {

        $mail->isSMTP();
        $mail->Host = $mailtrapHost;
        $mail->SMTPAuth = true;
        $mail->Username = $mailtrapUsername;
        $mail->Password = $mailtrapPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = $mailtrapPort;

    
        $mail->setFrom($email, $name);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $body;


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
