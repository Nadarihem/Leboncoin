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
<nav class="navigation">
<a href="inscription.php" class="deconnexion">Inscription</a>
        <a href="connexion.php" class="deconnexion">connexion</a>
</nav>
</header>
<div class = "background"> 
        <?php
        session_start();
    include "connect.php";?>
  <div class="filtre">
    <form action="" method="post">
    <img src='R.png' width='30'>
        <select name="catégorie" id="catégorie">
            <option value="all">Toutes les catégories</option> 
            <?php
            $req = "select distinct categorie from annonces order by categorie";
            $res = mysqli_query($id, $req);
            while ($ligne = mysqli_fetch_assoc($res)) {
                $cat = $ligne["categorie"];
                echo "<option value='$cat'> $cat </option>";
            }
            ?>
        </select>
        <label for="min">Prix :</label>
        <input type="text" name="P_min" id="min" placeholder = "MIN.€"> 
        <input type="text" name="P_max" id="max" placeholder = "MAX.€"> 
        <input type="submit" value="Filtrer" name="bouton2" class = "btn_filtrer">
    </form>
</div><?php
 if(isset($_POST["bouton2"])){
  $cat=$_POST["catégorie"];
  $p_min=$_POST["P_min"];
  $p_max=$_POST["P_max"];

  if($cat==="all" ){
   $req = "select * from annonces where prix between '$p_min' and '$p_max' ";
   $res=mysqli_query($id,$req);
 }
 else if($cat != "all" ){
  $req = "select * from annonces where categorie='$cat' ";
  $res=mysqli_query($id,$req);
 } else{
  $req = "select * from annonces where categorie='$cat' and prix between '$p_min' and '$p_max'  ";
  $res=mysqli_query($id,$req);
}

}
else{
  $req = "select * from annonces ";
  $res = mysqli_query($id, $req);
 }
        if(mysqli_num_rows($res)>0){
            while($ligne = mysqli_fetch_assoc($res)){
                $ida = $ligne["ida"];
              ?>
     <form method="post" action="">
    <input type="hidden" name="idafav" value="<?php echo $ida ?>"> 
    <a class = "essai" href="detail.php?ida=<?=$ida?>">
    <div class = "affichage">
    <img src='photo/<?=$ligne["photo"]?>' width='250'><br></br>
    <div class = "intitule">
    <h3 class= "titre"><?=$ligne["nom_a"]?><br></br></h3>
    <?=$ligne["prix"]?> €
    <div class = "adresse">
    <?=$ligne["adresse"]?><br>
    <?=$ligne["date"]?>
  </div>
  </a>
  <br><button type="submit" name="bouton" class="fav"><img src="fav.png" width="17" ></button>
  </div>
  </div>
            
</form>
        <?php     
       } if (isset($_POST["bouton"])) {
        header("refresh:1;url=connexion.php");
            }
            
        }       

        

           ?>
</body></div>
</html>