<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin:right;
            padding: 10;
            justify-content: flex-start; 
            align-items: flex-start;    
        }
        .contactus {
            width: 100%;
            max-width: 500px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
           
        }
        .#contact{
            
        }
        .contactus h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .contactus label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .contactus input, .contactus textarea {
            width: 97%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .contactus input:focus, .contactus textarea:focus {
            border-color: #666;
            outline: none;
        }
        .contactus button {
            width: 100%;
            background-color:rgb(175, 153, 56);
            color: white;
            border: none;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .contactus button:hover {
            background-color:rgb(249, 207, 20);
            color:black;
        }
    </style>
</head>
<body>
    <div class="contactus">
        <h2>Contact Us</h2>
        <form action="/Simple web/controllers/coform.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" autocomplete="off" required>
            
            <label for="mail">Email:</label>
            <input type="email" id="mail" name="email" placeholder="Enter your email" autocomplete="off" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Enter your message here..." autocomplete="off" required></textarea>
            
            <button type="submit">Submit</button>
        </form>
    </div>
    
   
</body>
</html>