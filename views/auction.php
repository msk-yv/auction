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
                <h1>Аукцион #<?=$auction['id']?></h1>
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
                    
                </tr>
                <?php foreach($lots=get_auction_lots($link, $auction['id']) as $lot): ?>
                
                <tr>                    
                    <td><a href="/lot.php?id=<?=$lot['id_lot']?>"><?=$lot['id_lot']?></a></td>
                    <td><a href="/lot.php?id=<?=$lot['id_lot']?>"><?=$lot['lot_Date_Finish']?></a></td>
                    <td><?php foreach($themes=get_lot_themes($link, $lot['id_lot']) as $t): ?>
                            <?=$t['Theme_Name']?>
                        <?php endforeach ?></td>
                    <td><a href="/lot.php?id=<?=$lot['id_lot']?>"><?=$lot['lot_name']?></a></td>
                    <td><a href="/lot.php?id=<?=$lot['id_lot']?>"><?=$lot['lot_description']?></a></td>
                    <td><?=$lot['lot_min_price']?></td>
                    <td><?=$lot['lot_last_bet']?></td>
                    <td><?=$lot['lot_next_bet']?></td>
                    <td>Current Leader</td>                  
                </tr>
                
                <?php endforeach ?>
            </table>
            
        </div>
        <?php include('views/footer.php'); ?>
    </body>
</html>