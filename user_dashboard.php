<?php
session_start();
if(isset($_POST['update_profile'])){
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,"online_notice");
  $query = "update users set fname='$_POST[fname]',lname='$_POST[lname]',email='$_POST[email]',password='$_POST[password]',stream='$_POST[stream]' where email='$_SESSION[email]'";
  $query_run = mysqli_query($connection,$query);
  if($query_run){
    echo "<script type='text/javascript'>
    alert('Profile Updated successfully...');
    window.location.href = 'user_dashboard.php'
    </script>";
  }
  else{
    echo "<script type='text/javascript'>
    alert('Can't update try again...');
    window.location.href = 'user_dashboard.php'
    </script>";
  }
}
?>
<?php
if(!($_SESSION['phpbatch1']))
{
	header('location:index.php');
}?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Dashboard</title>
    <!-- Bootstrap files -->
    <script src="bootstrap-4.4.1/js/bootstrap.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">
    <script src="jQuery/juqery_latest.js" charset="utf-8"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#edit_profile_button").click(function(){
          $("#main_content").load('edit_profile.php');
        });

        $("#view_notice_button").click(function(){
          $("#main_content").load('view_notice.php');
        });

      });
    </script>
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
    <div style="font-size: 20px; margin-left: 1000px; margin-top: 5px;"><a href="user_dashboard.php" style="color: #fff; text-decoration: none; a:hover{color: #fff;"> Back to User DashBoard</a></div>
    </div>
    <br>
    <section id="container">
      <div class="row">
        <div class="col-md-2" id="left_sidebar">
          <img src="../img/avatar.png" class="img-rounded" width="200px" height="200px">
          <center><b>Welcome <?php echo $_SESSION['phpbatch1']['fname'];?></b></center><hr>
          <button type="button" class="btn btn-primary btn-block" id="edit_profile_button">Edit Profile</button>
          <button type="button" class="btn btn-warning btn-block" id="view_notice_button">View All Notices</button>
          <a href="logout.php" type="button" class="btn btn-success btn-block">Logout</a><br>
        </div>
        <div class="col-md-8" id="main_content">
          <h2 style=" color: #b60c0c; font-size: 30px; font-weight: 600; text-transform: uppercase;">Welcome to user Dashboard</h2><br><br>
          <div style=" color: #000; font-size: 20px; font-weight: 500; padding:"><h5>This is the User Dashboard page.
            Here User can See <br>class notice as well as Academic Notification.<br>And aslo you can Edit your Profile.</h5></div>
           <p style="width: 200px; height: 100px; margin-left: 450px; margin-top: -140px;"><img src="images/user.svg"></p>
        </div>
    </section>
  </body>
</html>
