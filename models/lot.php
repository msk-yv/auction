<?php 
    function get_lot_themes($link, $id){
        $query = "SELECT * FROM themes_for_lot 
                    INNER JOIN Themes on Themes.theme_id = themes_for_lot.theme_id 
                    where lot_id = ".$id ;
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
    function lot_get($link, $id){
        $query = "SELECT * FROM lots WHERE  id_lot =".$id;
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $n = mysqli_num_rows ($result);
        $lot = mysqli_fetch_assoc($result);
            
        return $lot;
    }

    function get_lot_images($link, $id){
        $query = "SELECT * FROM images_for_lot 
                    INNER JOIN images on images.id_lot_image = images_for_lot.image_id
                    WHERE lot_id = ".$id ;
        //echo $query;
        $result = mysqli_query($link, $query);
        
        if (!$result)
            die(mysqli_error($link));
        
        $n = mysqli_num_rows ($result);
        $images = array();
        
        for ($i = 0; $i < $n; $i++){
            $row = mysqli_fetch_assoc($result);
            $images[] = $row;
        }
        return $images;
    }

?>