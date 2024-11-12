
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="styles.css" />
    
  </head>
  <body>
  <div class="img" style='text-align:center; margin-top:10px;
  margin-bottom:5px;'>
  <img src="1559047895.gif" alt="klecet logo">
  <img src="code.jpg" alt="klecet mba/mca">
</div>    <!-- <link rel="import" href="nav.html"> -->
<?php
include 'nav.php';
?>
    <h1 style="text-align: center; margin-top: 20px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"> 
             
    </h1>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}


</style>



    <div style="margin-top: 30px;">
      <div class="carousel">
        <ul class="slides">
          <input type="radio" name="radio-buttons" id="img-1" checked />
          <li class="slide-container">
            <div class="slide-image">
              <img src="pic5.jpg">
            </div>
            <div class="carousel-controls">
              <label for="img-3" class="prev-slide">
                <span>‹</span>
              </label>
              <label for="img-2" class="next-slide">
                <span>›</span>
              </label>
            </div>
          </li>
          <input type="radio" name="radio-buttons" id="img-2" />
          <li class="slide-container">
            <div class="slide-image">
              <img src="pic4.jpg">
            </div>
            <div class="carousel-controls">
              <label for="img-1" class="prev-slide">
                <span>‹</span>
              </label>
              <label for="img-3" class="next-slide">
                <span>›</span>
              </label>
            </div>
          </li>
        
          <div class="carousel-dots">
            <label for="img-1" class="carousel-dot" id="img-dot-1"></label>
            <label for="img-2" class="carousel-dot" id="img-dot-2"></label>
            <label for="img-3" class="carousel-dot" id="img-dot-3"></label>
          </div>
        </ul>
      </div>
    </div>
    <script>
        const burger = document.querySelector('.burger');
const nav = document.querySelector('.nav-links');
const navLinks = document.querySelectorAll('.nav-links li');

burger.addEventListener('click', () => {
    // Toggle Nav
    nav.classList.toggle('nav-active');

    // Animate Links
    navLinks.forEach((link, index) => {
        if (link.style.animation) {
            link.style.animation = '';
        } else {
            link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
        }
    });

    // Burger Animation
    burger.classList.toggle('toggle');
});

    </script>
  </body>
</html>