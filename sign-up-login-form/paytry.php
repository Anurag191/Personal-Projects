<?php
session_start();

?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=password] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}


@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<h2>Fill out your details</h2>
<?php  
    include("dbconnection.php");          
    $query=$con->query("SELECT * FROM login");

?>

<div class="row">
  <div class="col-75">
    <div class="container">
      
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>


            <form  method="post">
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="username" value="<?php echo $_SESSION['name'] ?>">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value="<?php echo $_SESSION['valid'] ?>">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" value="<?php echo $_SESSION['address'] ?>">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" value="<?php echo $_SESSION['city'] ?>">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" value="<?php echo $_SESSION['state'] ?>">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" value="<?php echo $_SESSION['zip'] ?>">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" value="<?php echo $_SESSION['name'] ?>">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="password" id="cvv" name="" placeholder="">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" value="pay" name="pay" class="btn">
      </form>


    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <table>
        <?php foreach ($_SESSION['cart_item'] as $x){  ?>
        <tr>
          <td> <?php echo $x["name"] ; ?></td>
          <td align="right"> <?php echo $x["qty"]; ?></td>

        </tr>
        <?php
} ?>
      </table>
<?php
         // include('connection.php');  
            if(isset($_POST["pay"]))
{

if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zip']))
{
  $user=$_POST['username'];
  $email=$_POST['email'];
  $add=$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state'];
  $zip=$_POST['zip'];
  $idu=$_SESSION['id'];
  $idp=$_SESSION['prodid'];
 
  $con= mysqli_connect("localhost","root","","trial","3306");
  foreach ($_SESSION['cart_item'] as $x)
{
    $qty = $x["qty"];
    $prod = $x["name"];
  $sql="INSERT INTO pay(namep,email,address,city,state,zip,product,qty,userid,prodid) VALUES('$user','$email','$add','$city','$state','$zip','$prod','$qty','$idu','$idp')";

  $result=$con->query($sql);
}

  if($result){
  echo '<script>alert("Order confirmed")</script>';
  //header("Location: start.php");//ERROR
  echo '<script>window.open("start.php")</script>';//ERROR
  } else {
  echo '<script>alert("Failure!!!")</script>';
  }

  

} else {
  echo '<script>alert("All fields required")</script>';;
}
}

?>


      <p>Total <span class="price" style="color:black"><b><?php echo $_SESSION['total']; ?></b></span></p>
    </div>
  </div>
</div>
<?php
/*

submit button taa <form></form> er baire 6ilo ..

find and replace korle bujhte parbi FORM er bhetor ekta form khola roe6e...ota ami thik kore die6i :)*/

?>
