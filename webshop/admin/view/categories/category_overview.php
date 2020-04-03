<?php
require '../config/config.php';

$sql = "SELECT * FROM `category`";
$result = $conn->query($sql);

$category.="<table class='category'>";
$category.="<tr class='category_row'>";
$category.="<td class='category_columnt'><b> ID </b></td><td class='category_columnt'><b> Naam Categorie </b></td><td class='category_columnt'><b> Beschrijiving </b></td><td class='category_columnt'><b> Updaten </b></td><td class='category_columnt'><b> Deleten </b></td>";
while ($row = $result->fetch_assoc()) {
$category.="<tr class='category_row'>";
$category.="<td style='background-color= white' class='category_column'>".$row['id']."</td><td class='category_column'>".$row['name']."</td><td class='category_column'>".$row['description']."</td><td class='category_column_upd'><a href='category_edit.php?id=".$row['id']."'><div style='line-height: 100px; height:100%;width:100%'>Updaten</div></a></td><td class='category_column_del'><a href='category_delete.php?id=".$row['id']."'><div style='line-height: 100px; height:100%;width:100%'>Delete</div></a></td>";
$category.="</tr>";
}
$category.="</table>";
?>

<!-- <image class='product_img'src=' -->