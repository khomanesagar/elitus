<?php

$host         = "166.62.124.87:3306";
$username     = "ppin_pcity";
$password     = "ppin_pcity";
$dbname       = "ppin_elitus";

/*$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "elitus";*/

$result = 0;

/* Create connection */
$conn = new mysqli($host, $username, $password, $dbname);
/* Check connection */
if ($conn->connect_error) {
     die("Connection to database failed: " . $conn->connect_error);
}

/* Get data from Client side using $_POST array */
$name  = $_POST['name'];
$mobile  = $_POST['mobile'];
$email  = $_POST['email'];
$city  = $_POST['city'];
$message  = $_POST['message'];
/* validate whether user has entered all values. */
if(!$name || !$mobile || !$city){
  $result = 2;
}
else {
   //SQL query to get results from database
   $sql    = "insert into reg_elitus (name, mobile, email, city, message) values (?, ?, ?, ?, ?)";
   $stmt   = $conn->prepare($sql);
   $stmt->bind_param('sssss', $name, $mobile, $email, $city, $message);
   if($stmt->execute()){
     $result = 1;
   }
   $result = 1;
   
    $subject = "Welcome to Elitus";    
	$message = "<h1>Hello ".$name.",</h1>";
	$message .= "Thank you for contacting Team Elitus ! The Sales Team will get in touch with you shortly ! Have a great day ! <br>
	Kindly note your BOOKING CODE: XYZ1LAKH<br><br>
                - <b> Pristine Properties.</b>";
	$header = "From:sales@pristinepune.com \r\n";
	$header .= "MIME-Version: 1.0\r\n";
	$header .= "Content-type: text/html\r\n";
	 
	$retval = mail ($email,$subject,$message,$header);
	 
	 if( $retval == true ) {
		$result = 1;
	 }else {
		$result = 2;
	 }
	 
}
echo $result;
$conn->close();

?>
