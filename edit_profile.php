<?php
  session_start();
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,"online_notice");
  $fname = "";
  $lname = "";
  $email = "";
  $password = "";
  $stream = "";
  $query = "select * from users where email = '$_SESSION[email]'";
  $query_run = mysqli_query($connection,$query);
  while($row = mysqli_fetch_assoc($query_run)){
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $password = $row['password'];
    $stream = $row['stream'];
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
  </head>
  <body>
    <form action="" method="post">
      <div class="form-group">
        <label>First Name:</label>
        <input type="text" class="form-control" name="fname" value="<?php echo $fname;?>">
      </div>
      <div class="form-group">
        <label>Last Name:</label>
        <input type="text" class="form-control" name="lname" value="<?php echo $lname;?>">
      </div>
      <div class="form-group">
        <label>Email:</label>
        <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
      </div>
      <div class="form-group">
        <label>Password:</label>
        <input type="password" class="form-control" name="password" value="<?php echo $password;?>">
      </div>
      <div class="form-group">
        <label>Select Stream:</label>
        <select class="form-control" name="stream" required>
          <option><?php echo $stream;?></option>
          <option>BCA</option>
          <option>Bsc</option>
          <option>B.Tech</option>
          <option>MCA</option>
          <option>MBA</option>
        </select>
      </div>
      <button type="submit" name="update_profile" class="btn btn-primary">Update</button>
    </form>
  </body>
</html>
