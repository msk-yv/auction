<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title>
            auction
        </title>
        <link rel="stylesheet" href="/style.css" />
    </head>
    <body>
        <?php include('views/header.php'); ?>
        <div>
            <h1>Правила пользования сайтом:</h1>
            <p>Участвовать в аукционах (ставить ставки) могут только зарегистрированные и авторизованные пользователи.</p>
        </div>
        <div>
            <table class="table_auction">
                <tr>
                    <td><a href="/index.php">Просмотреть аукционы</a></td>
                    <td><a href="/register.php">Зарегистрироваться</a></td>
                    <td><a href="/login.php">Войти</a></td>
                    
                </tr>
                
            </table>
            
        </div>
        <?php include('views/footer.php'); ?>
    </body>
</html>