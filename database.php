<?php
    define('MYSQL_SERVER', 'localhost');
    define('MYSQL_USER', 'root');
    define('MYSQL_PASSWORD', '1');
    define('MYSQL_DB', 'auction_test1');

    function db_connect(){
        $link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die("Error: ".mysql_error($link));

        if(!mysqli_set_charset($link, "utf8")){
            printf("Error: ".mysqli_error($link));
        }
        return $link;
    }
    
?>