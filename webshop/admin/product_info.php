<?php
session_start();
require 'view/config/config.php';
include 'view/products/product_overzicht.php';
include 'view/src/checkloginadmin.php';
$id = $_GET['product_id'];
  if(isset($_POST['order2'])){
    array_push($_SESSION['cart2'],$id);  
    header("Location: index_user.php");
  }
$query2 = "SELECT * from `product` INNER JOIN `product_image` ON `product_id` = product.id WHERE `product_id` = '$id'";
$result = $conn->query($query2);
while ($row = $result->fetch_assoc()) {
$detail = "<div class='product-detail'><div class='exitrow'><a href='index_user.php'><img src='../assets/img/krruis.png' class='cross'></a></div><div class='product_img_det'><img class='product_img_big' src='view/products/upload/".$row['image']."'></div><h1 class='titledet'>".$row['name']."</h1><br><div class='det_description'>".$row['description']."</div><table>

<tr>
<th>Categorie</td>
<td>";

if($row['category_id']== 1){
  $detail .= "Racecars";
}
if($row['category_id']== 2){
  $detail .= "Classic Cars";
}
if($row['category_id']== 3){
  $detail .= "Kids";
}
if($row['category_id']== 4){
  $detail .= "Politie/Brandweer/Ambulance";
}
if($row['category_id']== 5){
  $detail .= "Vrachtwagens en Trucks";
}
if($row['category_id']== 6){
  $detail .= "Bussen, Limo's en Taxi's";
}
if($row['category_id']== 7){
  $detail .= "Army";
}
if($row['category_id']== 8){
  $detail .= "Mini";
}

$detail .= "</td>
</tr>
<tr>
<th>Kleur</td>
<td>".$row['color']."</td>
</tr>
<tr>
<th>Prijs</td>
<td>".$row['price']."</td>
</tr>
<tr>
<th>Gewicht</td>
<td>".$row['weight']."</td>
</tr>
</table>";
$detail.="<form method='POST' action='product_info.php?product_id=".$id."'><input type='submit' class='order' name='order2' value='Bestel Mij'></form></div>";
}

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
    <link rel="stylesheet" href="../assets/css/style.css">
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
      <div class="container" style="opacity: 0.5;">
        <?php echo $products3; ?>
      </div>
  
  <table>


  <tr>
  <td><strong>Kleur</strong></td>
  <td><?php echo $row['color']?></td>
  </tr>
  <tr>
  <td><strong>Prijs</strong></td>
  <td><?php echo $row['price']?></td>
  </tr>
  <tr>
  <td><strong>Gewicht</strong></td>
  <td><?php echo $row['weight']?></td>
  </tr>
  </table>
  
    </div>
  </body>
  
  </html>

