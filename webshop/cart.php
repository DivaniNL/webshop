<?php
session_start();
require 'view/config/config.php';
include 'view/products/product_overzicht.php';
include 'view/src/checklogin.php';
$id = $_GET['product_id'];
  if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
  }
$detail = "<div class='product-detail'><div class='exitrow'><a href='index.php'><img src='assets/img/krruis.png' class='cross'></a></div><h1 class='titledet'>Winkelwagen</h1><br><table>

<tr>
<th>Gekocht</td>
<th style='text-align: right;'>Prijs</th>
</tr>
";
$wagen = $_SESSION['cart'];
$query2 = "SELECT * from `product`";
$result2 = $conn->query($query2);
while ($row2 = $result2->fetch_assoc()) {
    for($i = 0; $i < count($_SESSION['cart']); $i++) {
        if($row2['id'] == $_SESSION['cart'][$i]){
            $detail .=  "<tr><td style='text-align: left;'>".$row2['name']."</td><td>".$row2['price']."</td></tr>";
        }
    } 
}
$detail.="</table><br><form method='POST' action='order.php'><input type='submit' class='order' name='order' value='Bestel'></form></div>";
?>

<?php

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

    <div class="header"  style="opacity: 0.5;">
      <div class="inlineblock"  style="opacity: 0.5;">
        <img class="logo" src="assets/img/logo.png">
      </div>
      <div class="inlineblock"  style="opacity: 0.5;">
        <img class="headertext" src="assets/img/headertext.png">
      </div>
  
    </div>
    <header>
    <div class="nav"  style="opacity: 0.5;">
      <nav>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="">About</a></li>
          
          <li><a href="">Contact</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav2"  style="opacity: 0.5;">
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
    <div class="cats"  style="opacity: 0.5;">
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
        <?php echo $detail; ?>
      </div>
  
    </div>
  </body>
  
  </html>

