<?php
session_start();
require 'view/config/config.php';



if (isset($_POST['submit'])) {
    $ingevuldun = $_POST['field_username'];
    $ingevuldem = $_POST['field_email'];
    $ingevuldpw = $_POST['field_password']; 
    
    $sql = "SELECT `firstName`, `middleName`, `lastName` FROM `user` WHERE `email` = '$ingevuldem' AND `password` = '$ingevuldpw'";
    // Poging uitvoeren query
    $result = $conn->query($sql); 
    if($result->num_rows > 0) {
    //    $cookie_name = "access";
    //    $cookie_value = "ja";
    //    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
    //    if(isset($_COOKIE['access'])) {
        $row = $result->fetch_assoc();
        //$_SESSION["email"] = $row['firstName'];

        if($row['middleName']== ""){
        $_SESSION["namea"] = $row['firstName']." ".$row['lastName'];
        }
        else{
        $_SESSION["namea"] = $row['firstName']." ".$row['middleName']." ".$row['lastName'];
        }
        $_SESSION['loginadmin'] = "complete";
        header("Location: index.php");
    //  } else {
    //       echo "Cookie is not set!";
    //  }
       
    }
     else {
       // Uitvoeren query mislukt
       $error .= "<br><div class='container_err'>
       <h1>Oops! Something went wrong...</h1>
       <p class='titel_err'>The username or password may be incorrect! <br>Please try again.</p></div>";
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
          <li><a href="">Home</a></li>
          <li><a href="">About</a></li>
          
          <li><a href="">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div id="content">


    <style>
        .container{
        background-color: white;
        border: 2px solid black;
        border-radius: 50px;
        margin-top: 100px;
        box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
        width: 500px;
        height: 200px;
        margin-left: auto;
        margin-right: auto;
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
            text-align: center;
        }
        .knop{
            margin: 0 auto;
        }
        body{
            background-color: lightgray;
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
<h1 class="titel"> Inloggen Beheeromgeving</h1>
<form method="post" action="login.php">
 <label for="login">E-mail adres</label>
 <input type="username" name="field_email" id="email" placeholder="Email" required /><br>
 <label for="passwd">Wachtwoord</label>
 <input type="password" name="field_password" id="passwd" placeholder="Wachtwoord" required /><br>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="register" type="submit" name="submit" value="Login" />
</form>
</div>

<?php echo $error;?>
</body>

</html>
