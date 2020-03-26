<?php
session_start();
require 'view/config/config.php';

include 'view/src/checkloginadmin.php';

include 'view/products/product_overzicht.php';
//alleen codeerdiepzeeduikers zien dit
if (isset($_POST['logout'])) {
  header("Location: view/src/logout.php"); //login formulier pagina
}
if (isset($_POST['add'])) {
  header("Location: view/products/product_toevoegen.php"); //login formulier pagina
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
    <div class="inlineblock">
      <img class="logo" src="assets/img/logo.png">
    </div>
    <div class="inlineblock">
      <img class="headertext" src="assets/img/headertext.png">
    </div>

  </div>
  <header>
    <div class="nav">
      <nav>
        <ul>
          <li><a href="">Home</a></li>
          <li><a href="">About</a></li>
          
          <li><a href="">Contact</a></li>
          <li><a href="index.php">Beheerderswebsite</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav2">
      <nav>
        <ul>
          <?php if (($_SESSION['namea'] != "")) {
            echo "<li class='right'><a href='#'><img class='icon' src='assets/img/user.png'> Hallo " . $_SESSION['namea'] . " [Admin]</a></li>";
          } ?>
        </ul>
        <ul>
          <?php if (($_SESSION['namea'] != "")) {
            echo "<li class='right'><form method='post'><a href='#'><input class='btn' type='submit' name='logout' value='Log Uit'></a></form></li>";
          } ?>
        </ul>
        
      </nav>
  </header>
  <br>
  <div class="cats">
  <ul>
          <?php
            echo "<li><a class='category_link' href='categorie.php?cat_id=1'>Racecars</a></li>";
          ?>
        </ul>
        <ul>
          <?php
            echo "<li><a class='category_link' href='categorie.php?cat_id=2'>Classic Cars</a></li>";
          ?>
        </ul>
        <ul>
          <?php
            echo "<li><a class='category_link' href='categorie.php?cat_id=3'>Kids</a></li>";
          ?>
        </ul>
        <ul>
          <?php
            echo "<li><a class='category_link' href='categorie.php?cat_id=4'>Politie/Brandweer/Ambulance</a></li>";
          ?>
        </ul>
        <ul>
          <?php
            echo "<li><a class='category_link' href='categorie.php?cat_id=5'>vrachtwagens en trucks</a></li>";
          ?>
        </ul>
        <ul>
          <?php
            echo "<li><a class='category_link' href='categorie.php?cat_id=6'>bussen, limo's en taxi's</a></li>";
          ?>
        </ul>
        <ul>
          <?php
            echo "<li><a class='category_link' href='categorie.php?cat_id=7'>Army</a></li>";
          ?>
        </ul>
        <ul>
          <?php
            echo "<li><a class='category_link' href='categorie.php?cat_id=8'>Mini</a></li>";
          ?>
        </ul>
        </div>
  <div id="content">
    <div class="container">
      <?php echo $products2; ?>
    </div>



  </div>
</body>

</html>