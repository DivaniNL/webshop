<!-- eerst insert tabLE `prooducts`
<form>
select * from category



</form> -->



<?php
require '../config/config.php';
include '../src/checkloginadmin_products.php';
session_start();
if (isset($_POST['logout'])) {
    header("Location: ../src/logout.php"); //login formulier pagina
  }
$id = $_GET['id'];
$sql = "SELECT * from `product` WHERE `id` = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$gewicht = $row['weight'];
?>
<?php
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

    $imageget = "SELECT * from `product` WHERE `id` = $id";
    $result = $conn->query($imageget);
    $row = $result->fetch_assoc();
    $productid = $row['id'];
    $imgname = $_FILES['foto']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
  
       // Insert record
       $sqlupd2 = "UPDATE `product_image` SET 
    `product_id` = '$productid',
    `image` = '$imgname',
    `active` = 1 WHERE `id` = $id";
    
       // Upload file
       move_uploaded_file($_FILES['foto']['tmp_name'],$target_dir.$imgname);
       if ($conn->query($sqlupd2) === TRUE) {
        // Uitvoeren query gelukt
        //header("Location: ../../index.php");
    } else {
        // Uitvoeren query mislukt
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    $sqlupd = "UPDATE `product` SET 
    `name` = '$ingevuldproduct_name',
    `description` = '$ingevulddescr',
    `category_id` = '$ingevuldcat',
    `price` = '$ingevuldpr',
    `color` = '$ingevuldcl',
    `weight` = $ingevuldgw WHERE `id` = $id";
    //(`name`, `description`, `category_id`, `price`, `color`, `weight`, `active`) VALUES ('$ingevuldproduct_name', '$ingevulddescr', '$ingevuldcat', '$ingevuldpr', '$ingevuldcl', '$ingevuldgw', 1)";
    // Poging uitvoeren query
    if ($conn->query($sqlupd) === TRUE) {
        // Uitvoeren query gelukt
        header("Location: ../../index.php");
    } else {
        // Uitvoeren query mislukt
        echo "Error: " . $sqlupd . "<br>" . $conn->error;
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
                        echo "<li class='right'><a href='#'><img class='icon' src='../../assets/img/user.png'> Hallo " . $_SESSION['name'] . " [Admin]</a></li>";
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
            <h1 class="titel"> Product wijzigen</h1>
            <form method="post" enctype="multipart/form-data">
                <label for="field_product_name">Naam Product</label>
                <input type="text" name="field_product_name" value="<?php echo $row['name'] ?>" required /><br>
                <label for="product_description">Beschrijving Product</label>
                <input style="width: 400px;" type="text" name="field_product_descr" value="<?php echo $row['description'] ?>" required /><br>
                <label for="price">Prijs Product</label>
                <input type="int" name="field_product_price" value="<?php echo $row['price'] ?>" required /><br>
                <label for="cat">Categorie</label>
                <select id="category" name="field_cat">
                    <?php

                    $id = $_GET['id'];
                    $sql = "SELECT * from `product` WHERE `id` = $id";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    $sqlcat = "SELECT * from `category`";
                    $result2 = $conn->query($sqlcat);
                    while ($row2 = $result2->fetch_assoc()) {
                       if($row['category_id'] == $row2['id']){
                        echo "  <option selected value='" . $row2['id'] . "'>" . $row2['name'] . "</option>";
                       }else echo "  <option value='" . $row2['id'] . "'>" . $row2['name'] . "</option>";

                    }

                    ?>
                </select> <br>
                <label for="cat">Kleur Product</label>
                <select id="cars" name="field_product_color">
                    <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * from `product` WHERE `id` = $id";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $gewicht = $row['weight']; ?>
                    <?php if ($row['color'] == 'multi-color') {
                        echo "<option selected value='multi-color'>";
                    } else {
                        echo "<option value='multi-color'> ";
                    } ?> Multi-color</option>
                    <?php if ($row['color'] == 'white') {
                        echo "<option selected value='white'>";
                    } else {
                        echo "<option value='white'> ";
                    } ?> White</option>
                    <?php if ($row['color'] == 'black') {
                        echo "<option selected value='black'>";
                    } else {
                        echo "<option value='black'> ";
                    } ?> Black</option>
                    <?php if ($row['color'] == 'grey') {
                        echo "<option selected value='grey'>";
                    } else {
                        echo "<option value='grey'> ";
                    } ?> Grey</option>
                    <?php if ($row['color'] == 'metallic') {
                        echo "<option selected value='metallic'>";
                    } else {
                        echo "<option value='metallic'> ";
                    } ?> Metallic</option>
                    <?php if ($row['color'] == 'yellow') {
                        echo "<option selected value='yellow'>";
                    } else {
                        echo "<option value='yellow'> ";
                    } ?> Yellow</option>
                    <?php if ($row['color'] == 'red') {
                        echo "<option selected value='red'>";
                    } else {
                        echo "<option value='red'> ";
                    } ?> Red</option>
                    <?php if ($row['color'] == 'green') {
                        echo "<option selected value='green'>";
                    } else {
                        echo "<option value='green'> ";
                    } ?> Green</option>
                    <?php if ($row['color'] == 'blue') {
                        echo "<option selected value='blue'>";
                    } else {
                        echo "<option value='blue'> ";
                    } ?> Blue</option>
                    <?php if ($row['color'] == 'pink') {
                        echo "<option selected value='pink'>";
                    } else {
                        echo "<option value='pink'> ";
                    } ?> Pink</option>
                    <?php if ($row['color'] == 'orange') {
                        echo "<option selected value='orange'>";
                    } else {
                        echo "<option value='orange'> ";
                    } ?> Orange</option>
                    <?php if ($row['color'] == 'purple') {
                        echo "<option selected value='purple'>";
                    } else {
                        echo "<option value='purple'> ";
                    } ?> Purple</option>
                    <?php if ($row['color'] == 'other') {
                        echo "<option selected value='other'>";
                    } else {
                        echo "<option value='other'> ";
                    } ?> Other</option>

                </select> <br>
                <label for="weight">Gewicht Product (gram)</label>
                <input type="int" name="field_product_weight" value="<?php echo $gewicht ?>" required /><br>
                <input type="file" name="foto" class="form-control"><br>
                <input class="register" type="submit" name="submit" value="Hoppa!" />
            </form>
        </div>
</body>

</html>