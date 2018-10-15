<?php
// Шаблон новой ставки

// Соединямся с БД

require_once("database.php");
//equire_once("models/auction.php");
$link = db_connect();
if(isset($_POST['submit']))
{
    $err = [];
    $b = $_POST['bet_size'];
    //$l = $lot['id_lot'];
    $now = date('Y-m-d H:i:s');
    // проверям время ставки
    if($now > $lot['lot_Date_Finish'])
    {
        echo "Ставки на этот лот уже не принимаются:(";
        exit;
    }
    // проверяем размер ставки
    elseif ($b < $lot['lot_next_bet'])
    {
        echo "Так мало?!о_О";
        //header("Location: /lot.php/?id=".$lot['id_lot']); 
        //exit();
    }

    //Скрытой ставки нет
    elseif ($lot['lot_hidden_bet']  == $lot['lot_next_bet'])
    {
        if ($lot['lot_next_bet'] < $b){
            $tmp_last_bet = $lot['lot_next_bet'];
            $tmp_next_bet = $tmp_last_bet * 1.02;
            mysqli_query($link, "INSERT INTO bets SET lot_id='".$lot['id_lot']."', user_id='".$_COOKIE['id']."',  bet_value='".$b."', bet_time=NOW()");
            mysqli_query($link, "UPDATE lots SET lot_next_bet='".$tmp_next_bet."', lot_hidden_bet='".$b."', lot_last_bet='".$tmp_last_bet."', lot_current_leader='".$_COOKIE['id']."' WHERE id_lot='".$lot['id_lot']."'");
            echo "Ваша ставка <?=$b?> принята как скрытая";
            //exit;
        }
        elseif ($lot['lot_next_bet'] == $b){
            $tmp_last_bet = $lot['lot_next_bet'];
            $tmp_next_bet = $tmp_last_bet * 1.02;
            mysqli_query($link, "INSERT INTO bets SET lot_id='".$lot['id_lot']."', user_id='".$_COOKIE['id']."',  bet_value='".$b."', bet_time=NOW()");
            mysqli_query($link, "UPDATE lots SET lot_last_bet='".$tmp_last_bet."', lot_hidden_bet='".$tmp_next_bet."', lot_next_bet='".$tmp_next_bet."', lot_current_leader='".$_COOKIE['id']."' WHERE id_lot='".$lot['id_lot']."'");
            echo "Ваша ставка <?=$b?> принята";
            //exit;
        }
    }
    //Скрытая ставка есть
    elseif ($lot['lot_hidden_bet']  > $lot['lot_next_bet']){
        //Если скрытая ставка Участника 1 меньше новой ставки Участника 2, то она отображается и лидером становится Участник 2.
        if ($lot['lot_hidden_bet'] < $b){ 
            $tmp_last_bet = $lot['lot_hidden_bet'];
            $tmp_next_bet = $tmp_last_bet * 1.02;
            mysqli_query($link, "INSERT INTO bets SET lot_id='".$lot['id_lot']."', user_id='".$_COOKIE['id']."',  bet_value='".$lot['lot_hidden_bet']."', bet_time=NOW()");
            mysqli_query($link, "UPDATE lots SET lot_next_bet='".$tmp_next_bet."', lot_last_bet='".$tmp_last_bet."', lot_hidden_bet='".$b."', lot_current_leader='".$_COOKIE['id']."' WHERE id_lot='".$lot['id_lot']."'");
            echo "Ваша ставка <?=$b?> перебила скрытую ставку";
        }
        //- Если скрытая ставка Участника 1 равна ставке Участника 2, то побеждает ставка, поставленная раньше, обе ставки становятся видимыми.
        elseif ($lot['lot_hidden_bet'] == $b){
            $tmp_last_bet = $lot['lot_hidden_bet'];
            $tmp_next_bet = $tmp_last_bet * 1.02;
        
            mysqli_query($link, "INSERT INTO bets SET lot_id='".$lot['id_lot']."', user_id='".$_COOKIE['id']."',  bet_value='".$lot['lot_hidden_bet']."', bet_time=NOW()");
            mysqli_query($link, "UPDATE lots SET lot_next_bet='".$tmp_next_bet."', lot_last_bet='".$tmp_last_bet."', lot_hidden_bet='".$tmp_next_bet."' WHERE id_lot='".$lot['id_lot']."'");
            echo "Ваша ставка <?=$b?> равна скрытой ставке";
        }
        //- Если скрытая ставка Участника 1 больше ставки Участника 2, но меньше суммы ставки Участника 2 и шага ставки, то она начинает отображаться для пользователей, ставка Участника 2 принимается, но лидером остается Участник 1, стоимость лота становится равной скрытой ставке Участника 1.

        elseif (($lot['lot_hidden_bet'] > $b) && (($lot['lot_hidden_bet'] < $b*1.02))){
            $tmp_last_bet = $lot['lot_hidden_bet'];
            $tmp_next_bet = $tmp_last_bet * 1.02;
        
            mysqli_query($link, "INSERT INTO bets SET lot_id='".$lot['id_lot']."', user_id='".$_COOKIE['id']."',  bet_value='".$lot['lot_hidden_bet']."', bet_time=NOW()");
            mysqli_query($link, "UPDATE lots SET lot_next_bet='".$tmp_next_bet."', lot_last_bet='".$tmp_last_bet."', lot_hidden_bet='".$tmp_next_bet."' WHERE id_lot='".$lot['id_lot']."'");
            echo "Ваша ставка <?=$b?> вскрыла скрытую ставку";
    }
    //- Если скрытая ставка Участника 1 больше, чем сумма ставки Участника 2 и шаг ставки, то создается новая ставка от имени Участника 1 равная ставке Участника 2 + шаг ставки.
        elseif ($lot['lot_hidden_bet'] > $b*1.02){
        $tmp_last_bet = $b*1.02;
        $tmp_next_bet = $tmp_last_bet * 1.02;
    
        mysqli_query($link, "INSERT INTO bets SET lot_id='".$lot['id_lot']."', user_id='".$lot['lot_current_leader']."',  bet_value='".$tmp_last_bet."', bet_time=NOW()");
        mysqli_query($link, "UPDATE lots SET lot_next_bet='".$tmp_next_bet."', lot_last_bet='".$tmp_last_bet."'  WHERE id_lot='".$lot['id_lot']."'");
        echo "Ваша ставка <?=$b?> меньше скрытой ставки";
    }
    else {
        echo "dfghdfgh";
    }
    
}}

?>
<form method="POST">
Ставка<input name='bet_size' type="number" step="0.01" value="<?=$lot['lot_next_bet']?>" required/>
<input name="submit" type="submit" value="поставить"/>
</form>