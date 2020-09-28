<?php

$SID=$_POST["id"];
$con=mysqli_connect("localhost","root","","testt")or die("connection faield!!");
$sql="DELETE FROM  student WHERE Id={$SID}";
if(mysqli_query($con,$sql)){
  echo 1;
}
else{
  echo 0;
}
?>
