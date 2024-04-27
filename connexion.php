<?php
      session_start();
      include "connect.php";
            if(isset($_POST["bouton"])){
        $mail= $_POST["mail"];
        $mdp = $_POST["mdp"];
        $hashed_mdp = md5($mdp);
      
        $requete = "SELECT * FROM user WHERE mail = '$mail' 
        AND mdp = '$hashed_mdp'";
        $res = mysqli_query($id, $requete);
        if(mysqli_num_rows($res) > 0){   
            $_SESSION["mail"] = $mail;
            $ligne = mysqli_fetch_assoc($res);
            $_SESSION["nom"] = $ligne["nom"];
            $_SESSION["prenom"] = $ligne["prenom"];
            $_SESSION["idu"]= $ligne["idu"];

            $mess= "Connexion OK, vous allez être redirigé...";
            header("refresh:3; url=Menu2.php");
        }
        else{
            $mess= "Erreur de mail ou de mot de passe !!";
        }
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
<header class = "menu">
    <h2 class = "leboncoin">leboncoin</h2>
    <nav class="navigation">
    <a href="Menu.php" class="annonce"> Continuer sans indentification</a>
    </nav>
    </header>
    <div class = "background">
<body>
   
    <form class = "form_connect" action="" method="post">
        <h1>Connexion</h1>
        <div class="mess">
        <?php
           if(isset($mess)){
                echo $mess;
           }
        ?>
        </div>
        <p><input type="text" name="mail" placeholder="E-mail*"required></p>
        <p><input type="password" name="mdp" placeholder="Mot de passe*" minlength = "10" required></p>
        <p><input type="submit" value="Se connecter" name = "bouton" class = "deconnexion"></p>
        <p>Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous ici</a></p>
    </form>
    

</body></div>
    </html>
    
