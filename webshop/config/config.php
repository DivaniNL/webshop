<?php
$servername = "localhost";
$dbname     = "Webshop";
$username   = "root";
$password   = "root";

// $datum = $_POST['tijd'];
// Maak verbinding
$conn = new mysqli($servername, $username, $password, $dbname);
// Controleer verbinding
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
echo "test";
?>