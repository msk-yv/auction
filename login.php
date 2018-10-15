<?php
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
//$link=mysqli_connect("localhost", "mysql_user", "mysql_password", "testtable");
require_once("database.php");
//equire_once("models/auction.php");
$link = db_connect();

if(isset($_POST['submit']))

{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT id_user, user_password FROM users WHERE user_login='".$_POST['login']."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    //$insip="";
    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        //$hash = md5(generateCode(10));
        /*
        if(!empty($_POST['not_attach_ip']))
        {
            // Если пользователя выбрал привязку к IP
            // Переводим IP в строку
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }
*/
        // Записываем в БД новый хеш авторизации и IP
        //mysqli_query($link, "UPDATE users SET user_hash='".$hash." WHERE id_user='".$data['id_user']."'");

        // Ставим куки
        setcookie("id", $data['id_user'], time()+60*60*24*30);
        setcookie("hash", $data['user_password'], time()+60*60*24*30,null,null,null,true); // httponly !!!

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();
    }
    else
    {
        echo "Вы ввели неправильный логин/пароль";
        

    }
}
?>
<form method="POST">
Логин <input name="login" type="text" required><br>
Пароль <input name="password" type="password" required><br>
<!--
    Не прикреплять к IP(не безопасно) <input type="checkbox" name="not_attach_ip"><br>
    -->
<input name="submit" type="submit" value="Войти">
</form>