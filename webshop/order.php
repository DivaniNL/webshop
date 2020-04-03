<?php
session_start();
require 'view/config/config.php';
include 'view/products/product_overzicht.php';
include 'view/src/checklogin.php';
$id = $_GET['product_id'];
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$detail = "<div class='product-detail'><div class='exitrow'><a href='index.php'><img src='assets/img/krruis.png' class='cross'></a></div><h1 class='titledet'>Bestellen</h1><br><table>

<tr>
<th>Gekocht</td>
<th style='text-align: right;'>Prijs</th>
</tr>
";
$totaal = 0;
$wagen = $_SESSION['cart'];
$query2 = "SELECT * from `product`";
$result2 = $conn->query($query2);
while ($row2 = $result2->fetch_assoc()) {
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($row2['id'] == $_SESSION['cart'][$i]) {
            $detail .=  "<tr><td style='text-align: left;'>" . $row2['name'] . "</td><td>" . $row2['price'] . "</td></tr>";
            $totaal = $totaal + $row2['price'];
        }
    }
}
$detail .=  "<tr><td style='text-align: left;'>Totaal: </td><td>" . $totaal . "</td></tr></table>";
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



/*plaatsen bestelling */

/*bestaande gegevens ophalen voor inserts bij thuis adres*/
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];

$sql = "SELECT * FROM `customer` WHERE `firstName` = '$firstName' AND `lastName` = '$lastName'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$customer_id = $row['id'];
$SESSION['customer_id'] = $customer_id;
$street = $row['street'];
$houseNumber = $row['houseNumber'];
$houseNumber_addon = $row['houseNumber_addon'];
$zipCode = $row['zipCode'];
$city = $row['city'];
$country = $row['country'];





if (isset($_POST['submitthuis'])) {
    $ingevuldcoun = mysqli_real_escape_string($conn, $_POST['field_country']);
    $invoerquery = "INSERT INTO `tbl_order`(`customer_id`, `date`, `street`, `houseNumber`,`houseNumber_addon`,`zipCode`, `city`, `country`, `paid`, `delivery`) VALUES('$customer_id', NOW(), '$street', '$houseNumber', '$houseNumber_addon', '$zipCode', '$city', '$ingevuldcoun', 1, 'bezorgen_thuis')";
    echo $invoerquery;
    if ($conn->query($invoerquery) === TRUE) {
        echo "test";
        $id_get = "SELECT * FROM `tbl_order` ORDER BY `id` DESC LIMIT 1";
        $result2 = $conn->query($id_get);
        $row2 = $result2->fetch_assoc();
        $order_id = $row2['id'];
        $_SESSION['order_id'] = $order_id;
        /*alle counts*/ ######/////////
        $max_count = 0;
        $ci_count = 0;
        $vw_count = 0;
        $ba_count = 0;
        $vw_count = 0;
        $man_count = 0;
        $bus_count = 0;
        $tank_count = 0;
        $passat_count = 0;
        $productsCount = 0;
        ////////////////#####/////////////
        $query3 = "SELECT * from `product`";
        $result3 = $conn->query($query3);
        while ($row3 = $result3->fetch_assoc()) {
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($row3['id'] == $_SESSION['cart'][$i]) {
                    /////
                    if ($row3['name'] == "Max Verstappen Auto") {
                        $max = "Ja";
                        $max_count++;
                        echo "max: " . $max_count . "<br><hr>";
                    }
                    /////
                    if ($row3['name'] == "Citroën 2CV") {
                        $ci = "Ja";
                        $ci_count++;
                        echo "citr: " . $ci_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Barbie auto") {
                        $ba = "Ja";
                        $ba_count++;
                        echo "barbie: " . $ba_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Politieauto VW Touran") {
                        $vw = "Ja";
                        $vw_count++;
                        echo "vw: " . $vw_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Vrachtwagen MAN TGX van DHL") {

                        $man = "Ja";
                        $man_count++;
                        echo "man: " . $man_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Arriva Bus") {
                        $bus = "Ja";
                        $bus_count++;
                        echo "bus: " . $bus_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Panzer II Tank") {
                        $tank = "Ja";
                        $tank_count++;
                        echo "tank: " . $tank_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Volkswagen Passat") {
                        $passat = "Ja";
                        $passat_count++;
                        echo "passat: " . $passat_count . "<br><hr>";
                    }

                    //////
                }
            }
        }
        if ($max == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',58,'$max_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($ci == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',59,'$ci_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($ba == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',56,'$ba_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($vw == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',60,'$vw_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($man == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',61,'$man_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($bus == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',57,'$bus_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($tank == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',55,'$tank_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($passat == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',62,'$passat_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // for ($i = 0; $i < $productsCount; $i++) {
        //     if ($man == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($max == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($ci == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($ba == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($vw == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($bus == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($tank == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($passat == "Ja") {
        //         $productsCount++;
        //     }
        // }
        header("Location: factuur.php");
        
    }

}

if (isset($_POST['submitadres'])) {
    $ingevuldstr = mysqli_real_escape_string($conn, $_POST['field_street']);
    $ingevuldhn = mysqli_real_escape_string($conn, $_POST['field_housenumber']);
    $ingevuldadd = mysqli_real_escape_string($conn, $_POST['field_street_addon']);
    $ingevuldzip = mysqli_real_escape_string($conn, $_POST['field_zipcode']);
    $ingevuldcity = mysqli_real_escape_string($conn, $_POST['field_city']);
    $ingevuldcoun = mysqli_real_escape_string($conn, $_POST['field_country']);
    $invoerquery = "INSERT INTO `tbl_order`(`customer_id`, `date`, `street`, `houseNumber`,`houseNumber_addon`,`zipCode`, `city`, `country`, `paid`, `delivery`) VALUES('$customer_id', NOW(), '$ingevuldstr', '$ingevuldhn', '$ingevuldadd', '$ingevuldzip', '$ingevuldcity', '$ingevuldcoun', 1, 'ophalen')";
    if ($conn->query($invoerquery) === TRUE) {
        echo "test";
        $id_get = "SELECT * FROM `tbl_order` ORDER BY `id` DESC LIMIT 1";
        $result2 = $conn->query($id_get);
        $row2 = $result2->fetch_assoc();
        $order_id = $row2['id'];
        $_SESSION['order_id'] = $order_id;
        /*alle counts*/ ######/////////
        $max_count = 0;
        $ci_count = 0;
        $vw_count = 0;
        $ba_count = 0;
        $vw_count = 0;
        $man_count = 0;
        $bus_count = 0;
        $tank_count = 0;
        $passat_count = 0;
        $productsCount = 0;
        ////////////////#####/////////////
        $query3 = "SELECT * from `product`";
        $result3 = $conn->query($query3);
        while ($row3 = $result3->fetch_assoc()) {
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($row3['id'] == $_SESSION['cart'][$i]) {
                    /////
                    if ($row3['name'] == "Max Verstappen Auto") {
                        $max = "Ja";
                        $max_count++;
                        echo "max: " . $max_count . "<br><hr>";
                    }
                    /////
                    if ($row3['name'] == "Citroën 2CV") {
                        $ci = "Ja";
                        $ci_count++;
                        echo "citr: " . $ci_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Barbie auto") {
                        $ba = "Ja";
                        $ba_count++;
                        echo "barbie: " . $ba_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Politieauto VW Touran") {
                        $vw = "Ja";
                        $vw_count++;
                        echo "vw: " . $vw_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Vrachtwagen MAN TGX van DHL") {

                        $man = "Ja";
                        $man_count++;
                        echo "man: " . $man_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Arriva Bus") {
                        $bus = "Ja";
                        $bus_count++;
                        echo "bus: " . $bus_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Panzer II Tank") {
                        $tank = "Ja";
                        $tank_count++;
                        echo "tank: " . $tank_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Volkswagen Passat") {
                        $passat = "Ja";
                        $passat_count++;
                        echo "passat: " . $passat_count . "<br><hr>";
                    }

                    //////
                }
            }
        }
        if ($max == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',58,'$max_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($ci == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',59,'$ci_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($ba == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',56,'$ba_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($vw == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',60,'$vw_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($man == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',61,'$man_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($bus == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',57,'$bus_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($tank == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',55,'$tank_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($passat == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',62,'$passat_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // for ($i = 0; $i < $productsCount; $i++) {
        //     if ($man == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($max == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($ci == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($ba == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($vw == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($bus == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($tank == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($passat == "Ja") {
        //         $productsCount++;
        //     }
        // }
        header("Location: factuur.php");
    }

}

if (isset($_POST['submitadres2'])) {
    $ingevuldstr = mysqli_real_escape_string($conn, $_POST['field_street']);
    $ingevuldhn = mysqli_real_escape_string($conn, $_POST['field_housenumber']);
    $ingevuldadd = mysqli_real_escape_string($conn, $_POST['field_street_addon']);
    $ingevuldzip = mysqli_real_escape_string($conn, $_POST['field_zipcode']);
    $ingevuldcity = mysqli_real_escape_string($conn, $_POST['field_city']);
    $ingevuldcoun = mysqli_real_escape_string($conn, $_POST['field_country']);
    $invoerquery = "INSERT INTO `tbl_order`(`customer_id`, `date`, `street`, `houseNumber`,`houseNumber_addon`,`zipCode`, `city`, `country`, `paid`, `delivery`) VALUES('$customer_id', NOW(), '$ingevuldstr', '$ingevuldhn', '$ingevuldadd', '$ingevuldzip', '$ingevuldcity', '$ingevuldcoun', 1, 'bezorgen_anders')";
    echo $invoerquery;
    if ($conn->query($invoerquery) === TRUE) {
        echo "test";
        $id_get = "SELECT * FROM `tbl_order` ORDER BY `id` DESC LIMIT 1";
        $result2 = $conn->query($id_get);
        $row2 = $result2->fetch_assoc();
        $order_id = $row2['id'];
        $_SESSION['order_id'] = $order_id;
        /*alle counts*/ ######/////////
        $max_count = 0;
        $ci_count = 0;
        $vw_count = 0;
        $ba_count = 0;
        $vw_count = 0;
        $man_count = 0;
        $bus_count = 0;
        $tank_count = 0;
        $passat_count = 0;
        $productsCount = 0;
        ////////////////#####/////////////
        $query3 = "SELECT * from `product`";
        $result3 = $conn->query($query3);
        while ($row3 = $result3->fetch_assoc()) {
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($row3['id'] == $_SESSION['cart'][$i]) {
                    /////
                    if ($row3['name'] == "Max Verstappen Auto") {
                        $max = "Ja";
                        $max_count++;
                        echo "max: " . $max_count . "<br><hr>";
                    }
                    /////
                    if ($row3['name'] == "Citroën 2CV") {
                        $ci = "Ja";
                        $ci_count++;
                        echo "citr: " . $ci_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Barbie auto") {
                        $ba = "Ja";
                        $ba_count++;
                        echo "barbie: " . $ba_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Politieauto VW Touran") {
                        $vw = "Ja";
                        $vw_count++;
                        echo "vw: " . $vw_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Vrachtwagen MAN TGX van DHL") {

                        $man = "Ja";
                        $man_count++;
                        echo "man: " . $man_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Arriva Bus") {
                        $bus = "Ja";
                        $bus_count++;
                        echo "bus: " . $bus_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Panzer II Tank") {
                        $tank = "Ja";
                        $tank_count++;
                        echo "tank: " . $tank_count . "<br><hr>";
                    }

                    //////
                    if ($row3['name'] == "Volkswagen Passat") {
                        $passat = "Ja";
                        $passat_count++;
                        echo "passat: " . $passat_count . "<br><hr>";
                    }

                    //////
                }
            }
        }
        if ($max == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',58,'$max_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($ci == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',59,'$ci_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($ba == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',56,'$ba_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($vw == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',60,'$vw_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($man == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',61,'$man_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($bus == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',57,'$bus_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($tank == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',55,'$tank_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if ($passat == "Ja") {
            $invoerquery_detail = "INSERT INTO `tbl_order_detail`(`order_id`, `product_id`, `amount`) VALUES('$order_id',62,'$passat_count' )";
            echo $invoerquery_detail;
            if ($conn->query($invoerquery_detail) === TRUE) {

            } else {
                // Uitvoeren query mislukt
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // for ($i = 0; $i < $productsCount; $i++) {
        //     if ($man == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($max == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($ci == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($ba == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($vw == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($bus == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($tank == "Ja") {
        //         $productsCount++;
        //     }
        //     if ($passat == "Ja") {
        //         $productsCount++;
        //     }
        // }
        header("Location: factuur.php");
    }


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
    <style>
        form {
            text-align: left;
            background-color: rgba(255, 255, 255, 0.274);
            border: 2px solid white;
            width: 693.8px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            width: 200px;
            display: inline-block;
        }
    </style>
    <div class="header" style="opacity: 0.5;">
        <div class="inlineblock" style="opacity: 0.5;">
            <img class="logo" src="assets/img/logo.png">
        </div>
        <div class="inlineblock" style="opacity: 0.5;">
            <img class="headertext" src="assets/img/headertext.png">
        </div>

    </div>
    <header>
        <div class="nav" style="opacity: 0.5;">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">About</a></li>

                    <li><a href="">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav2" style="opacity: 0.5;">
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
    <div class="cats" style="opacity: 0.5;">
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
            <div id="formchoose" style="display:block;">
                <p>Hoe wilt u het pakket ontvangen?</p>
                <button class='option' onclick="adres()" id="ophalen" value="ophalen">Ophalen</button>
                <button class='option' onclick="thuis()" id="thuis" value="thuis">Thuis</button>
                <button class='option' onclick="adres2()" id="factuur" value="factuur">Factuur</button>


            </div>
            <script>
                function thuis() {
                    document.getElementById('adres').style.display = 'none';
                    document.getElementById('adres2').style.display = 'none';
                    document.getElementById('thuisform').style.display = 'block';
                }

                function adres() {
                    document.getElementById('thuisform').style.display = 'none';
                    document.getElementById('adres2').style.display = 'none';
                    document.getElementById('adres').style.display = 'block';
                }

                function adres2() {
                    document.getElementById('thuisform').style.display = 'none';
                    document.getElementById('adres').style.display = 'none';
                    document.getElementById('adres2').style.display = 'block';
                }
            </script>

            <form id="thuisform" method="post" style="display: none;">
                <label for="country">Land</label>
                <input type="text" name="field_country" id="addon" placeholder="Land" /><br><br>
                <input class="option midden" type="submit" name="submitthuis" value="Bestel!" />
            </form>

            <form id="adres" method="post" style="display: none;">
                <label for="street">Straatnaam</label>
                <input type="text" name="field_street" id="street" placeholder="Straatnaam" required /><br>
                <label for="h_number">Huisnummer</label>
                <input type="int" name="field_housenumber" id="h_number" placeholder="Huisnummer" required /><br>
                <label for="addon">Toevoeging</label>
                <input type="text" name="field_street_addon" id="addon" placeholder="Toevoeging" /><br>
                <label for="toevoeging">Postcode</label>
                <input type="text" name="field_zipcode" id="zipcode" placeholder="Postcode" required /><br>
                <label for="toevoeging">Woonplaats</label>
                <input type="text" name="field_city" id="city" placeholder="Woonplaats" required /><br>
                <label for="country">Land</label>
                <input type="text" name="field_country" id="addon" placeholder="Land" /><br><br>
                <input class="option midden" type="submit" name="submitadres" value="Bestel" />
            </form>
            <form id="adres2" method="post" style="display: none;">
                <label for="street">Straatnaam</label>
                <input type="text" name="field_street" id="street" placeholder="Straatnaam" required /><br>
                <label for="h_number">Huisnummer</label>
                <input type="int" name="field_housenumber" id="h_number" placeholder="Huisnummer" required /><br>
                <label for="addon">Toevoeging</label>
                <input type="text" name="field_street_addon" id="addon" placeholder="Toevoeging" /><br>
                <label for="toevoeging">Postcode</label>
                <input type="text" name="field_zipcode" id="zipcode" placeholder="Postcode" required /><br>
                <label for="toevoeging">Woonplaats</label>
                <input type="text" name="field_city" id="city" placeholder="Woonplaats" required /><br>
                <label for="country">Land</label>
                <input type="text" name="field_country" id="addon" placeholder="Land" /><br><br>
                <input class="option midden" type="submit" name="submitadres2" value="Bestel" />
            </form>
        </div>
    </div>
</body>

</html>