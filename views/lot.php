<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title>
            Лот #<?=$lot['id_lot']?> из Аукциона #<?=$lot['auction_id']?>
        </title>
        <link rel="stylesheet" href="/style.css" />
    </head>
    <body>
        <?php include('views/header.php'); ?>
        <div>
                <h1>Лот #<?=$lot['id_lot']?> из <a href="/auction.php/?id=<?=$lot['auction_id']?>">Аукциона #<?=$lot['auction_id']?></a></h1>
        </div>
        <div>
            <table class="table_auction">
                <tr>
                    <th>#</th>
                    <th>lot_Date_Finish</th>
                    <th>Themes</th>
                    <th>lot_name</th>
                    <th>lot_description</th>
                    <th>lot_min_price</th>
                    <th>lot_last_bet</th>
                    <th>lot_next_bet</th>
                    <th>Current Leader</th>
                    <th>Сделать ставку</th>
                    
                </tr>
                <?php //foreach($lots=get_auction_lots($link, $auction['id']) as $lot): ?>
                <tr>
                    
                    <td><?=$lot['id_lot']?></td>
                    <td><?=$lot['lot_Date_Finish']?></td>
                    <td><?php foreach($themes=get_lot_themes($link, $lot['id_lot']) as $t): ?>
                            <?=$t['Theme_Name']?>
                        <?php endforeach ?></td>
                    <td><?=$lot['lot_name']?></td>
                    <td><?=$lot['lot_description']?></td>
                    <td><?=$lot['lot_min_price']?></td>
                    <td><?=$lot['lot_last_bet']?></td>
                    <td><?=$lot['lot_next_bet']?></td>
                    <td><?=$lot['lot_current_leader']?></td>
                    <td>
                    <?php 
                        require_once('models/autoriz.php');
                        if ($_COOKIE != NULL): 
                    ?> 
                    <?php include('views/bet.php')?>    
                    <?php else: ?>
                        echo "Чтобы сделать ставку  <a href='/register.php'>зарегистрируйтесь</a> или <a href='/login.php'>войдите</a>";
                    <?php endif ?>
                </td>    
                    
                </tr>
                <?php //endforeach ?>
            </table>
            <div>
                <?php foreach($images=get_lot_images($link, $lot['id_lot']) as $image): ?>
                    <img class="image_in_lot" src="<?=$image['image_link']?>" alt="screen" />
                <?php endforeach ?>
            </div>
            
        </div>
        <?php include('views/footer.php'); ?>
    </body>
</html>