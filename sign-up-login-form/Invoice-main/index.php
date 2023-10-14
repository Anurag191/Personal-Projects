<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="style.css">

    <title>Invoice</title>
</head>
<?php
                            include('dbconnection.php');
$eid=$_GET['editid'];
$ret=mysqli_query($con,"SELECT * FROM pay,product_details where pay.prodid = product_details.id and pay.pid='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="logo.png" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No. <span><?php  echo $row['pid'];?></span></p>
                    </div>
                </div>
            </section>
            

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Supplier,</p>
                            <h2>GPU World</h2>

                        </div>
                        <div class="col-5">
                            <p>Client,</p>
                            <h2><?php  echo $row['namep'];?></h2>
                            <p class="address"> <?php  echo $row['address'];?><br>
                                <?php  echo $row['city'];?><br>
                                <?php  echo $row['state'];?> <br>
                                <?php  echo $row['zip'];?>
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span>Online</span></p>
                            <p>Order Number: <span>#<?php  echo $row['pid'];?></span></p>
                        </div>
                        <div class="col-5">
                            <p>Order Date: <span><?php  echo $row['orderdate'];?></span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Item Name</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        

                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="mt-0 title">
                                            <img src="../pics/<?php  echo $row['image'];?>" width="80" height="80">
                                            <?php  echo $row['product'];?></p>
                                    </div>
                                </div>
                            </td>
                            <td><?php  echo $row['price'];?></td>
                            <td><?php  echo $row['qty'];?></td>
                            <td><?php  echo $row['price'];?></td>
                        </tr>
                        
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                    </div>
                    <div class="col-4">
                        <!-- Signature -->
                    </div>
                </div>
            </section>

            <footer>
                <hr>
                <p class="m-0 text-center">
                </p>
                <div class="social pt-3">
                    <?php 
}?>
                </div>
            </footer>
        </div>
    </div>










</body></html>