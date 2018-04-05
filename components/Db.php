<?php
/**
 * Description of Db
 *
 * @author yury_apple_mini
 */
class Db {

    public static function getConnection() {
        $pathToParansFile = ROOT . '/config/db_params.php';
        $params = include ($pathToParansFile);
       
        $dns = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO ($dns, $params['user'], $params['password']);
        
        return $db;
    }    


}
