<?php 
 
 session_start();
 $username = $_SESSION['id']; 
 unset($_SESSION['id']); 
 session_destroy(); 
 header("location: login.php"); 
 exit(); 
 if(!isset($_SESSION['id']))
 {
    header("location:login.php");
 }
?>