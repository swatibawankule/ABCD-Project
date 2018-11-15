<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title></title>

    <!-- Bootstrap -->
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
   
  </head>
 
  <body>
 

  <?php

	require('connect.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['submit'])){
		
		$username = $_REQUEST['username']; // removes backslashes
		$username = mysqli_real_escape_string($conn,$username); //escapes special characters in a string
		$password = $_REQUEST['password'];
		$password = mysqli_real_escape_string($conn,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin` WHERE username='".$username."' and password='".$password."'";
		$result = mysqli_query($conn,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			echo $username;
		header("Location: customer_dashboard.php"); // Redirect user to index.php
		//printf("<script>location.href=' index.php'</script>");
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{

?>
<style>
.container2 {
width: 960px;
position: relative;
margin:0 auto;
line-height: 1.4em;
}
 
@media only screen and (max-width: 479px){
    .container2 { width: 90%; }
}
</style>
  
  <div class="">
   <form action="" method="POST" id="form">
   <div align="center" class="">
	
    <div align="center" class="row">
           <div style="margin-top:100px;" class="col-lg-12">
               
          <img src="logo.jpg" alt="ABCD" height="90" width="180" width="100%">
                     </div>
          </div>
	  </div>
  
 
   
    <div class="row">
	    <h3 align="center">Admin login</h3>
		<div class="col-sm-4 col-xs-12"  style="margin-bottom:10px">
		</div>
		 <div class="col-sm-4 col-xs-12"  style="margin-bottom:10px">
            <label for="username">Username:</label>
      <input type="username" class="form-control " id="username" placeholder="PLease Enter admin" name="username">
		  </div>
		  <div class="col-sm-4 col-xs-12"  style="margin-bottom:10px">
		  </div>
		</div>
		 <div class="row">
	   
		<div class="col-sm-4 col-xs-12"  style="margin-bottom:10px">
		</div>
		 <div class="col-sm-4 col-xs-12"  style="margin-bottom:10px">
             <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="PLease Enter admin" name="password">
		  </div>
		  <div class="col-sm-4 col-xs-12"  style="margin-bottom:10px">
		  </div>
		</div>
		
		 <div class="row">
	   
		<div class="col-sm-4 col-xs-12"  style="margin-bottom:10px">
		</div>
		 <div class="col-sm-4 col-xs-12"  style="margin-bottom:10px">
          <button type="submit" name="submit" class="btn btn-success">Login</button>
		  </div>
		  <div class="col-sm-4 col-xs-12"  style="margin-bottom:10px">
		  </div>
		</div>
   
   
  </form>
</div>
    <?php ini_set('display_errors',1); } ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>