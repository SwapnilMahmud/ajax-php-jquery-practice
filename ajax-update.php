<?php
$sid=$_POST["id"];

$con=mysqli_connect("localhost","root","","testt")or die("connection faield!!");
$sql="SELECT * FROM student WHERE Id={$sid}";
$result=mysqli_query($con,$sql) or die("sql faield");
$output="";
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
    $output="<tr>
        <td>Name:</td>
        <td><input type='text' id='edit-name' value='{$row["Name"]}'>
            <input type='text' id='edit-id' hidden value='{$row["Id"]}'>
        </td>

    </tr>

    <tr>
        <td>Address</td>
        <td><input type='text' id='edit-address' value='{$row["address"]}'></td>

    </tr>

    <tr>

        <td><input type='submit' id='edit-submit' value='save'></td>

    </tr>";

  }

  }

  mysqli_close($con);
  echo $output;

?>
