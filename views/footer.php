<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Footer Example</title>
  <style>

    .footer {
      display: flex;
      justify-content: space-between;
      background-color: #333;
      color: white;
      padding: 20px;
      margin-top: 50px;
    }

    .footer-left {
      width: 45%;
    }

    .footer-left h3 {
      font-size: 20px;
      font-weight: bold;
    }

    .footer-left ul {
      list-style: none;
      padding: 0;
    }

    .footer-left ul li {
      margin: 10px 0;
    }

    .footer-left ul li a {
      color: #f4f4f4;
      text-decoration: none;
      font-size: 16px;
    }

    .footer-right {
      width: 45%;
    }

    .footer-right h3 {
      font-size: 20px;
      font-weight: bold;
    }

    .footer-right p {
      font-size: 16px;
    }

    .social-media {
      display: flex;
      gap: 10px;
      padding: 0;
    }

    .social-media li {
      list-style: none;
    }

    .social-media li a {
      color: #f4f4f4;
      text-decoration: none;
    }
  </style>
</head>
<body>




<div>
<footer style="background-color: #333; color: white; padding: 20px 0; text-align: center;  bottom: 0; width: 100%;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
    <div style="display: flex; justify-content: center; gap: 30px; margin-bottom: 10px;">
     <a href="#" style="color: #ddd; text-decoration: none;">Home</a>
      <a href="blogs.php" style="color: #ddd; text-decoration: none;">Blogs</a>
      <a href="about.php" style="color: #ddd; text-decoration: none;">About Us</a>
      <a href="contact.php" style="color: #ddd; text-decoration: none;">Contact</a>
      <a href="login.php" style="color: #ddd; text-decoration: none;">Login</a>
      <a href="register.php" style="color: #ddd; text-decoration: none;">Signup</a>
  </div>
        <p style="margin: 0; font-size: 14px;">&copy; 2025 Quikread. All rights reserved.</p>
    </div>
</footer>

<script>
   
    fetch('quick-links.html')
        .then(response => response.text())
        .then(html => {
            document.getElementById('quick-links').innerHTML = html;
        });
</script>

</div>

</body>
</html>