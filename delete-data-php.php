<?php

$sid=$_POST['id'];

$str=implode($sid,",");

$con=mysqli_connect("localhost","root","","testt")or die("connection faield!!");
$sql="DELETE FROM  student WHERE Id IN({$str})";
if(mysqli_query($con,$sql)){
   echo 1;
}
else{
  echo 0;
}


?>
