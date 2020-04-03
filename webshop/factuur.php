<?php
session_start();
require 'view/config/config.php';
include 'view/products/product_overzicht.php';
$customer_id = $_SESSION['customer_id'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Factuur</title>
  </head>

<body>
<div class='factuur'>
<div class="top">
<div class="topleft">
        <img class="logo" src="assets/img/logo.png">
</div>
<div class="topright">

<table>
    <tr>
        <th>Adres</th>
        <td style="font-weight: 400">Regattaweg 482</td>
    </tr>
    <tr>
        <th></th>
        <td style="font-weight: 400">9731 NE Groningen</td>
    </tr>
    <tr style="height: 10px;">
        <th></th>
        <td style="font-weight: 400"></td>
    </tr>
    <tr>
        <th>Tel</th>
        <td style="font-weight: 400">050 123 45 67</td>
    </tr>
    <tr>
        <th>Mail</th>
        <td style="font-weight: 400">info@modelautoshop.nl</td>
    </tr>
    <tr style="height: 10px;">
        <th></th>
        <td style="font-weight: 400"></td>
    </tr>
    <tr>
        <th>KvK</th>
        <td style="font-weight: 400">01140794</td>
    </tr>
    <tr>
        <th>BTW</th>
        <td style="font-weight: 400">NL 2208.17.571.B05</td>
    </tr>
    <tr>
        <th>IBAN</th>
        <td style="font-weight: 400">NL46RABO0156838915</td>
    </tr>
    <tr>
        <th>BIC</th>
        <td style="font-weight: 400">RABONL2U</td>
    </tr>
</table>
</div>

<div class="customer_info">
<p style="font-weight: 400">Bedrijf van klant</p>
<p style="font-weight: 400"><?php
$order_id = $_SESSION['order_id'];
$query = "SELECT IF (`middleName` != '', CONCAT(firstName, ' ', middleName, ' ', lastName), CONCAT(firstName, ' ', lastName)) AS full_Name, IF(tbl_order.houseNumber_addon != 'NONE', CONCAT(tbl_order.street, ' ', tbl_order.houseNumber, tbl_order.houseNumber_addon), CONCAT(tbl_order.street, ' ', tbl_order.houseNumber)) AS full_Street, CONCAT(tbl_order.zipCode, ' ', tbl_order.city) AS full_Zipcode, tbl_order.customer_id, tbl_order.country FROM tbl_order INNER JOIN tbl_order_detail ON tbl_order.id = tbl_order_detail.order_id INNER JOIN customer ON tbl_order.customer_id = customer.id INNER JOIN product ON tbl_order_detail.product_id = product.id INNER JOIN category ON product.category_id = category.id WHERE tbl_order.id = '$order_id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
echo "T.a.v ".$row['full_Name']."<br>";
echo $row['full_Street']."<br>";
echo $row['full_Zipcode']."<br>";
echo $row['country'];


?></p>
</div>
<h1 style="margin-top: 160px; float: right">Factuur</h1>
</div>

<hr>
<div style="display: block; width: 100%;">
<div style="float: left; width: 200px; margin-top: 10px;" class="inline-block">Factuurdatum:<br><p style="padding-top: 4px; font-weight: 400"><?php echo date("d/m/Y")?>  </p></div>
<div style="float: left; width: 200px; margin-top: 10px;" class="inline-block">Factuurnummer:<br><p style="padding-top: 4px; font-weight: 400"><?php 

$query2 = "SELECT `customer_id`, DATE_FORMAT(date, '%Y%m%d') AS date_order FROM tbl_order";
$result = $conn->query($query2);
$query3 = "SELECT COUNT(*) AS order_count FROM tbl_order 
WHERE `date` >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 DAY)";
$result2 = $conn->query($query3);
$row2 = $result2->fetch_assoc();
$row = $result->fetch_assoc();
$order_count = $row2['order_count'];
if($order_count <10){
$order_count = "0".$order_count;
}
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];

$sql4 = "SELECT * FROM `customer` WHERE `firstName` = '$firstName' AND `lastName` = '$lastName'";
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc();
$customer_id = $row4['id'];
echo $row['date_order'].$row['customer_id'].$order_count;?></p></div>
<div style="float: left; width: 200px; margin-top: 10px;" class="inline-block">Debiteurnummer:<br><p style="padding-top: 4px; font-weight: 400"><?php echo $customer_id?></p></div>
</div><br><Br><Br>
<hr>

<div class='prices'>
<table>
<tr>
    <th>Dienst/Product</th>
    <th>% BTW</th>
    <th>Aantal</th>
    <th>Eenheid</th>
    <th>Tarief</th>
    <th style="text-align: right; padding-right:8px">Bedrag</th>
</tr>
<?php
$sql_query = "SELECT `name`,`price`,`product_id`,`amount`, COUNT(*) AS product_count FROM tbl_order_detail INNER JOIN `product` ON tbl_order_detail.product_id = product.id WHERE order_id = $order_id GROUP BY product_id";
$qry = $conn->query($sql_query);
if($qry === false){   
	echo mysqli_error($con)." - ";
	exit(__LINE__);
} else {

	while ($row = $qry->fetch_assoc()){
        echo "<tr><td style='text-align:left; font-weight: 400'>" . $row['product_id'] . " - " . $row['name'] .  "</td>";
        echo "<td style='text-align:left; font-weight: 400'>21,00</td>";
        echo "<td style='text-align:left; font-weight: 400'>" . $row['amount'] . "</td>";
        echo "<td style='text-align:left; font-weight: 400'>".$row['price']."</td>";
        echo "<td style='text-align:left; font-weight: 400'></td>";
        echo "<td style='text-align:right; font-weight: 400'>" . ($row['amount'] * $row['price']) . "</td></tr>";
        $total_price += ($row['amount'] * $row['price']); // telt de product_prijs op bij totaalprijs van de factuur	
  
        $rounded_total_price = number_format($total_price,2);
    }    
}
?>
</table>

<table>
<tr>
    <th>Totaal Diensten/Producten</th>
    <td style="text-align: right; padding-right:8px; padding-bottom: 5px;"><?php echo $rounded_total_price?></td>
</tr>
<?php
$btw_add = 0;
$sql_query = "SELECT `name`,`price`,`product_id`,`amount`, COUNT(*) AS product_count FROM tbl_order_detail INNER JOIN `product` ON tbl_order_detail.product_id = product.id WHERE order_id = $order_id GROUP BY product_id";
$qry = $conn->query($sql_query);
if($qry === false){   
	echo mysqli_error($con)." - ";
	exit(__LINE__);
} else {

	while ($row = $qry->fetch_assoc()){
        echo "<tr><td style='text-align:left; padding-right:8px; font-weight: 400'>BTW bedrag 9,00% over " . ($row['amount'] * $row['price']) .  "</td>";
        $btw_price = ($row['price'] * 0.21);
        $rounded_btw_price = number_format($btw_price,2); // telt de product_prijs op bij totaalprijs van de factuur	
        echo "<td style='text-align:right; padding-right:8px; font-weight: 400'>" .$rounded_btw_price. "</td></tr>";
        $btw_add = $btw_add + $btw_price;
  }
  $btw_add  = $btw_add+ $rounded_total_price;
  $rounded_btw_add = number_format($btw_add,2);
}
?>
</table>
<br>
<hr class='hr_bottom'>

<table style="margin-top:10px;">
<tr>
    <th>Factuurtotaal</th>
    <th style="text-align: right; padding-right:0px; padding-bottom: 5px;">EUR</td>
    <td style="width: 20%; text-align: right; padding-right:8px; padding-bottom: 5px;"><?php echo $rounded_btw_add?></td>
</tr>
</table>
</div>

<br><br><br><br>
<p style="line-height: 1.25rem; padding-top: 4px; font-weight: 400">
Betalingsconditie:<br>
U wordt verzocht het totaalbedrag binnen 14 dagen over te maken op bovenstaand IBAN <br>o.v.v. uw debiteurnummer en factuurnummer.
</p>
</div>



</body>
</html>