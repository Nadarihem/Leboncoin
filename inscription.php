<?php
    include "connect.php";
    if(isset($_POST["bouton"])){
        $mail = $_POST["mail"];
    $req = "select * from user where mail = '$mail'";
    $res = mysqli_query ($id,$req);
    if (mysqli_num_rows($res)>0){
        $mess= "Vous avez déja un compte avec ce mail !!";
    }else {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mdp = $_POST["mdp"];
        $hashed_mdp = md5($mdp);
       
       $requete = "insert into user (idu,nom,prenom,mail,mdp)
                    values (null,'$nom','$prenom','$mail','$hashed_mdp')";
        mysqli_query($id, $requete);
        $mess= "Inscription réussie";
        header("refresh:3; url=connexion.php "); 
    }
    }
     
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
    <form class="form_ins" action="" method="post" >
        <h1 class = "h_ins">Créer un compte </h1>
        <div class="mess">
        <?php if(isset($mess)){
            echo $mess;

        }
        ?>
        </div>
        <p><input type="text" name="nom" placeholder="Entrez votre nom*" required></p>
        <p><input type="text" name="prenom" placeholder="Entrez votre prénom*" required></p>
        <p><input type="email" name="mail" placeholder="Entrez votre mail*" required></p>
        <p><input type="password" name="mdp" placeholder="Mot de passe*" minlength = "10" required></p>
        <p><input type="submit" value="S'inscrire" name="bouton" class = "deconnexion"></p>
        <p>Déjà inscrit ? <a href="connexion.php">Connectez-vous ici</a></p>
    </form>
    
</body></div>
    </html>