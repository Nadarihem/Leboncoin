<?php
   session_start();
   include "connect.php";
   if(isset($_SESSION["mail"])){
       $idu= $_SESSION["idu"];
   }
   else{
       header("location: connexion.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste annonce </title>
    <link rel="stylesheet" href="style.css">
</head>
<header class = "menu">
    <h2 class = "leboncoin">leboncoin</h2>
    </header>
<body>
    <div class="myA">
    <h2 class="mine"> Mes annonces  </h2>
    <table>
        <tr class = "lannonces">
           <th class="int">Intitulé</th><th>prix</th>
            <th>description</th><th>categorie</th><th>photo</th><th>adresse</th>
            <th><img src="modif.png" width="30"></th> 
            <th><img src="sup.png" width="30"></th> 
        </tr>
        <?php
        $req = "select * from annonces where idu = '$idu'";
        $res = mysqli_query($id, $req);
        if(mysqli_num_rows($res)>0){
            while($ligne = mysqli_fetch_assoc($res)){
              ?>
                <tr>
                    <td><?=$ligne["nom_a"]?></td>
                    <td><?=$ligne["prix"]?> &euro;</td>
                    <td><?=$ligne["description"]?></td>
                    <td><?=$ligne["categorie"]?></td>
                    <td><img src='photo/<?=$ligne["photo"]?>' width='50'></td>
                    <td><?=$ligne["adresse"]?></td>
                    <td><a href='modif.php?ida=<?=$ligne["ida"]?>'><img src='modif.png' width='25'></a></td>
                    <td><a  onclick = "return confirm('Êtes vous sûr de voir supprimer ?')" href='sup.php?ida=<?=$ligne["ida"]?>'><img src='sup.png' width='25'></td>
                </tr>
                <?php
                }?>
                <a href="annonce.php" class="Btn_addd"> <img src="photo/plus.png" width='25'>Ajouter une annonce</a>
                <?php } else{
               echo "<p>Vous n'avez publier aucune annonce</p>";?>
                <form action="" method="post">
                <p><input type="submit" value="+Ajouter" name = "bouton"></p>
               </form>
                <?php 
                if (isset($_POST["bouton"])){
                      echo "vous allez être redirigé...";
                      header("refresh:3; url=annonce.php");
               }
           }
        ?>
</table>
    <br><br><a class="Btn_retour" href="Menu2.php">Retour</a>
</div>
</body>
</html>