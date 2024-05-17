<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$servername = "localhost";
$username = "root";
$password = "root";
$db = "registation";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {  
die("Connection failed: " . mysqli_connect_error());
}


?>