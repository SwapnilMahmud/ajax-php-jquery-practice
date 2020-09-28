<?php
$Fname=$_POST["fname"];
$Lname=$_POST["lname"];
$P=$_POST["Mob"];
$con=mysqli_connect("localhost","root","","personinfo")or die("connection faield!!");
$sql="INSERT INTO info (first-name,last-name,phone) VALUES ('{$Fname}', '{$Lname}', '{$P}')";

if(mysqli_query($con,$sql)){
echo 1;
}
else{
echo 0;
}
?>
