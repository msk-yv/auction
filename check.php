<?php

// Скрипт проверки


# Соединямся с БД

require_once("database.php");

$link = db_connect();


if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))

{   

    $query = mysqli_query($link, "SELECT * FROM users WHERE id_user = '".intval($_COOKIE['id'])."' LIMIT 1");

    $userdata = mysqli_fetch_assoc($query);


    if(($userdata['user_password'] !== $_COOKIE['hash']) or ($userdata['id_user'] !== $_COOKIE['id'])  and ($userdata['user_ip'] !== "0"))

    {

        setcookie("id", "", time() - 3600*24*30*12, "/");

        setcookie("hash", "", time() - 3600*24*30*12, "/");

        print "Хм, что-то не получилось";

    }

    else

    {

        print "Привет, ".$userdata['user_login'].". Всё работает!";
        echo "<br><a href='index.php'>Перейти на сайт</a>";

    }

}

else

{

    print "Включите куки";

}

?>