<!-- eerst insert tabLE `prooducts`
<form>
select * from category



</form> -->



<?php
require '../config/config.php';
include '../src/checkloginadmin_products.php';
session_start();
error_reporting(E_ALL);
if (isset($_POST['logout'])) {
    header("Location: ../src/logout.php"); //login formulier pagina
  }
if (isset($_POST['submit'])) {

    $ingevuldproduct_name = mysqli_real_escape_string($conn, $_POST['field_product_name']);
    $ingevuldcat = mysqli_real_escape_string($conn, $_POST['field_cat']);
    $ingevulddescr = mysqli_real_escape_string($conn, $_POST['field_product_descr']);
    $price = mysqli_real_escape_string($conn, $_POST['field_product_price']);
    $ingevuldpr  = str_replace(',', '.', $price);
    $ingevuldcl = mysqli_real_escape_string($conn, $_POST['field_product_color']);
    $ingevuldgw = mysqli_real_escape_string($conn, $_POST['field_product_weight']);

    

    // echo "submit";
    // $sql = "SELECT * from `products` WHERE `firstName` =  '$ingevulfn' OR `email` = '$ingevuldem'";
    // echo $sql;
    // $result = $conn->query($sql);

    // if ($result->fetch_assoc()) {
    //     echo "gebruiker bestaat al.";
    // } else {
    $sql = "INSERT INTO `product`(`name`, `description`, `category_id`, `price`, `color`, `weight`, `active`) VALUES ('$ingevuldproduct_name', '$ingevulddescr', '$ingevuldcat', '$ingevuldpr', '$ingevuldcl', '$ingevuldgw', 1)";
    // Poging uitvoeren query
    if ($conn->query($sql) === TRUE) {
        // Uitvoeren query gelukt
    } else {
        // Uitvoeren query mislukt
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $imageget = "SELECT * FROM `product` ORDER BY `id` DESC LIMIT 1";
    $result = $conn->query($imageget);
    $row = $result->fetch_assoc();
    $productid = $row['id'];
    $imgname = $_FILES['foto']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
  
    var_dump($imgname);
       // Insert record
       $query = "INSERT INTO `product_image`(`product_id`,`image`, `active`) VALUES('$productid', '$imgname', 1)";
    
       // Upload file
       move_uploaded_file($_FILES['foto']['tmp_name'],$target_dir.$imgname);
       if ($conn->query($query) === TRUE) {
        // Uitvoeren query gelukt
        //header("Location: ../../index.php");
    } else {
        // Uitvoeren query mislukt
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <div class="inlineblock">
            <img class="logo" src="../../assets/img/logo.png">
        </div>
        <div class="inlineblock">
            <img class="headertext" src="../../assets/img/headertext.png">
        </div>

    </div>
    <header>
        <div class="nav">
            <nav>
                <ul>
                    <li><a href="../../">Home</a></li>
                    <li><a href="../../">About</a></li>
                    <li><a href="../../">Pricing</a></li>
                    <li><a href="../../">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="nav2">
            <nav>
                <ul>
                    <?php if (($_SESSION['name'] != "")) {
                        echo "<li class='right'><a href='#'><img class='icon' src='../../assets/img/user.png'> Hallo " . $_SESSION['namea'] . " [Admin] </a></li>";
                    } ?>
                </ul>
                <ul>
                    <?php if (($_SESSION['name'] != "")) {
                        echo "<li class='right'><a href='sign'><form method='post'><a href='#'><input class='btn' type='submit' name='logout' value='Log Uit'></a></form></li>";
                    } ?>
                </ul>
            </nav>
    </header>
    <div id="content">


        <style>
            .container {
                background-color: white;
                width: 700px;
                border: 2px solid black;
                margin-left: auto;
                margin-right: auto;
                border-radius: 50px;
                margin-top: 100px;
                padding-left: 75px;
                box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
            }

            label {
                width: 200px;
                display: inline-block;
            }

            h1 {
                text-align: center;
                margin-top: 25px;
            }

            form {
                text-align: left;
            }

            body {
                background-color: lightgray;
            }

            input {
                font-size: 10px;
            }

            .register {
                width: 100px;
                height: 10px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 10px;
                display: block;
                margin-bottom: 10px;
            }
        </style>
        <div class="container">
            <h1 class="titel"> Product toevoegen</h1>
            <form method="post" enctype="multipart/form-data">
                <label for="field_product_name">Naam Product</label>
                <input type="text" name="field_product_name" placeholder="bijv. Racecar" required /><br>
                <label for="product_description">Beschrijving Product</label>
                <input style="width: 400px;" type="text" name="field_product_descr" placeholder="bijv. mooie auto" required /><br>
                <label for="price">Prijs Product</label>
                <input type="int" name="field_product_price" placeholder="bijv. 9,99" required /><br>
                <label for="cat">Categorie</label>
                <select id="category" name="field_cat">
                    <?php
                    $sqlcat = "SELECT * from `category`";
                    echo $sqlcat;
                    $result = $conn->query($sqlcat);
                    while ($row = $result->fetch_assoc()) {
                        echo "  <option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }

                    ?>
                </select> <br>
                <label for="cat">Kleur Product</label>
                <select id="cars" name="field_product_color">
                    <option value="multi-color">Multi-color</option>
                    <option value="white">White</option>
                    <option value="black">Black</option>
                    <option value="grey">Grey</option>
                    <option value="metallic">Metallic</option>
                    <option value="yellow">Yellow</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="blue">Blue</option>
                    <option value="pink">Pink</option>
                    <option value="orange">Orange</option>
                    <option value="purple">Purple</option>
                    <option value="other">Other</option>

                </select> <br>
                <label for="weight">Gewicht Product (gram)</label>
                <input type="int" name="field_product_weight" placeholder="bijv. 500" required /><br>
                <input type="file" name="foto" class="form-control"><br>
                <input class="register" type="submit" name="submit" value="Hoppa!" />
            </form>
        </div>
</body>

</html>