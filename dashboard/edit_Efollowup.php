<?php
date_default_timezone_set('Asia/Calcutta');
include 'dbconnect.php';
session_start();
 if(!isset($_SESSION['id']))
 {
 	header("location:login.php");
 }
$con = getDB();
$id = $_POST['id'];
$follow_up_by = $_POST['follow_up_by'];
$follow_up = $_POST['follow_up'];
$dt = date('Y-m-d H:i:s');
$sql = "UPDATE reg_elitus SET follow_up_by='$follow_up_by',follow_up='$follow_up',updated_time='$dt' where id=$id";    

$result  = mysqli_query($con,$sql);	
if ($result > 0) {   
   ?> <script type="text/javascript">alert("Follow Up Updated Successfully!!!"); window.location.href = "index.php";</script><?php  
}else{
    ?> <script type="text/javascript">alert("Something Went Wrong!!!"); window.location.href = "index.php";</script><?php  
}
?>