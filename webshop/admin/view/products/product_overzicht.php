<?php
session_start();
require 'view/config/config.php';

$sql = "SELECT * FROM `product` INNER JOIN `product_image` ON `product_id` = product.id";
$result = $conn->query($sql);
$productsa="<div class='product-flex'>";
$products="<div class='product-flex'>";
$products2="<div class='product-flex'>";
$products3="<div class='product-flex'>";

while ($row = $result->fetch_assoc()) {
$productsa.= "<div class='product-box'><div class='product_img_div'><img class='product_img' src='view/products/upload/".$row['image']."'></div><a href='view/products/product_wijzigen.php?id=".$row['product_id']."'<button class='btn_update'>Updaten</button></a><a href='view/products/product_verwijderen.php?id=".$row['product_id']."'<button class='btn_delete'>Delete</button></a><p class='title'>".$row['name']."</p><br><p class='description'>".$row['description']."</p><br><p class='description'>Prijs: ".$row['price']."</p><br><p class='description'>Gewicht: ".$row['weight']." gram</p></div>";
$products.= "<div class='product-box'><a class='detail_href' href='product_info.php?product_id=".$row['product_id']."'><div class='product_img_div'><img class='product_img' src='admin/view/products/upload/".$row['image']."'></div><p class='title'>".$row['name']."</p><br><p class='description'>".$row['description']."</p><br><p class='description'>Prijs: ".$row['price']."</p><br><p class='description'>Gewicht: ".$row['weight']." gram</p></a></div>";
$products2.= "<div class='product-box'><a class='detail_href' href='product_info.php?product_id=".$row['product_id']."'><div class='product_img_div'><img class='product_img' src='view/products/upload/".$row['image']."'></div><p class='title'>".$row['name']."</p><br><p class='description'>".$row['description']."</p><br><p class='description'>Prijs: ".$row['price']."</p><br><p class='description'>Gewicht: ".$row['weight']."</p><br><p class='description'>Prijs: ".$row['price']."</p><br><p class='description'>Gewicht: ".$row['weight']." gram</p></a></div>";
$products3.= "<div class='product-box'><div class='product_img_div'><img class='product_img' src='view/products/upload/".$row['image']."'></div><p class='title'>".$row['name']."</p><br><p class='description'>".$row['description']."</p><br><p class='description'>Prijs: ".$row['price']."</p><br><p class='description'>Gewicht: ".$row['weight']." gram</p></div>";
}
$productsa.="</div>";
$products.="</div>";
$products2.="</div>";
$products3.="</div>";

?>

<!-- <image class='product_img'src=' -->