<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title> 
  <!--<link rel="stylesheet" href="./style.css"> -->
  <style>
p {text-align: center;}
</style>

</head>
<body>
<!--partial:index.partial.html -->
<!DOCTYPE html>
<html>
<body>
	<div class="main">  	
		<!--<input type="checkbox" id="chk" aria-hidden="true">-->
		
<form action="" method="post">
			<div class="signup">
				
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="Username" placeholder="User name">
					<input type="email" name="Email" placeholder="Email" >
					<input type="password" name="Password" placeholder="Password">
					<!--<input type="submit" name="register" value="register">register</button>-->
					<input type="submit" name="register" value="register"  class="button">
				</form>
				<?php
			// include('connection.php');  
				if(isset($_POST["register"])){

if(!empty($_POST['Username']) && !empty($_POST['Email']) && !empty($_POST['Password']))
{
  $user=$_POST['Username'];
  $email=$_POST['Email'];
  $pass=$_POST['Password'];
  echo $user;
 
  $con= mysqli_connect("localhost","root","","trial","3306");
  $query=$con->query("SELECT * FROM login WHERE username='".$user."'");
  $numrows=mysqli_num_rows($query);
  if($numrows==0)
  {
  $sql="INSERT INTO login(username,email,password) VALUES('$user','$email','$pass')";

  $result=$con->query($sql);


  if($result){
  echo '<script>alert("Account Successfully Created")</script>';
  
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



			<div class="login">
				<form name="form1" method="post" action="">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<!--<button type="button" name="login" value="login">login</button>-->
					<input type="submit" name="login" value="login" class="button">
					<br>
					<p> Login using <a href="admin_login">Admin</a> Mode</p>
				</form>
				<?php
					if(isset($_POST["login"])){

					if(!empty($_POST['email']) && !empty($_POST['pswd'])) {
 					 $user1=$_POST['email'];
 					 $pass1=$_POST['pswd'];

  					$con= mysqli_connect("localhost","root","","trial","3306");

  					$query=$con->query("SELECT * FROM login WHERE email='".$user1."' AND password='".$pass1."'");
  					$numrows=mysqli_num_rows($query);
  					if($numrows!=0)
  					{
  					while($row=mysqli_fetch_assoc($query))
  					{
  					$dbusername=$row['email'];
  					$dbpassword=$row['password'];
  					$dbid=$row['id'];
  					$dbname=$row['username'];
  					}

  					if($user1 == $dbusername && $pass1 == $dbpassword)
  					{

  				  echo '<script>alert("Login successful")</script>';
  					session_start();
  					$_SESSION['valid'] = $user1;
  					$_SESSION['name'] = $dbname;
						$_SESSION['id'] = $dbid;

  
  					header("Location: start.php");

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
