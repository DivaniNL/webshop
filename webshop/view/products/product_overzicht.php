<?php
require 'view/config/config.php';

$sql = "SELECT * FROM `product` INNER JOIN `product_image` ON `product_id` = product.id";
$result = $conn->query($sql);
$productsa="<div class='product-flex'>";
$products="<div class='product-flex'>";

while ($row = $result->fetch_assoc()) {
$products.= "<div class='product-box'><div class='product_img_div'><img class='product_img' src='admin/view/products/upload/".$row['image']."'></div><p class='title'>".$row['name']."</p><br><p class='description'>".$row['description']."</p><br><p class='description'>Prijs: ".$row['price']."</p><br><p class='description'>Gewicht: ".$row['weight']." gram</p></div>";
}
$productsa.="</div>";
$products.="</div>";
?>

<!-- <image class='product_img'src=' -->