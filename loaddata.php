<?php


$con=mysqli_connect("localhost","root","","personinfo") or die("connection field!");
$sql="SELECT * FROM info";
$result=mysqli_query($con,$sql) or die("sql field!!!!");
$output='';
if(mysqli_num_rows($result)>0){

  $output='<table border="1" cellspacing="0" cellpadding="10px">
   <tr>
     <th>First-name</th>
     <th>Last-name</th>
     <th>Phone</th>
   </tr>';
   while($row=mysqli_fetch_assoc($result)){
     $output .="<tr><td>{$row["first-name"]}</td><td>{$row["last-name"]}</td><td>{$row["phone"]}</td></tr>";
   }
   $output .="</table>";
   mysqli_close($con);
   echo $output;
}





?>
