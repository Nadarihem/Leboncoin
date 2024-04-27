<?php
      session_start();
      include "connect.php";
      $idu= $_SESSION["idu"];
      if(!isset($_SESSION["mail"])){
        header("location:connexion.php");
      }
      else
        $idafav = $_GET["idafav"];
        echo "Supression réussie";
          $req ="delete from fav where idu = '$idu' and idafav = '$idafav'";
          $res = mysqli_query($id,$req);
          header("refresh:3; url=favoris.php");
    
    ?>