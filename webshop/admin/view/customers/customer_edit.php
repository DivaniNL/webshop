<?php
require '../config/config.php';
session_start();
if (isset($_POST['logout'])) {
    header("Location: ../src/logout.php"); //login formulier pagina
  }
  if (isset($_POST['add'])) {
    header("Location: ../products/product_toevoegen.php"); //login formulier pagina
  }
  if (isset($_POST['users'])) {
    header("Location: ../users/index.php"); //login formulier pagina
  }
  if (isset($_POST['customers'])) {
    header("Location: index.php"); //login formulier pagina
  }
  if (isset($_POST['category'])) {
    header("Location:  ../categories/index.php"); //login formulier pagina
  }
$id = $_GET['id'];

    $sql = "SELECT * from `customer` WHERE `id` = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    if($_POST['field_newsletter'] == false){
        $_POST['field_newsletter'] = 0;
    }
    if($_POST['field_newsletter'] == true){
        $_POST['field_newsletter'] = 1;
    }

    if($_POST['field_street_addon'] == ""){
        $_POST['field_street_addon'] = "NONE";
    }
    $ingevuldgen = mysqli_real_escape_string($conn, $_POST['field_gender']);
    $ingevuldfn = mysqli_real_escape_string($conn, $_POST['field_firstname']);
    $ingevuldinfixn = mysqli_real_escape_string($conn, $_POST['field_infixname']);
    $ingevuldln = mysqli_real_escape_string($conn, $_POST['field_lastname']);
    $ingevuldstr = mysqli_real_escape_string($conn, $_POST['field_street']);
    $ingevuldhn = mysqli_real_escape_string($conn, $_POST['field_housenumber']);
    $ingevuldadd = mysqli_real_escape_string($conn, $_POST['field_street_addon']);
    $ingevuldpc = mysqli_real_escape_string($conn, $_POST['field_zipcode']);
    $ingevuldwp = mysqli_real_escape_string($conn, $_POST['field_city']);
    $ingevuldtel = mysqli_real_escape_string($conn, $_POST['field_phone']);
    $ingevuldem = mysqli_real_escape_string($conn, $_POST['field_email']);
    $ingevuldpw = mysqli_real_escape_string($conn, $_POST['field_password']);
    $ingevuldnl = mysqli_real_escape_string($conn, $_POST['field_newsletter']);

    $id = $_GET['id'];

    $sql = "SELECT * from `customer` WHERE `id` = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->fetch_assoc()) {
        echo "gebruiker bestaat al.";
    } else {
        $sqlupd = "UPDATE `customer` SET 
    `gender` = '$ingevuldgen',
    `firstName` = '$ingevuldfn',
    `middleName` = '$ingevuldinfixn',
    `lastName` = '$ingevuldln',
    `street` = '$ingevuldstr',
    `houseNumber` = '$ingevuldhn',
    `houseNumber_addon` = '$ingevuldadd',    
    `zipCode` = '$ingevuldpc',
    `phone` = '$ingevuldtel',
    `e-mailadres` = '$ingevuldem',
    `password` = '$ingevuldpw',
    `newsletter_subscription` = '$ingevuldnl' WHERE `id` = $id";
    //(`name`, `description`, `category_id`, `price`, `color`, `weight`, `active`) VALUES ('$ingevuldproduct_name', '$ingevulddescr', '$ingevuldcat', '$ingevuldpr', '$ingevuldcl', '$ingevuldgw', 1)";
    // Poging uitvoeren query
    if ($conn->query($sqlupd) === TRUE) {
        // Uitvoeren query gelukt
        echo "Data succesvol bijgewerkt in tabel 'user'.";
        header("Location: index.php");
    } else {
        // Uitvoeren query mislukt
        echo "Error: " . $sqlupd . "<br>" . $conn->error;
    }
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
        <div class = "inlineblock">
            <img class="logo" src="../../assets/img/logo.png">
        </div>
        <div  class = "inlineblock">
            <img class="headertext" src="../../assets/img/headertext.png">
        </div>
        
    </div>
    <header>
    <div class="nav">
      <nav>
        <ul>
          
          <li><a href="../../index.php">Admin-Home</a></li>
          <li><a href="../../index_user.php">Gebruikerswebsite</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav2">
      <nav>
      <ul>
          <?php if (($_SESSION['namea'] != "")) {
            echo "<li class='right'><form method='post'><a href='#'><input class='btn' type='submit' name='category' value='Category'></a></form></li>";
          } ?>
        </ul>
      <ul>
          <?php if (($_SESSION['namea'] != "")) {
            echo "<li class='right'><form method='post'><a href='#'><input class='btn' type='submit' name='users' value='Admins'></a></form></li>";
          } ?>
        </ul>
        <ul>
          <?php if (($_SESSION['namea'] != "")) {
            echo "<li class='right'><form method='post'><a href='#'><input class='btn' type='submit' name='customers' value='Gebruikers'></a></form></li>";
          } ?>
        </ul>
        <ul>
          <?php if (($_SESSION['namea'] != "")) {
            echo "<li class='right'><a href='#'><img class='icon' src='../../assets/img/user.png'> Hallo " . $_SESSION['namea'] . " [Admin]</a></li>";
          } ?>
        </ul>
        <ul>
          <?php if (($_SESSION['namea'] != "")) {
            echo "<li class='right'><form method='post'><a href='#'><input class='btn' type='submit' name='logout' value='Log Uit'></a></form></li>";
          } ?>
        </ul>
        
      </nav>
  </header>
  <div id="content">


    <style>
        .container{
        background-color: white;
        width:  700px;
        border: 2px solid black;
        margin-left: auto;
        margin-right: auto;
        border-radius: 50px;
            margin-top:100px;
            padding-left:75px;
        box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
        }
        
        label {
            width: 100px;
            display: inline-block;
        }
        h1{
            text-align: center;
            margin-top: 25px;
        }
        form{
            text-align: left;
        }
        body{
            background-color: lightgray;
        }
        input{
        font-size: 10px;
        }
        .register{
        width: 100px;
        height: 10px;
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-bottom: 10px;
        }
    </style>
    <div class="container">
<h1 class="titel">Gegevens Wijzigen</h1>
<form method="post">
<label for="gender">Geslacht</label>
<select id="gender" name="field_gender">
        <?php if ($row['gender'] == 'M') {
                        echo "<option selected value='M'>";
                    } else {
                        echo "<option value='M'> ";
                    } ?> M</option>
        <?php if ($row['gender'] == 'F') {
                        echo "<option selected value='F'>";
                    } else {
                        echo "<option value='F'> ";
                    } ?> F</option>
        <?php if ($row['gender'] == 'O') {
                        echo "<option selected value='O'>";
                    } else {
                        echo "<option value='O'> ";
                    } ?> O</option>
                </select><br>
 <label for="fname">Naam</label>
 <input type="text" value="<?php echo $row['firstName']?>" name="field_firstname" id="fname" placeholder="Voornaam" required />
 <input type="text" value="<?php echo $row['middleName']?>" name="field_infixname" placeholder="Tussenvoegsel" />
 <input type="text" value="<?php echo $row['lastName']?>" name="field_lastname" placeholder="Achternaam" required /><br>
 <label for="street">Straatnaam</label>
 <input type="text" value="<?php echo $row['street']?>" name="field_street" id="street" placeholder="Straatnaam" required /><br>
 <label for="h_number">Huisnummer</label>
 <input type="int" value="<?php echo $row['houseNumber']?>" name="field_housenumber" id="h_number" placeholder="Huisnummer" required /><br>
 <label for="addon">Toevoeging</label>
 <input type="text" value="<?php echo $row['houseNumber_addon']?>" name="field_street_addon" id="addon" placeholder="Toevoeging" /><br>
 <label for="toevoeging">Postcode</label>
 <input type="text" value="<?php echo $row['zipCode']?>" name="field_zipcode" id="zipcode" placeholder="Postcode"  required/><br>
 <label for="toevoeging">Woonplaats</label>
 <input type="text" value="<?php echo $row['city']?>" name="field_city" id="city" placeholder="Woonplaats"  required/><br>
 <label for="phone">Telefoonnummer</label>
 <input type="int" value="<?php echo $row['phone']?>" name="field_phone" id="h_number" placeholder="Telefoonnummer" required /><br>
 <label for="email">E-mailadres</label>
 <input type="email" value="<?php echo $row['e-mailadres']?>" name="field_email" id="email" placeholder="E-mailadres" required /><br>
 <label for="passwd">Wachtwoord</label>
 <input type="password" value="" name="field_password" id="passwd" placeholder="Wachtwoord" required /><br>
 <label for="newsletter">Ik wil emails</label>
 <input type="checkbox" name="field_newsletter" /><br>
 <input class ="register" type="submit" name="submit" value="Registreren" />
</form>
</div>
</body>

</html>
