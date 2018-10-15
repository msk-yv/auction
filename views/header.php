
        <header>
            Пробная реализация аукциона Москвичев Ю.В.
            <div style="text-align: right;">
                <?php 
                    require_once('models/autoriz.php');
                    
                    if ($_COOKIE != NULL) {
                        echo ($_COOKIE['id']);

                    }
                    else{
                        echo "<a href='/register.php'>Зарегистрироваться</a> или <a href='/login.php'>войдите</a>";
                    }
                ?>
            </div>
        </header>