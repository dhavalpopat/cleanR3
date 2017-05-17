<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "data");
$lat  = $_POST['lat'];
$long  = $_POST['long'];
$desc  = $_POST['desc'];
$uid = $_SESSION["id"];
$target_dir  = "download/";
$target_path = $target_dir .time(). basename($_FILES['fileToUpload']['name']);
$uploadOk    = 1;
//finding type of file
$FileType    =pathinfo(basename($_FILES['fileToUpload']['name']), PATHINFO_EXTENSION);
$data=$target_path;
$sql="insert into area(latitude,longitude,img_path,description,uid) values('$lat','$long','$data','$desc','$uid');";
if (file_exists($target_path)) {
			 header('Location:home.php');
			$uploadOk = 0;
		}
         //checking if the file is a pdf
		if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"
&& $FileType != "gif" ) {
			echo "file type error ";die;
			header('Location:home.php');
			$uploadOk = 0;
		}
if ($uploadOk == 0) {

			echo "Sorry, your file was not uploaded.";
			die;
		}
else {
    //moving the uploaded file to destination folder
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_path)) {
				echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
				if (!mysqli_query($con, $sql)) {
					echo $sql;
					die('Error: ' . mysqli_error($con));
					

				}
			
					 header('Location:home.php');	
				
			} else {
						 header('Location:home.php');
			

			}
		}
?>