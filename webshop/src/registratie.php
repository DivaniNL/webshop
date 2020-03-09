<?php
require '../config/config.php';



if (isset($_POST['submit'])) {

    $ingevuldun = mysqli_real_escape_string($conn, $_POST['field_username']);
    $ingevuldeem = mysqli_real_escape_string($conn, $_POST['field_email']);
    $ingevuldpw = mysqli_real_escape_string($conn, $_POST['field_password']);

    echo "submit";
    $sql = "SELECT * from `admin` WHERE `username` =  '$ingevuldun' OR `email` = '$ingevuldem'";
    echo $sql;
    $result = $conn->query($sql);

    if ($result->fetch_assoc()) {
        echo "gebruiker bestaat al.";
    } else {
        $sql = "INSERT INTO `admin`(`username`, `email`, `password`) VALUES ('$ingevuldun', '$ingevuldem', '$ingevuldpw')";
        // Poging uitvoeren query
        echo ($sql);
        if ($conn->query($sql) === TRUE) {
            // Uitvoeren query gelukt
            echo "Nieuwe data succesvol toegevoegd aan tabel 'admin'.";
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
        <h1 class="titel"> Registreren</h1>
    <form method="post">
        <label for="fname">Username</label><br>
        <input type="text" name="field_username" id="fname" placeholder="Voornaam" required /><br>
        <label for="email">E-mailadres</label><br>
        <input type="email" name="field_email" id="email" placeholder="E-mailadres" required /><br>
        <label for="passwd">Password</label><Br>
        <input type="password" name="field_password" id="passwd" placeholder="Wachtwoord" required /><br><br>
        <input class="knop" type="submit" name="submit" value="Registreren" />
    </form>
</body>

</html>