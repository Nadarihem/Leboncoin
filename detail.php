<?php
   session_start();
   include "connect.php";
   if(isset($_GET["ida"])){
       $ida = $_GET["ida"];
       $req = "select * from annonces where ida = '$ida'";
       $res = mysqli_query($id,$req);
    }
    else{
        header("location:allAnnonces.php");
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
<body class="body">
    <?php
       while($ligne = mysqli_fetch_assoc($res)){
             $intitule = $ligne["nom_a"];
             $idu=$ligne["idu"];
             $prix = $ligne["prix"];
             $description = $ligne["description"];
             $photo= $ligne["photo"];
             $categorie = $ligne["categorie"];
             $adresse = $ligne["adresse"];
             $date = $ligne["date"];
             

             
            ?>
                <p><img class="img_det" src='photo/<?=$photo?>' width='250'></p><br>
                <div class = "det" href="detail.php?ida=<?=$ida?>">
                     <h2><?=$intitule?></h2>
                     <p>Prix : <?=$prix?> &euro;</p>
                     <p>Description : <?=$description?></p>
                     <p>Catégorie : <?=$categorie?></p>
                     <p>Adresse : <?=$adresse?></p>
                     <p>publié le : <?=" ".$date?></p>
                     <p><a class="mess" href="message.php?idu=<?=$idu?>">Message</a></p>
                     <a href="Menu2.php" class="ret">Retour</a>
                </div>
             <?php
       }
    ?>
</body>
</html>

