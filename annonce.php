<?php
   session_start();
   include "connect.php";
   if(!isset($_SESSION["mail"])){
      // Redirection vers la page de connexion
      header("location:connexion.php");
   }
   else{

      $mail = $_SESSION["mail"];
      $idu= $_SESSION["idu"];

      if(isset($_POST["bouton"])){
           $nom_a = $_POST["nom"];
           $prix = $_POST["prix"];
           $categorie = $_POST["categorie"];
           $description = $_POST["description"];
           $adresse = $_POST["adresse"];
           $pos = strpos($_FILES["photo"]["name"], ".");
           $extension = substr($_FILES["photo"]["name"], $pos);
           $photo = "$nom_a$extension";
           move_uploaded_file($_FILES["photo"]["tmp_name"], "photo/$photo");
         $req = "INSERT INTO annonces(ida, idu, nom_a, prix, description, photo, categorie, adresse, date)
         VALUES (null, '$idu', '$nom_a', '$prix', '$description', '$photo', '$categorie', '$adresse', now())";
         mysqli_query($id,$req);
         echo "Votre annonce a été publier avec succé, vous allez être redirigé...";
         header("refresh:3; url=Menu2.php");
         //redirection vers Menu 
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
    </nav>
    </header>
    <div class = "background">
<body>
    <form class = "form_annonce" action="" method="post" enctype="multipart/form-data">
        <h1>Déposer votre annonce : </h1>
        <p><input type="text" name="nom" id="nom" placeholder = "Titre de l'annonce* " required></p>
        <div class="desc">
        <p><textarea name="description" id="description" cols="30" rows="6"
         placeholder = "Ajouter une description*"required></textarea></p>
        </div>
        <p><input type="text" name="prix" id="prix" placeholder="Prix*"required>  &euro;</p>
    <select name="categorie" required>
    <option value="">Choisir une catégorie</option>
    <option value="électronique">electronique</option>
    <option value="vetement">vetement</option>
    <option value="vehicule">vehicule</option>
    <option value="accessoire">accessoire</option>
</select>
            <p class="photo">Ajouter une photo :</p> 
        <input type="file" name="photo" id="photo" required>
        <p><input type="text" name = "adresse" placeholder = "Votre adresse*" required></p>
        <p><input type="submit" value="Publier" name = "bouton"></p>
        <a href = "Menu2.php" class = "Btn_retour" >RETOUR</a>
</form>

</body></div>
</html>