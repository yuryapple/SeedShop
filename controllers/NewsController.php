<?php
/**
 * Description of NewsController
 *
 * @author yury_apple_mini
 */

include ROOT . '/models/News.php';

class NewsController 
{

    public function actionIndex () {
        echo "<h1> News </h1>";
        $result = News::getAllNews();
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        
    }   
    
    public function actionView ($category, $id ) {
        echo "<h1> One news category of $category with id $id </h1>";
        
        $result = News::getNewsById($id);
        echo '<pre>';
        print_r($result);
        echo '</pre>';   
    }
    
    
    
}
