<?php
// 	include ('config.php'); 

 if(isset($_POST['register'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$checkStr = "SELECT email FROM contact WHERE email = '$email'";
		
	$exec = mysqli_query($conn,$checkStr) or die(mysqli_error($conn));

		if(mysqli_num_rows($exec)==1){
			?><script type="text/javascript">
				alert('Email already exists!');
				window.location.href = "contact.php?error=email already exists";
			</script><?php

		} else 
			{

	$prepare_string = "INSERT INTO contact (name,email,message)
	VALUES ('$name','$email','$message')";

	$execute = mysqli_query($conn,$prepare_string) or die(mysqli_error($conn));

	if ($execute) {
		?><script type="text/javascript">
			alert('data saved successfully');
			window.location.href = "home.php" </script><?php
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contact Us</title>
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
      <div style="font-size: 20px; margin-left: 1100px; margin-top: 10px;"><a href="home.php" style="color: #fff; text-decoration: none; a:hover{color: #fff;"> Back to Home</a></div>
    </div>
    </div>

    <!-- Login from code starts here -->
    <section id="login_form">
      <div class="row">
        <div class="col-md-4 m-auto block">
          <center><h4>Contact Us</h4></center>
          <form action="" method="post">
            <div class="form-group">
              <lable> Name:</label>
                <input class="form-control" type="text" name="name" placeholder="Enter your First Name">
            </div>
            <div class="form-group">
              <lable>Email ID:</label>
                <input class="form-control" type="text" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <lable>Message</label>
              <textarea name="message" rows="5" class="form-control" placeholder="Message"></textarea>
            </div>
              
            <button class="btn btn-primary" type="submit" name="register">Send Message</button>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>
