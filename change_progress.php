<?php
$con = mysqli_connect("localhost", "root", "", "data");
$prog    = $_POST['prog'];
$sql1 = "select max(area_id) as max from area";
    $result1 = mysqli_query($con, $sql1);
    if (!$result1) {
       echo mysqli_error($con);
   }
   while ($row1 = mysqli_fetch_array($result1)) 
   {
   	$level = $row1['max'];
   }
   
$sql="update area set progress='$prog' where area_id='$level'";
if (!mysqli_query($con, $sql)) {
    die('Error: ' . $sql . "<br>" . mysqli_error($con));
}
header('Location:home.php');
?>