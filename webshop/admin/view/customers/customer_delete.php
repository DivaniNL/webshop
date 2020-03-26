<?php
session_start();
require '../config/config.php';
$id = $_GET['id'];
$sql = "DELETE FROM `customer` WHERE `id` = $id";
$result = $conn->query($sql);
header("Location: index.php");
?>