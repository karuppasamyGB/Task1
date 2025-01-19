<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #444;
        }
        p {
            margin: 10px 0;
        }

.header {
  overflow: hidden;
  background-color: rgb(235, 191, 95);
  padding: 20px 40px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: rgb(111, 78, 55);
  color: white;
}

.header-right {
  float: right;
}

.header-bottom {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
  padding: 10px;
}

    </style>
</head>
<body>
<div class="header">
  <a href="Home.php" class="logo">Qr</a>
  <div class="header-right">
    <a href="Home.php">Home</a>
    <a href="blogs.php">Blogs</a>
    <a href="#contactform">Contact</a>
    <a href="about.php">About Us</a>
    <a href="login.php">Login</a>
    <a href="register.php">Signup</a>
  </div>
</div>
    <div class="container">
        <h1>About Us</h1>
        <p>Welcome to our platform! We are dedicated to empowering students, job seekers, and developers by providing access to insightful tech talks and resources that inspire growth and innovation.</p>
        
        <h2>Our Mission</h2>
        <p>Our mission is to bridge the gap between education and industry by offering valuable knowledge and hands-on guidance. We believe that sharing ideas and experiences can help individuals achieve their goals and contribute to a thriving tech community.</p>

        <h2>Who We Serve</h2>
        <p>We focus on supporting:
            <ul>
                <li><strong>Students</strong> looking to expand their knowledge and build skills for the future.</li>
                <li><strong>Job Seekers</strong> striving to enhance their employability in the competitive tech world.</li>
                <li><strong>Developers</strong> eager to stay updated with the latest trends and advancements.</li>
            </ul>
        </p>

        <h2>What We Offer</h2>
        <p>We provide:
            <ul>
                <li>Engaging tech talks by industry experts.</li>
                <li>Practical tutorials and workshops.</li>
                <li>A supportive community for networking and collaboration.</li>
            </ul>
        </p>

        <p>Together, let’s learn, grow, and shape the future of technology!</p>
    </div>
    <div>
       <?php include('footer.php');?>
    </div>      
</div>
</body>
</html>
