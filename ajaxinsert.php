<?php
$Id=$_POST["Id"];
$Name=$_POST["Name"];
$Address=$_POST["Address"];
$con=mysqli_connect("localhost","root","","testt")or die("connection faield!!");
$sql="INSERT INTO student (Id, Name, address) VALUES ('{$Id}', '{$Name}', '{$Address}')";

if(mysqli_query($con,$sql)){
echo 1;
}
else{
echo 0;
}
 ?>
