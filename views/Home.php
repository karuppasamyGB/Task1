<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blog app</title>
<style>

* {box-sizing: border-box;}
body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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


.container {
  width: 100%;
  background: rgb(255, 255, 255);
  color: black;
  text-align: center;
  padding: 50px 20px;
}

.container h2 {
  font-size: 36px;
  font-weight: 600;
  margin-bottom: 20px;
}


.slideshow-container {
  width: 100%;
  max-width: 500px; 
  height: 300px;
  margin: 30px auto;
  position: relative;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f0f0f0;
  border-radius:20px;
}

.mySlides {
  display: none;
}

img {
  width: 100%;
  vertical-align: middle;
  height: 50%; 
  object-fit: cover; 
  object-fit: contain;
}

.slideshow-container img {
  width: 100%;
  height: 100%;
  object-fit: cover; 
}


.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

.contactus {
  position:fixed;
  align-items: left;
  margin-left: 20px; 
}

.contactform {
  align-items: start;
  justify-content: flex-start;
  background-color: rgba(255, 255, 255, 0.8);
  display: flex;
  height: 60vh;
  padding: 200px;
  transform: translateX(-100%); 
  animation: slideInFromLeft 1s forwards; 
}


@keyframes slideInFromLeft {
  from {
    transform: translateX(-100%);
  }
  to {
    transform: translateX(0); 
  }
}


.rightImage {
  position: relative;
  transform: translateX(100%); 
  animation: slideInFromRight 1s forwards; 
  width: 50%; 
  height: auto;
  object-fit: cover;
}

@keyframes slideInFromRight {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(0); 
  }
}


.contact-and-image {
  display: flex;
  align-items: center; 
  justify-content: space-between; 
  animation: slideInFromLeft 1s forwards; 
}


.caption {
  color: white;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.5);
  position: absolute;
  bottom: 8px; 
  left: 50%;
  transform: translateX(-50%);
  width: 90%; 
  padding: 10px;
  border-radius: 5px;
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
  <h2>Get day to day tech updates by learning <span class="auto-type">Quikread</span></h2>
</div>

<div class="slideshow-container">
 
  <div class="mySlides fade">
    <img src="../assets/machine learning.png" alt="Cloud Computing">
    <div class="caption">Machine Learning Overview</div>
  </div>

 
  <div class="mySlides fade">
    <img src="../assets/networking.png" alt="Networking Concepts">
    <div class="caption">Understanding Networking</div>
  </div>

  <div class="mySlides fade">
    <img src="../assets/digital marketing.png" alt="Digital Marketing Tips">
    <div class="caption">Insights into Digital Marketing</div>
  </div>
</div>



<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
  var typed = new Typed(".auto-type", {
    strings: ["Quikread"],
    typeSpeed: 100,
    backSpeed: 100,
    loop: true
  });
</script>
<section id="contactform">

<div class="contact-and-image">

  <div class="contactform">
    <?php include('contact.php'); ?>
  </div>

  <img src="../assets/contactpic.png" alt="Sliding Image" class="rightImage">
</div>
</section>
<div>
  <?php include('footer.php');
  ?>
</div>

<script>
  let slideIndex = 0;
  showSlides();

  function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 2000); 
  }
</script>

<script>

</script>  
</body>
</html>
