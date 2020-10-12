<?php
$SID=$_POST["id"];
$name=$_POST["name"];
$address=$_POST["address"];
$con=mysqli_connect("localhost","root","","testt")or die("connection faield!!");
$sql="UPDATE student SET Name='{$name}',address='{$address}' WHERE Id={$SID}";
if(mysqli_query($con,$sql)){
  echo 1;
}
else{
  echo 0;
}
?>
