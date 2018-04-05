<?php

/**
 * Description of Router
 *
 * @author yury_apple_mini
 */
class Router {
    
    private $routes;

    public function __construct() {
        $routsPath = ROOT . '/config/routes.php';
        $this->routes = require ($routsPath);
    }  
    
    
    /**
     * Return request string
     * @return string
     */
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim ($_SERVER['REQUEST_URI'], "/");
        }                        
    }

    public function run() {
        $uri = $this->getURI();
        
        /*
         * Find uri in array of routs
         * 
         */ 
        foreach ($this->routes as $uriPattern => $path) {
  
            if (preg_match("~$uriPattern~", $uri)) {
                
                $innerRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                $pathAsArray = explode('/', $innerRoute);
                
                $controllerName = array_shift($pathAsArray) . 'Controller';
                $actionName = 'action' . array_shift($pathAsArray);
                $arrayOfParams = $pathAsArray;
                
                
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
  
                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }
                
               $controller = new $controllerName;
               call_user_func_array(array($controller, $actionName), $arrayOfParams);
               
               //$controller->$actionName();
               
               break; 
            }            
        }
    }
}