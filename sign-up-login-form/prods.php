<?php 

include('dbconnection.php');


$ret=mysqli_query($con,"select * from product_details");

$row=mysqli_num_rows($ret);
?>



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Popular Products Section Using HTML , CSS , Bootstrap</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="./style2.css">
<meta charset="utf-8">
      <link rel="stylesheet" href="topnav.css">
<style>
#topnav {
   width: 100%;

   position: fixed;
   top: 0;
   left: 0;

   background-color: Black;

   font-family: Arial, sans-serif;
   font-size: 15px;
}

.nav-link {
   display: inline-block;
   width: 100px;
   height: 55px;

   color: Black;

   text-align: center;
   line-height: 55px;

   text-decoration: none;
}

#logo {
   width: 120px;

   background-color:#8FEB00;

   font-weight: bold;
}

#about {
   position: absolute;
   background-color:#8FEB00;
   top: 0;
   font-weight: bold;
   right: 0;
}
	</style>
<nav id="topnav">
         <a id="logo" class="nav-link" href="start.php">Start Page</a>

         <a id="about" class="nav-link" href="myorder.php">Orders</a>
      </nav>
</head>
<body>
<!-- partial:index.partial.html -->
<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<h2>Popular Products</h2>
								</div>
						</div>
				</div>
				<div class="row">


<?php

if($row>0){
while ($row=mysqli_fetch_array($ret)) {

?>

						<!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-1" class="single-product">
										<div class="part-1">
											<form method="post" action="product-action.php?action=add&id=<?php echo $row['id']; ?>">
											<img src="pics/<?php  echo $row['image'];?>" width="310px" height="310px">
												<ul>
														<li><div><input type="text" name="qty" value="1" size="2" /><input type="submit" value="Add to cart" /></div></li>
														<li><a href="#"><i class="fas fa-heart"></i></a></li>
														<li><a href="#"><i class="fas fa-expand"></i></a></li>
												</ul>
										</div>
									</form>
										<div class="part-2">
												<h3 class="product-title"><?php  echo $row['name'];?></h3>
												<h4 ><?php  echo $row['size'];?></h4>
												<br>
												<h4 class="product-price">Rs. <?php  echo $row['price'];?></h4>
										</div>
								</div>
						</div>

						<?php
					} }
						?>
					
</section>
<!-- partial -->
  
</body>
</html>
