<?php

/**
 * Description of News
 *
 * @author yury_apple_mini
 */
class News {

    public static function getNewsById($id) {
        $id = intval($id);        
        $comand = 'SELECT * FROM news WHERE id=' . $id;
        
        return self::getResult($comand)->fetch();
    }
    
    public static function getAllNews() {
        $newsAll = array();
        $comand = 'SELECT * FROM news';
        
        $res = self::getResult($comand);
        
        $i = 0;
        while ($row = $res->fetch()) {
            $newsAll[$i]['id'] = $row['id'];
            $newsAll[$i]['Title'] = $row['Title'];
            $newsAll[$i]['Text'] = $row['Text'];
            $newsAll[$i]['Date'] = $row['Date'];
            $i++;
        }        
        
        return $newsAll;
    }
    
    private static function getResult ($comand) {
        $db = Db::getConnection();
         
        $result = $db->query($comand);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        //return $result->fetch();
        return $result;
    }       
    
}
