<?php
session_start();
echo "Vous avez été déconnecté du compte ".$_SESSION["mail"];
session_destroy();
header("refresh:3;url=Menu.php");

?>