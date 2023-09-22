<?php session_start();
// error_reporting(0);
//DB conncetion
include_once('config.php');
$user=$_POST['user'];
$type=$_POST['type'];
$sq_ft=$_POST['sq_ft'];

    $sql="INSERT INTO customer(user,type,sq_ft) values('$user','$type','$sq_ft')";
     $result =mysqli_query($con, $sql);
    


?>