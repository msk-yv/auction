<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8" />
        <title>
            auction
        </title>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <?php include('views/header.php'); ?>
        <div>
                <h1>Аукционы</h1>
        </div>
        <div>
            <table class="table_auction">
                <tr>
                    <th>#</th>
                    <th>start date</th>
                    <th>finish date</th>
                    <th>Themes</th>
                    <th>lots</th>
                </tr>
                <?php foreach($auctions as $a): ?>
                <tr>
                    
                    <td><a href="auction.php/?id=<?=$a['id']?>"><?=$a['id']?></a></td>
                    <td><a href="auction.php/?id=<?=$a['id']?>"><?=$a['Date_Start']?></a></td>
                    <td><a href="auction.php/?id=<?=$a['id']?>"><?=$a['Date_Finish']?></a></td>
                    
                    <td>

                        <?php foreach($themes=get_auction_themes($link, $a['id']) as $t): ?>
                            <?=$t['Theme_Name']?>
                        <?php endforeach ?>
                    </td>
                    <td><?php foreach($lots=get_auction_lots($link, $a['id']) as $lot): ?>
                        <a href="lot.php/?id=<?=$lot['id_lot']?>">'<?=$lot['lot_description']?>'</a><br/>
                        <?php endforeach ?>
                    </td>

                    
                </tr>
                <?php endforeach ?>
            </table>
            
        </div>
        <?php include('views/footer.php'); ?>
    </body>
<!--<?php echo 'Привет <br> от <br> PHP'; ?>
// -->

</html>