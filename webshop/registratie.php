<?php
require 'config/config.php';



if (isset($_POST['submit'])) {
    
    $ingevuldfn = mysqli_real_escape_string($conn, $_POST['field_firstname']);
    $ingevuldinfixn = mysqli_real_escape_string($conn, $_POST['field_infixname']);
    $ingevuldln = mysqli_real_escape_string($conn, $_POST['field_lastname']);
    $ingevuldem = mysqli_real_escape_string($conn, $_POST['field_email']);
    $ingevuldpw = mysqli_real_escape_string($conn, $_POST['field_password']);

    echo "submit";
    $sql = "SELECT * from `user` WHERE `firstName` =  '$ingevulfn' OR `email` = '$ingevuldem'";
    echo $sql;
    $result = $conn->query($sql);

    if ($result->fetch_assoc()) {
        echo "gebruiker bestaat al.";
    } else {
        $sql = "INSERT INTO `user`(`firstName`, `middleName`, `lastName`, `email`, `password`) VALUES ('$ingevuldfn', '$ingevuldinfixn', '$ingevuldln', '$ingevuldem', '$ingevuldpw')";
        // Poging uitvoeren query
        echo ($sql);
        if ($conn->query($sql) === TRUE) {
            // Uitvoeren query gelukt
            echo "Nieuwe data succesvol toegevoegd aan tabel 'user'.";
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class = "inlineblock">
            <img class="logo" src="assets/img/logo.png">
        </div>
        <div  class = "inlineblock">
            <img class="headertext" src="assets/img/headertext.png">
        </div>
        
    </div>
    <header>
    <div class="nav">
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Pricing</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav2">
      <nav>
        <ul>
        <?php if(($_SESSION['name'] !="")){ echo "<li class='right'><a href='#'><img class='icon' src='assets/img/user.png'> Hallo ". $_SESSION['name']."</a></li>";}?>
        </ul>
        <ul>
        <?php if(($_SESSION['name'] !="")){ echo "<li class='right'><a href='sign'><form method='post'><input type='submit' name='logout' value='Log Uit'></form></a></li>";}?>
        </ul>
      </nav>
  </header>
  <div id="content">


    <style>
        .container{
        background-color: rgb(162, 196, 183);
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
<h1 class="titel"> Registreren</h1>
<form method="post">
 <label for="fname">Naam</label>
 <input type="text" name="field_firstname" id="fname" placeholder="Voornaam" required />
 <input type="text" name="field_infixname" placeholder="Tussenvoegsel" />
 <input type="text" name="field_lastname" placeholder="Achternaam" required /><br>
 <label for="email">E-mailadres</label>
 <input type="email" name="field_email" id="email" placeholder="E-mailadres" required /><br>
 <label for="passwd">Wachtwoord</label>
 <input type="password" name="field_password" id="passwd" placeholder="Wachtwoord" required /><br>
 <input class ="register" type="submit" name="submit" value="Registreren" />
</form>
</div>
</body>

</html>
