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
            Admin Login Form
         </div>
         <form  method="post" action="">
            <div class="field">
               <input type="email" name="email" placeholder="" required="">
               <label>Email Address</label>
            </div>
            <div class="field">
               <input type="password" name="pswd" placeholder="" required="">
               <label>Password</label>
            </div>
            <div class="content">
               
              
            </div>
            <div class="field">
               <input type="submit" value="Login" name="login">
            </div>
            </div>
         </form>
				<?php
					if(isset($_POST["login"])){

					if(!empty($_POST['email']) && !empty($_POST['pswd'])) {
 					 $user2=$_POST['email'];
 					 $pass2=$_POST['pswd'];

  					$con= mysqli_connect("localhost","root","","trial","3306");

  					$query=$con->query("SELECT * FROM admin WHERE email='".$user2."' AND password='".$pass2."'");
  					$numrows=mysqli_num_rows($query);
  					if($numrows!=0)
  					{
  					while($row=mysqli_fetch_assoc($query))
  					{
  					$dbusername=$row['email'];
  					$dbpassword=$row['password'];
  					}

  					if($user2 == $dbusername && $pass2 == $dbpassword)
  					{

  				  echo '<script>alert("Login successful")</script>';
  					session_start();
  					$_SESSION['valid']=$user2;

  
  					header("Location: admin.php");

 						 }
 						 } else {
  						echo '<script>alert("Invalid username or Password")</script>';
  						}
  					}

							 else {
						  echo '<script>alert("All fields required")</script>';
							}
}							
							?>
			</div>
	</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
