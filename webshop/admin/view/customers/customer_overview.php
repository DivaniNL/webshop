<?php
require '../config/config.php';

$sql = "SELECT * FROM `customer`";
$result = $conn->query($sql);

$customers.="<table class='customers'>";
$customers.="<tr class='customers_row'>";
$customers.="<td class='customers_columnt'><b> ID </b></td><td class='customers_columnt'><b> Geslacht </b></td><td class='customers_columnt'><b> Voornaam </b></td><td class='customers_columnt'><b> Tussenvoegsel </b></td><td class='customers_columnt'><b> Achternaam </b></td><td class='customers_columnt'><b> Straat </b></td><td class='customers_columnt'><b> Huisnummer </b></td><td class='customers_columnt'><b> Toevoeging </b></td><td class='customers_columnt'><b> Postcode </b></td><td class='customers_columnt'><b> Woonplaats </b></td><td class='customers_columnt'><b> Telefoonnummer </b></td><td class='customers_columnt'><b> E-mail </b><td class='customers_columnt'><b> Wachtwoord </b></td><td class='customers_columnt'><b> Niewsbrief </b></td><td class='customers_columnt'><b> Updaten </b></td><td class='customers_columnt'><b> Deleten </b></td>";
while ($row = $result->fetch_assoc()) {
$customers.="<tr class='customers_row'>";
$customers.="<td class='customers_column'>".$row['id']."</td><td class='customers_column'>".$row['gender']."</td><td class='customers_column'>".$row['firstName']."</td><td class='customers_column'>".$row['middleName']."</td><td class='customers_column'>".$row['lastName']."</td><td class='customers_column'>".$row['street']."</td><td class='customers_column'>".$row['houseNumber']."</td><td class='customers_column'>".$row['houseNumber_addon']."</td><td class='customers_column'>".$row['zipCode']."</td><td class='customers_column'>".$row['city']."</td><td class='customers_column'>".$row['phone']."</td><td class='customers_column'>".$row['e-mailadres']."</td><td class='customers_column'>".$row['password']."</td><td class='customers_column'>".$row['newsletter_subscription']."</td><td class='customers_column_upd'><a href='customer_edit.php?id=".$row['id']."'><div style='line-height: 100px; height:100%;width:100%'>Updaten</div></a></td><td class='customers_column_del'><a href='customer_delete.php?id=".$row['id']."'><div style='line-height: 100px; height:100%;width:100%'>Delete</div></a></td>";
$customers.="</tr>";
}
$customers.="</table>";
?>

<!-- <image class='product_img'src=' -->