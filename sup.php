<?php
      session_start();
      include "connect.php";
      if(!isset($_SESSION["mail"])){
        header("location:connexion.php");
      }
      else
        $ida = $_GET["ida"];
        echo "Supression réussie";
          $req ="delete from annonces where ida = '$ida'";
          $res = mysqli_query($id,$req);
          header("refresh:3; url=listeAnnonce.php");
    
    ?>