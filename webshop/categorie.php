<?php
session_start();
require 'view/config/config.php';

include 'view/src/checkloginadmin.php';
$categorie_id = $_GET['cat_id'];

$query2 = "SELECT * from `product` INNER JOIN `product_image` ON `product_id` = product.id WHERE `category_id` = $categorie_id";
$result = $conn->query($query2);
$productsa="<div class='product-flex'>";
$products="<div class='product-flex'>";

while ($row = $result->fetch_assoc()) {
$productsa.= "<div class='product-box'><div class='product_img_div'><img class='product_img' src='admin/view/products/upload/".$row['image']."'></div><a href='view/products/product_wijzigen.php?id=".$row['product_id']."'<button class='btn_update'>Updaten</button></a><a href='view/products/product_verwijderen.php?id=".$row['product_id']."'<button class='btn_delete'>Delete</button></a><p class='title'>".$row['name']."</p><br><p class='description'>".$row['description']."</p></div>";
$products.= "<div class='product-box'><div class='product_img_div'><img class='product_img' src='admin/view/products/upload/".$row['image']."'></div><p class='title'>".$row['name']."</p><br><p class='description'>".$row['description']."</p></div>";
}
$productsa.="</div>";
$products.="</div>";
$result = $conn->query($query2);
if (isset($_POST['logout'])) {
    header("Location: view/src/logout.php"); //login formulier pagina
  }
  if (isset($_POST['add'])) {
    header("Location: view/products/product_toevoegen.php"); //login formulier pagina
  }
  if (isset($_POST['users'])) {
    header("Location: view/users"); //login formulier pagina
  }
  if (isset($_POST['customers'])) {
    header("Location: view/customers"); //login formulier pagina
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
          <li><a href="index.php">Home</a></li>
          <li><a href="">About</a></li>
          
          <li><a href="">Contact</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav2">
      <nav>
        <ul>
          <?php if (($_SESSION['name'] != "")) {
            echo "<li class='right'><a href='#'><img class='icon' src='assets/img/user.png'> Hallo " . $_SESSION['name'] . " [Guest] </a></li>";
          } ?>
        </ul>
        <ul>
          <?php if (($_SESSION['namea'] == "")) {
            echo "<li class='right'><a href='admin/login.php'>Login als Admin</a></li>";
          } ?>
        </ul>
        <ul>
          <?php if (($_SESSION['name'] != "")) {
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
    </header>
    <div id="content">
      <div class="container">
        <?php echo $products; ?>
      </div>
  
  
  
    </div>
  </body>
  
  </html>

