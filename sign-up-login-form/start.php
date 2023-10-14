<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: index.php');
      include("dbconnection.php");          
    $query=$con->query("SELECT * FROM login");
}
?>




<html>
<head>
<meta charset="utf-8">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style>
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container 
{
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next 
{
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next 
{
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover 
{
  background-color: rgba(0,0,0,0.8);
}



/* The dots/bullets/indicators */
.dot 
{
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover 
{
  background-color: #717171;
}

<style type="text/css">
    button 
    {
      background: #ccce;
      border: none;
      border-radius: 5px;
      box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 2.5);
      color: #111;
      font-family: 'Puritan', sans-serif;
      font-size: 50px;
      outline: none;
      padding: 115px;
border-radius: 25px;
       width: 300px;  
      height: 100px; 
      padding-top: 100px;  
  }
.button10 
{
  background: #3D3D3D;
  position: relative;
  transform: translateZ(0);
  transition: color 0.3s ease;
  width: 300px;  
height: 100px;  
border-radius: 25px;
 font-size: 20px;
}
.button10:before 
{
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  background: #8FEB00;
  border-radius: 25px;
  content: '';
  transform: scaleX(1);
  transform-origin: center;
  transition: transform 0.3s ease-out;
  z-index: -1;
  width: 300px;  
height: 100px;  
}
.button10:hover, .button10:focus, .button10:active 
{
  color: #8FEB00;
  cursor: pointer;
  border-radius: 25px;
}
.button10:hover:before, .button10:focus:before, .button10:active:before 
{
  transform: scaleX(0);
  border-radius: 25px;
}
section {text-align: center;}

a:visited { 
 text-decoration: none; 
 color: orange; 
}
 
/* Fading animation */
/*
.fade 
{
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s; 
}

@-webkit-keyframes fade 
{
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade 
{
  from {opacity: .4} 
  to {opacity: 1}
}
*/
/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) 
{
  .prev, .next,.text {font-size: 11px}
}
</style>

<?php include('nav.php'); ?>

</head>

<body>
  
<div class="slideshow-container">

<div class="mySlides ">
 
  <img src="img/slides/1" width="1000px" height="700px">
  
</div>

<div class="mySlides ">
  
  <img src="img/slides/2"  width="1000px" height="700px">

</div>

<div class="mySlides ">

  <img src="img/slides/3"  width="1000px" height="700px">

</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) 
{
  showSlides(slideIndex += n);
}

function currentSlide(n) 
{
  showSlides(slideIndex = n);
}

function showSlides(n) 
{
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) 
  {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  
 
}
</script>

<section>
  <br>
  <br>
      <a href="prods.php "><button class="button10" type="button" name="button">Products</button></a>
    </section>

	
</body>
</html>
