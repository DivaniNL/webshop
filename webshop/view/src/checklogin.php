<?php
session_start();
require 'view/config/config.php';
if($_SESSION['login'] != 'complete'){
    header("Location: login.php");
    }

?>