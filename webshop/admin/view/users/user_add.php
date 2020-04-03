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
    header("Location: index.php"); //login formulier pagina
  }
  if (isset($_POST['customers'])) {
    header("Location: ../customers"); //login formulier pagina
  }
  if (isset($_POST['category'])) {
    header("Location: ../categories/index.php"); //login formulier pagina
  }
  
if (isset($_POST['submit'])) {
    
    $ingevuldfn = mysqli_real_escape_string($conn, $_POST['field_firstname']);
    $ingevuldinfixn = mysqli_real_escape_string($conn, $_POST['field_infixname']);
    $ingevuldln = mysqli_real_escape_string($conn, $_POST['field_lastname']);
    $ingevuldgd = mysqli_real_escape_string($conn, $_POST['field_date']);
    $ingevuldem = mysqli_real_escape_string($conn, $_POST['field_email']);
    $ingevuldpw = mysqli_real_escape_string($conn, $_POST['field_password']);

    $sql = "SELECT * from `user` WHERE `firstName` =  '$ingevulfn' OR `email` = '$ingevuldem'";
    $result = $conn->query($sql);

    if ($result->fetch_assoc()) {
        echo "gebruiker bestaat al.";
    } else {
        $sql = "INSERT INTO `user`(`firstName`, `middleName`, `lastName`, `birthDate`,`email`, `password`) VALUES ('$ingevuldfn', '$ingevuldinfixn', '$ingevuldln', '$ingevuldgd','$ingevuldem', '$ingevuldpw')";
        // Poging uitvoeren query
        if ($conn->query($sql) === TRUE) {
            // Uitvoeren query gelukt
            header("Location: index.php");
        } else {
            // Uitvoeren query mislukt
            echo "Error: " . $sql . "<br>" . $conn->error;
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
<h1 class="titel"> Beheerder Toevoegen</h1>
<form method="post">
 <label for="fname">Naam</label>
 <input type="text" name="field_firstname" id="fname" placeholder="Voornaam" required />
 <input type="text" name="field_infixname" placeholder="Tussenvoegsel" />
 <input type="text" name="field_lastname" placeholder="Achternaam" required /><br>
 <label for="date">Naam</label>
 <input type="date" name="field_date" required /><br>
 <label for="email">E-mailadres</label>
 <input type="email" name="field_email" id="email" placeholder="E-mailadres" required /><br>
 <label for="passwd">Wachtwoord</label>
 <input type="password" name="field_password" id="passwd" placeholder="Wachtwoord" required /><br>
 <input class ="register" type="submit" name="submit" value="Registreren" />
</form>
</div>
</body>

</html>
