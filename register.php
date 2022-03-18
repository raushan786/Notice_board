<?php
// 	include ('config.php'); 

 if(isset($_POST['register'])){
	
	$fname = $_POST['fname'];
  $lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$stream = $_POST['stream'];

	$checkStr = "SELECT email FROM users WHERE email = '$email'";
		
	$exec = mysqli_query($conn,$checkStr) or die(mysqli_error($conn));

		if(mysqli_num_rows($exec)==1){
			?><script type="text/javascript">
				alert('Email already exists!');
				window.location.href = "register.php?error=email already exists";
			</script><?php

		} else 
			{

	$prepare_string = "INSERT INTO users (fname,lname,email,password,stream)
	VALUES ('$fname','$lname','$email','$password','$stream')";

	$execute = mysqli_query($conn,$prepare_string) or die(mysqli_error($conn));

	if ($execute) {
		?><script type="text/javascript">
			alert('data saved successfully');
			window.location.href = "index.php" </script><?php
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration Page</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="bootstrap-4.4.1/js/bootstrap.min.js" charset="utf-8"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- Header section code start here  -->
    <div class="row" id="header">
    <div style="font-size: 40px; margin-left: 20px;">
    <ion-icon name="book"></ion-icon>
    </div>
      <div style="line-height: 35px; margin-left: 25px; margin-top: 5px;">
        <h3>Notice Board</h3>
      </div>
      <div style="font-size: 20px; margin-left: 1100px; margin-top: 10px;"><a href="index.php" style="color: #fff; text-decoration: none; a:hover{color: #fff;"> Back to Home</a></div>
    </div>
    </div>

    <!-- Login from code starts here -->
    <section id="login_form">
      <div class="row">
        <div class="col-md-4 m-auto block">
          <center><h4>Register Here</h4></center>
          <form action="" method="post">
            <div class="form-group">
              <lable>First Name:</label>
                <input class="form-control" type="text" name="fname" placeholder="Enter your First Name">
            </div>
            <div class="form-group">
              <lable>Last Name:</label>
                <input class="form-control" type="text" name="lname" placeholder="Enter your Last Name">
            </div>
            <div class="form-group">
              <lable>Email ID:</label>
                <input class="form-control" type="text" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <lable>Passowrd:</label>
                <input class="form-control" type="password" name="password" placeholder="Enter your Password">
            </div>
            <div class="form-group">
              <lable>Select Your Stream:</label>
                <select class="form-control" name="stream">
                  <option>-Select-</option>
                  <option>BCA</option>
                  <option>Bsc</option>
                  <option>B.Tech</option>
                  <option>MCA</option>
                  <option>MBA</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit" name="register">Register</button>
          </form>
          <a href="login.php">Click here to login</a>
        </div>
      </div>
    </section>
  </body>
</html>
