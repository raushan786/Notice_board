<?php
 $connection = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($connection,"online_notice");
$nid=$_GET['nid'];

$sql="DELETE FROM notice WHERE nid='$nid'";
$qry=mysqli_query($connection,$sql);
header("Location: admin_dashboard.php");

?>