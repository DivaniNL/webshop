<?php
session_start();
require '../config/config.php';
if($_SESSION['loginadmin'] != 'complete'){
    header("Location: ../../login.php");
    }

?>