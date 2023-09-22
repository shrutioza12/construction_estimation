<?php
// $con=mysqli_connect("localhost","root","","charity");

$con=mysqli_connect("localhost","root","","construction_estimator");

if (! $con) 
{  
// die("Connection failed" . mysqli_connect_error());  
}  
else 
{  
mysqli_select_db($con, 'pagination');  
}  
?>  