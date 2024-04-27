<?php
   session_start();
   include "connect.php";
   $ida = $_GET["ida"];
   if(!isset($_SESSION["mail"])){
      header("location:connexion.php");
   }
   else{
      if(isset($_POST["bouton"])){
          $nom_a = $_POST["nom"];
          $prix = $_POST["prix"];
          $adresse=$_POST["adresse"];
          $description = $_POST["description"];
          $pos = strpos($_FILES["photo"]["name"], ".");
          $extension = substr($_FILES["photo"]["name"], $pos);
          $photo = "$nom_a$extension";
          move_uploaded_file($_FILES["photo"]["tmp_name"], "photo/$photo");
          $req2 = "UPDATE annonces SET nom_a = '$nom_a', description = '$description',
          prix = '$prix', photo = '$photo', adresse = '$adresse' where ida='$ida'";
          $res2= mysqli_query($id,$req2);
          if(!$res2){
              echo "erreur";
           }
        
        }
      
     
      $req1= "SELECT * FROM annonces WHERE ida = '$ida'";
      $res1=mysqli_query($id,$req1);
      $ligne = mysqli_fetch_assoc($res1);
      $nom_a= $ligne["nom_a"];
      $prix = $ligne["prix"];
      $categorie = $ligne["categorie"];
      $adresse = $ligne["adresse"];
      $description = $ligne["description"];
      $photo = $ligne["photo"];

     
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
<header class = "menu">
    <h2 class = "leboncoin">leboncoin</h2>
    </header>
    <div class = "background">
        <form class = "form_annonce" action="" method="post" enctype="multipart/form-data">
        <div class="myA">
    <h2 class="mine"> modifier  </h2></div>
        <label for="nom"> nom de l'annonce : </label>
        <p><input type="text" name="nom" id="nom" value ="<?=$nom_a?>" placeholder= "Nom de l'annonce " ></p>
        <label for="description">Description : </label>
        <p><textarea name="description" id="description" cols="30" rows="6" 
        value ="<?=$description?>" placeholder = "Ajouter une description"><?=$description?></textarea></p>
        <label for="prix">Le prix : </label>
        <p><input type="text" name="prix" id="prix" value ="<?=$prix?>" placeholder="Prix"></p>
        <p> image actuelle :
            <img src='photo/<?=$ligne['photo']?>' width='30'></p>
        <label>choisir une nouvelle image : </label>
        <p><input type="file" name="photo" id="photo" value ="<?=$photo?>" ></p><br>
        <p><input type="text" name="adresse" id="adresse" value ="<?=$adresse?>" placeholder = "adresse" ></p><br>
        <p><input type="submit" value="Soumettre" name = "bouton"></p>
        <a href="listeAnnonce.php" class="Btn_retour">RETOUR</a>
</form>
</body></div>
</html>