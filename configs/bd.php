<?php
$servername = "localhost";
$username = "root";
$password = "";
$bd = "organicfood";

// Create connection
$conn = new mysqli($servername, $username, $password, $bd);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
/*echo "Connected successfully";*/
?>