<?php
$con=mysqli_connect("localhost","root","","testt") or die("connection failed");
$sql="SELECT * FROM student";
$result=mysqli_query($con,$sql) or die("sql query failed");
$output="";
if(mysqli_num_rows($result)>0){
  $output='<table border="1" width="100%" cellspacing="0" cellpadding="10px">
  <tr>
    <th>Id</th>
    <th>name</th>
  </tr>';
  while($row= mysqli_fetch_assoc($result)){
    $output .="<tr> <td>{$row["Id"]}</td> <td>{$row["Name"]}</td></tr>";
  }

$output .="</table>";
mysqli_close($con);
echo $output;
}
 ?>
