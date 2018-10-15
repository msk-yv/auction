<?php 
   

    require_once("database.php");
    require_once("models/auction.php");

    $link = db_connect();
  
    $auctions = auction_all($link);
   

    include ("views/auctions.php");

 ?>
