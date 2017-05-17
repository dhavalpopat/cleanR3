<?php
$con = mysqli_connect("localhost", "root", "", "data");
$id  = $_POST['id'];
$sql="delete from area where area_id='$id'";
if (!mysqli_query($con, $sql)) {
					echo $sql;
					die('Error: ' . mysqli_error($con));
					

				}
			
?>