<?php
session_start();
require '../config/config.php';


include 'customer_overview.php';
//alleen codeerdiepzeeduikers zien dit
if (isset($_POST['logout'])) {
  header("Location: ../src/logout.php"); //login formulier pagina
}
if (isset($_POST['add'])) {
  header("Location: customer_add.php"); //login formulier pagina
}
if (isset($_POST['users'])) {
  header("Location: ../users/index.php"); //login formulier pagina
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
          
          <li><a href="../../index.php">Admin-Home</a></li>
          <li><a href="../../index_user.php">Gebruikerswebsite</a></li>
        </ul>
      </nav>
    </div>
    <div class="nav2">
      <nav>
      <ul>
          <?php if (($_SESSION['namea'] != "")) {
            echo "<li class='right'><form method='post'><a href='#'><input class='btn' type='submit' name='add' value='Gebruiker Toevoegen'></a></form></li>";
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
      <div class="container">
          <h2> Gebruikers wijzigen of verwijderen.</h2>

          <?php echo $customers;?>
      </div>


  </div>
</body>

</html>