<?php
session_start();
if( isset($_SESSION["id"]) ){
    

session_unset();

// destroy the session
session_destroy(); 
header("Location:index.php");
}
?>