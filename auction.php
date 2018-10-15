<?php 
    

    require_once("database.php");
    require_once("models/auction.php");
    require_once("models/lot.php");

    $link = db_connect();
    
    $auction = auction_get($link, $_GET['id']);
    

    include ("views/auction.php");

 ?>
