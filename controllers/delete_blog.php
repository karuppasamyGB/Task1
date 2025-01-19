<?php
// session_start();
// include '../models/db_config.php';

// if (!isset($_SESSION['user_id'])) {
//     die("You must be logged in to delete a blog.");
// }

// $blog_id = $_GET['id'] ?? null;
// $user_id = $_SESSION['user_id'];

// if (!$blog_id) {
//     die("Blog ID not provided.");
// }

// $query = "SELECT author_id FROM blogs WHERE id = ?";
// $stmt = $conn->prepare($query);
// $stmt->bind_param("i", $blog_id);
// $stmt->execute();
// $stmt->store_result();
// $stmt->bind_result($author_id);
// $stmt->fetch();

// if ($author_id != $user_id) {
//     die("You are not the author of this blog.");
// }

// $query = "DELETE FROM blogs WHERE id = ?";
// $stmt = $conn->prepare($query);
// $stmt->bind_param("i", $blog_id);
// $stmt->execute();

// if ($stmt->affected_rows > 0) {
//     echo "Blog deleted successfully!";
//     header("Location: /Simple%20web/views/blogs.php");
//     exit();
// } else {
//     echo "Error deleting blog.";
// }

// $stmt->close();
// $conn->close();

?>
<?php
session_start();
include '../models/db_config.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to delete a blog.");
}

$blog_id = $_GET['id'] ?? null;
$user_id = $_SESSION['user_id'];

if (!$blog_id) {
    die("Blog ID not provided.");
}

$query = "SELECT author_id FROM blogs WHERE Blogs_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $blog_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($author_id);
$stmt->fetch();

if ($author_id != $user_id) {
    die("You are not the author of this blog.");
}

// HTML and JavaScript for confirmation popup
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm_delete'])) {
    // Proceed with the delete operation after confirmation
    $query = "DELETE FROM blogs WHERE Blogs_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $blog_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Blog deleted successfully!";
        header("Location: /Simple%20web/views/blogs.php");
        exit();
    } else {
        echo "Error deleting blog.";
    }

    $stmt->close();
    $conn->close();
    exit();
}
?>

<!-- HTML for confirmation popup -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Blog</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }

        h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        .button-group {
            margin-top: 20px;
        }

        button {
            background-color: #ff6347; /* Tomato color */
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e55347; /* Darker tomato */
        }

        a {
            font-size: 1rem;
            text-decoration: none;
            color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #0056b3; /* Darker blue */
        }

        /* Small screen responsiveness */
        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
    <script type="text/javascript">
        function confirmDeletion() {
            var result = confirm("Are you sure you want to delete this blog?");
            if (result) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h3>Are you sure you want to delete this blog?</h3>
        <form id="deleteForm" action="" method="POST">
            <input type="hidden" name="confirm_delete" value="1">
            <div class="button-group">
                <button type="button" onclick="confirmDeletion()">Confirm Delete</button>
                <a href="/Simple%20web/views/blogs.php">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>

