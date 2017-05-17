<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "data");
$email = $_POST['contact_email'];
$passwd  = $_POST['pass'];
$sql_dept  = "select password from users where email='$email'";
$result    = mysqli_query($con, $sql_dept);
if (!$result) {
    echo mysqli_error($con) . "<br>";
}
while ($row = mysqli_fetch_array($result)) {
    $pass = $row['password'];
}
if($pass==$passwd)
{
	
	$sql    = "select user_id from users where email='" . $email . "'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $user_id = $row['user_id'];
    }
	$_SESSION["id"] = $user_id;
	header('Location:home.php');
}
else
{
	header('Location:login.php');
}
?>