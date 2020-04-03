<?php
require '../config/config.php';

session_start();

if (isset($_POST['logout'])) {
  header("Location: ../src/logout.php"); //login formulier pagina
}
if (isset($_POST['products'])) {
  header("Location: ../products"); //login formulier pagina
}
if (isset($_POST['users'])) {
  header("Location: ../users"); //login formulier pagina
}
if (isset($_POST['customers'])) {
  header("Location:  ../customers"); //login formulier pagina
}
if (isset($_POST['category'])) {
  header("Location:  index.php"); //login formulier pagina
}
if (isset($_POST['submit'])) {
    
    $ingevuldnm = $_POST['field_name'];
    $ingevuldbes = $_POST['field_description'];

    $sql = "SELECT * from `category` WHERE `name` =  '$ingevulnm' OR `description` = '$ingevuldbes'";
    $result = $conn->query($sql);

    if ($result->fetch_assoc()) {
        echo "categorie bestaat al.";
    } else {
        $sql = "INSERT INTO `category`(`name`, `description`,`active`) VALUES ('$ingevuldnm', '$ingevuldbes',1)";
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
          <li><a href="../../index_category.php">Gebruikerswebsite</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav2">
      <nav>

        <ul>
          <?php if (($_SESSION['namea'] != "")) {
            echo "<li class='right'><form method='post'><a href='#'><input class='btn' type='submit' name='customers' value='Gebruikers'></a></form></li>";
          } ?>
        </ul>
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
            width: 200px;
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
<h1 class="titel"> Categorie Toevoegen</h1>
<form method="post">
<label for="field_product_name">Naam Categorie</label>
                <input type="text" name="field_name" placeholder="bijv. Racecar" required /><br>
                <label for="product_description">Beschrijving Categorie</label>
                <input style="width: 400px;" type="text" name="field_description" placeholder="bijv. mooie auto" required /><br>
 <input class ="register" type="submit" name="submit" value="Registreren" />
</form>
</div>
</body>

</html>
