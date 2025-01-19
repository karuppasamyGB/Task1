<?php
session_start();
include '../models/db_config.php'; 


if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to edit a blog.");
}


$blog_id = $_GET['id'] ?? null;
$user_id = $_SESSION['user_id'];

if (!$blog_id) {
    die("Blog ID not provided.");
}

$query = "SELECT * FROM blogs WHERE Blogs_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $blog_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $title, $slug, $content, $created_at, $author_id);

if ($stmt->num_rows === 0) {
    die("Blog not found.");
}

$stmt->fetch();


if ($author_id !== $user_id) {
    die("You are not the author of this blog.");
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
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
        .edit-blog-form {
            width: 100%;
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .edit-blog-form h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .edit-blog-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .edit-blog-form input, .edit-blog-form textarea {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .edit-blog-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .edit-blog-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="edit-blog-form">
        <h2>Edit Blog</h2>
        <form action="/Simple web/controllers/process_edit_blog.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>

            <label for="slug">Slug:</label>
            <input type="text" id="slug" name="slug" value="<?php echo htmlspecialchars($slug); ?>" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="6" required><?php echo htmlspecialchars($content); ?></textarea>

            <button type="submit">Update Blog</button>
        </form>
    </div>

</body>
</html>
