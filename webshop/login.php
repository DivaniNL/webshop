<?php
require 'config/config.php';


echo "hoi";
if (isset($_POST['submit'])) {
    echo "test";
    $ingevuldun = $_POST['field_username'];
    $ingevuldem = $_POST['field_email'];
    $ingevuldpw = $_POST['field_password']; 
    
    $sql = "SELECT * from `admin` WHERE `username` =  '$ingevuldun' AND `password` = '$ingevuldpw'";
    echo $sql;
    $result = $conn->query($sql);
    
    if ($result->fetch_assoc()) {
        echo "Ingelogd";
    }
    if ($conn->query($sql) === TRUE) {
        // Uitvoeren query gelukt
        echo "ingelogd";
    } else {
        // Uitvoeren query mislukt
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>CMS registratie</title>
</head>

<body>
    <style>
        .container{
        background-color: rgb(162, 196, 183);
        border: 2px solid black;
        border-radius: 50px;

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
            text-align: center;
        }
        .knop{
            margin: 0 auto;
        }
        body{
            background-color: lightgray;
        }
    </style>
    <div class="container">
<h1 class="titel"> Inloggen</h1>
<form method="post" action="login.php">
 <label for="login">Username</label>
 <input type="username" name="field_username" id="username" placeholder="Username" required /><br>
 <label for="passwd">Wachtwoord</label>
 <input type="password" name="field_password" id="passwd" placeholder="Wachtwoord" required /><br>
 <input type="submit" name="submit" value="Login" />
</form>
</div>
</body>

</html>
