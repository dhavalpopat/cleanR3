<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "data");
$id = $_SESSION["id"];
//taking values from form
$user_name = $_POST['con_name'];
$cur_pass = $_POST['cur_pass'];
$cont_no   = $_POST['contact_no'];
$con_pass = $_POST['con_pass'];
$pass = $_POST['pass'];

$sql1 = "select * from users  where user_id='$id'";
    $result1 = mysqli_query($con, $sql1);
    if (!$result1) {
       echo mysqli_error($con);
   }
   while ($row1 = mysqli_fetch_array($result1)) 
   {
   	$password = $row1['password'];
   }
   //echo "hello2";
   if($cur_pass==$password){

if($pass==$con_pass){
$sql = "update users set user_name='$user_name',password='$pass',contact_no='$cont_no' where user_id='$id'";

if (!mysqli_query($con, $sql)) {
  echo "error";
    die('Error: '. mysqli_error($con));
}
echo "1 record added";
header('Location:home.php');


if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}
}
else
header('Location:edit_profile.php');
mysqli_close($con);
?> 