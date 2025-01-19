<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
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
        .create-blog {
            width: 100%;
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .create-blog h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .create-blog label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .create-blog input, .create-blog textarea {
            width: 96%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .create-blog button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .create-blog button:hover {
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
    <div class="create-blog">
        <h2>Create Blog</h2>
        <form action="/Simple web/controllers/process_create_blog.php" method="POST">
        
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter blog title" required>
            
            <label for="slug">Slug:</label>
            <input type="text" id="slug" name="slug" placeholder="Enter blog slug (Image Url)" autocomplete="off" required>
            
            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="6" placeholder="Enter your blog content" required></textarea>

            <input type="hidden" id="created_at" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            
            <input type="hidden" id="author" name="author" value="<?php echo $_SESSION['user_id']; ?>">
        
            <button class="buttonload" type="submit">Submit</button>
        </form>
    </div>
    
</body>
</html>
