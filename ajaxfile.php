<?php
$con=mysqli_connect("localhost","root","","testt")or die("connection faield!!");
$sql="SELECT * FROM student";
$result=mysqli_query($con,$sql) or die("sql faield");
$output="";
if(mysqli_num_rows($result)>0){
  $output='<table border="1" cellspacing="0" cellpadding="10px">
  <tr>
      <th width="30px"></th>
     <th>Id</th>
     <th>Name</th>
     <th>address</th>
      <th>Delete</th>
      <th>Edit</th>
  </tr>';
  while($row = mysqli_fetch_assoc($result)){
    $output .="<tr> <td align='center'><input type='checkbox' value='{$row['Id']}'</td><td> {$row["Id"]}</td> <td>{$row["Name"]}</td> <td>{$row["address"]}</td> <td><button class='delete-btn' data-id='{$row["Id"]}'>Delete</button></td><td><button class='edit-btn' data-id='{$row["Id"]}'>Edit</button></td></tr>";
  }
  $output .="</table>";
  mysqli_close($con);
  echo $output;
}


?>
