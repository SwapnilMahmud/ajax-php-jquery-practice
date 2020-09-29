<?php
$Eid=$_POST["id"];
$con=mysqli_connect("localhost","root","","agro") or die("connection faield");
$sql="DELETE FROM employee WHERE id={$Eid}";
if(mysqli_query($con,$sql)){
  echo 1;
}
else{
  echo 0;
}


?>
