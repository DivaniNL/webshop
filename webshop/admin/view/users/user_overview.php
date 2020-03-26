<?php
require '../config/config.php';

$sql = "SELECT * FROM `user`";
$result = $conn->query($sql);

$users.="<table class='users'>";
$users.="<tr class='users_row'>";
$users.="<td class='users_columnt'><b> ID </b></td><td class='users_columnt'><b> Voornaam </b></td><td class='users_columnt'><b> Tussenvoegsel </b></td><td class='users_columnt'><b> Achternaam </b></td><td class='users_columnt'><b> Geboortedatum </b></td><td class='users_columnt'><b> E-mail </b></td><td class='users_columnt'><b> Wachtwoord </b></td><td class='users_columnt'><b> Updaten </b></td><td class='users_columnt'><b> Deleten </b></td>";
while ($row = $result->fetch_assoc()) {
$users.="<tr class='users_row'>";
$users.="<td class='users_column'>".$row['id']."</td><td class='users_column'>".$row['firstName']."</td><td class='users_column'>".$row['middleName']."</td><td class='users_column'>".$row['lastName']."</td><td class='users_column'>".$row['birthDate']."</td><td class='users_column'>".$row['email']."</td><td class='users_column'>".$row['password']."</td><td class='users_column_upd'><a href='user_edit.php?id=".$row['id']."'><div style='line-height: 150px; height:100%;width:100%'>Updaten</div></a></td><td class='users_column_del'><a href='user_delete.php?id=".$row['id']."'><div style='line-height: 150px; height:100%;width:100%'>Delete</div></a></td>";
$users.="</tr>";
}
$users.="</table>";
?>

<!-- <image class='product_img'src=' -->