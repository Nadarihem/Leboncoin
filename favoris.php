<?php
   session_start();
   include "connect.php";
   $idu= $_SESSION["idu"];    
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
    <h2 class="mine"> Favoris  </h2>
    <table>
        <tr class="lannonces">
            <th ckass = "int">Intitulé</th><th>prix</th>
            <th>description</th><th>categorie</th><th>photo</th><th>adresse</th>
        </tr>
        <?php
        $req = "select * from fav where idu = '$idu'";
        $res = mysqli_query($id, $req);
        if(mysqli_num_rows($res)>0){
            while($ligne = mysqli_fetch_assoc($res)){
                $idafav=$ligne["idafav"];
                $req2="select * from annonces where ida = $idafav";
                $res2 = mysqli_query($id,$req2);
                if (mysqli_num_rows($res2)>0){
                    while($ligne2 = mysqli_fetch_assoc($res2)){
                        ?>
                        <tr>
                            <td><?=$ligne2["nom_a"]?></td>
                            <td><?=$ligne2["prix"]?></td>
                            <td><?=$ligne2["description"]?></td>
                            <td><?=$ligne2["categorie"]?></td>
                            <td><img src='photo/<?=$ligne2["photo"]?>' width='75'></td>
                            <td><?=$ligne2["adresse"]?></td>
                            <td><a  onclick = "return confirm('Êtes vous sûr de voir supprimer ?')" href='supfav.php?idafav=<?=$idafav?>'><img src='sup.png' width='40'></td>
                            </tr>
                <?php
                }}}}
              ?>
              </table>
              <br><br><a class="Btn_retour" href="Menu2.php">Retour</a>
        </div>
</body>
</html>