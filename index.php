<?php
  session_start();
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,"online_notice");

  if(isset($_POST['login'])){
    $query = "select * from users where email = '$_POST[email]' AND password = '$_POST[password]'";
    $query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
      $_SESSION['email'] = $_POST['email'];
      while($row = mysqli_fetch_assoc($query_run)){
        $_SESSION['stream'] = $row['stream'];
        $_SESSION['phpbatch1'] = $row;
        echo "<script>
        window.location.href = 'user_dashboard.php';
        </script>";
      }
    }
    else{
      echo "<script>alert('Please Enter correct email id and password');

      </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
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

    <!-- Login from code starts here -->
    <section id="login_form">
      <div class="row">
        <div class="col-md-4 m-auto block">
          <center><h4>Login Here</h4></center>
          <form action="index.php" method="post">
            <div class="form-group">
              <lable>Email ID:</label>
                <input class="form-control" type="text" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <lable>Passowrd:</label>
                <input class="form-control" type="password" name="password" placeholder="Enter your Password">
            </div>
            <button class="btn btn-primary" type="submit" name="login">Login</button>
          </form>
          <a href="register.php">Click here to register</a>
        </div>
      </div>
    </section>
  </body>
</html>
