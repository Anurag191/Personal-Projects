<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form Design | CodeLab</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="login">
         <div class="title">
            Signup Form
         </div>
         <form  method="post" action="">
             <div class="field">
               <input type="text" name="Username" placeholder="" required="">
               <label>Username</label>
            </div>
            <div class="field">
               <input type="email" name="email" placeholder="" required="">
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="Password" placeholder="" required="">
               <label>Password</label>
            </div>
            <div class="field">
               <input type="text" name="Address" placeholder="" required="">
               <label>Address</label>
            </div>
            <div class="field">
               <input type="text" name="City" placeholder="" required="">
               <label>City</label>
            </div>
            <div class="field">
               <input type="text" name="State" placeholder="" required="">
               <label>State</label>
            </div>
            <div class="field">
               <input type="number" name="Zip" placeholder="" required="">
               <label>Zip</label>
            </div>
            <div class="content">
               
              
            </div>
            <div class="field">
               <input type="submit" value="register" name="register">
            </div>
            <div class="signup-link">
              Back to Login? <a href="../index.php">Login</a>
            </div>
         </form>
<?php
         // include('connection.php');  
            if(isset($_POST["register"])){

if(!empty($_POST['Username']) && !empty($_POST['email']) && !empty($_POST['Password']) && !empty($_POST['Address']) && !empty($_POST['City']) && !empty($_POST['State']) && !empty($_POST['Zip']))
{
  $user=$_POST['Username'];
  $email=$_POST['email'];
   $pass=$_POST['Password'];
  $add=$_POST['Address'];
  $city=$_POST['City'];
  $state=$_POST['State'];
  $zip=$_POST['Zip'];
 
  $con= mysqli_connect("localhost","root","","trial","3306");
  $query=$con->query("SELECT * FROM login WHERE username='".$user."'");
  $numrows=mysqli_num_rows($query);
  if($numrows==0)
  {
  $sql="INSERT INTO login(username,email,password,address,city,state,zip) VALUES('$user','$email','$pass','$add','$city','$state','$zip')";

  $result=$con->query($sql);


  if($result){
  echo '<script>alert("Account Successfully Created")</script>';
  header("Location: ../login.php");
  } else {
  echo '<script>alert("Failure!!!")</script>';
  }

  } else {
  echo '<script>alert("Account already esists!!!")</script>';
  }

} else {
  echo '<script>alert("All fields required")</script>';;
}
}

?>
      </div>
   </body>
</html>