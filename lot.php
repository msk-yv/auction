<?php 
    

    require_once("database.php");
    require_once("models/auction.php");
    require_once("models/lot.php");

    $link = db_connect();
    
    $lot = lot_get($link, $_GET['id']);
    

    include ("views/lot.php");

 ?>
