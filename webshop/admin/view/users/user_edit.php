<?php
require '../config/config.php';

session_start();
$id = $_GET['id'];

    $sql = "SELECT * from `user` WHERE `id` = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    
    $ingevuldfn = mysqli_real_escape_string($conn, $_POST['field_firstname']);
    $ingevuldinfixn = mysqli_real_escape_string($conn, $_POST['field_infixname']);
    $ingevuldln = mysqli_real_escape_string($conn, $_POST['field_lastname']);
    $ingevuldgd = mysqli_real_escape_string($conn, $_POST['field_date']);
    $ingevuldem = mysqli_real_escape_string($conn, $_POST['field_email']);
    $ingevuldpw = mysqli_real_escape_string($conn, $_POST['field_password']);

    $id = $_GET['id'];

    $sql = "SELECT * from `user` WHERE `id` = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->fetch_assoc()) {
        echo "gebruiker bestaat al.";
    } else {
        $sqlupd = "UPDATE `user` SET 
    `firstName` = '$ingevuldfn',
    `middleName` = '$ingevuldinfixn',
    `lastName` = '$ingevuldln',
    `birthDate` = '$ingevuldgd',
    `email` = '$ingevuldem',
    `password` = '$ingevuldpw' WHERE `id` = $id";
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
            echo "<li class='right'><form method='post'><a href='#'><input class='btn' type='submit' name='add' value='Admin toevoegen'></a></form></li>";
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
<h1 class="titel"> Beheerdergegevens Wijzigen</h1>
<form method="post">
 <label for="fname">Naam</label>
 <input value="<?php echo $row['firstName']?>" type="text" name="field_firstname" id="fname" placeholder="Voornaam" required />
 <input value="<?php echo $row['middleName']?>" type="text" name="field_infixname" placeholder="Tussenvoegsel" />
 <input value="<?php echo $row['lastName']?>" type="text" name="field_lastname" placeholder="Achternaam" required /><br>
 <label for="date">Geboortedatum</label>
 <input value="<?php echo $row['birthDate']?>" type="date" name="field_date" required /><br>
 <label for="email">E-mailadres</label>
 <input value="<?php echo $row['email']?>" type="email" name="field_email" id="email" placeholder="E-mailadres" required /><br>
 <label for="passwd">Wachtwoord</label>
 <input value="" type="password" name="field_password" id="passwd" placeholder="Wachtwoord" required /><br>
 <input class ="register" type="submit" name="submit" value="Registreren" />
</form>
</div>
</body>

</html>
