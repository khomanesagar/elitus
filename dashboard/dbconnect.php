<?php
function getDB() {
      $con = new mysqli("166.62.124.87:3306","ppin_pcity","ppin_pcity","ppin_elitus");
      if ($con->connect_error) {
          die("Connection failed: " . $con->connect_error);
      }
      return $con;
}
?>