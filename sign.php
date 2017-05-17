<?php
$con = mysqli_connect("localhost", "root", "", "data");

//taking values from form
$email     = $_POST['contact_email'];
$password  = $_POST['pass'];
$user_name = $_POST['con_name'];
$cont_no   = $_POST['contact_no'];
$con_pass = $_POST['con_pass'];
$type     = $_POST['type'];
if($password==$con_pass){
$sql = "INSERT INTO users(email,password,user_name,user_type,contact_no) VALUES('$email','$password','$user_name','$type','$cont_no');";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . $sql . "<br>" . mysqli_error($con));
}
echo "1 record added";
header('Location:login.php');


if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}
else
header('Location:sign_up.php');
mysqli_close($con);
?> 