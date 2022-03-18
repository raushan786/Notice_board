<?php
session_start();
$host = 'localhost';
$name = 'root';
$password = '';
$dbname = 'online_notice';

$conn = mysqli_connect($host,$name,$password,$dbname) or die(mysqli_error($conn));

?>
