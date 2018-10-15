<?php 
    function auction_all($link){
        $query = "SELECT * FROM auctions ORDER BY id ";
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $n = mysqli_num_rows ($result);
        $auctions = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $auctions[] = $row;
        }
        return $auctions;
    }

    function get_auction_themes($link, $id){
        $query = "SELECT * FROM themes_for_auction 
                    INNER JOIN Themes on Themes.theme_id = themes_for_auction.theme_id 
                    where auction_id = ".$id ;
        //echo $query;
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $n = mysqli_num_rows ($result);
        $themes = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $themes[] = $row;
        }
        return $themes;
    }
    
    function get_auction_lots($link, $id){
        $query = "SELECT * FROM lots WHERE auction_id = ".$id ;
        //echo $query;
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $n = mysqli_num_rows ($result);
        $lots = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $lots[] = $row;
        }
        return $lots;
    }
    
    function auction_get($link, $id){
        $query = "SELECT * FROM auctions WHERE  id =".$id;
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $n = mysqli_num_rows ($result);
        $auction = mysqli_fetch_assoc($result);
            
        return $auction;
    }
?>