<?php
session_start();
include "connect.php";
if(!isset($_SESSION["mail"])){
    header("location:connexion.php");
}
$mail = $_SESSION["mail"];
$prenom = $_SESSION["prenom"];

if(isset($_POST["bouton"])){    
    $destinataire = $_POST["destinataire"];
    $message = $_POST["message"];
    $req = "insert into messages
            values (null, '$message', now(), '$destinataire', '$prenom')";
    mysqli_query($id, $req);
    echo mysqli_error($id);
    header("location:chat.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = "pp">
<h1 class = "leboncoin">leboncoin</h1>
    <h1 class="x">Messages </h1>
            <ul>
                <?php
                $req = "select * from messages
                        where destinataire = '$prenom'
                        order by date desc";
                $res = mysqli_query($id, $req);
                while($ligne = mysqli_fetch_assoc($res)){
                    $pseudo = $ligne["pseudo"];
                    $message = $ligne["message"];
                    $date = $ligne["date"];
                    echo "<li class='message'>$date - $pseudo: $message</li>";
                }
                ?>
            </ul>
        
        <div class="formulaire">
            <form action="" method="post">
                <input type="text" name="message" placeholder="Message :" required>
                <select name="destinataire">
                    
                    <?php
                    $req = "select * from user order by prenom";
                    $res = mysqli_query($id, $req);
                    while($ligne = mysqli_fetch_assoc($res)){
                        $dest = $ligne["prenom"];
                        echo "<option value='$dest'> $dest </option>";
                    }
                    ?>
                </select><br>
                <input type="submit" value="Envoyer" name="bouton">
            </form>
        </div>
                </div>
</body>
<a href="Menu2.php" class="Btn_add">EXIT</a>
</html>
