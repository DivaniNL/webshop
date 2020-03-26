<?php
session_start();
require 'view/config/config.php';
if($_SESSION['loginadmin'] != 'complete'){
    header("Location: login.php");
    }

?>