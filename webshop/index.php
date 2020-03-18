<?php
require 'config/config.php';
//alleen codeerdiepzeeduikers zien dit
session_start();
if(isset($_POST['logout'])){
$_SESSION['name'] = "";
header("Location: index.php");
}
if(isset($_POST['login'])){
header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class = "inlineblock">
            <img class="logo" src="assets/img/logo.png">
        </div>
        <div  class = "inlineblock">
            <img class="headertext" src="assets/img/headertext.png">
        </div>
        
    </div>
    <header>
    <div class="nav">
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Pricing</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav2">
      <nav>
        <ul>
        <?php if(($_SESSION['name'] !="")){ echo "<li class='right'><a href='#'><img class='icon' src='assets/img/user.png'> Hallo ". $_SESSION['name']."</a></li>";}?>
        </ul>
        <ul>
        <?php if(($_SESSION['name'] !="")){ echo "<li class='right'><a href='sign'><form method='post'><input class='btn' type='submit' name='logout' value='Log Uit'></form></a></li>";}?>
        </ul>
        <ul>
        <?php if(($_SESSION['name'] =="")){ echo "<li class='right'><a href='sign'><form method='post'><input class='btn' type='submit' name='login' value='Log In'></form></a></li>";}?>
        </ul>
      </nav>
  </header>
  <div id="content">
        <div class="container">
          
        </div>



    </div>
</body>
</html>