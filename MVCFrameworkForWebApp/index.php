        <?php
        session_start();
        
        require_once('includes/config.php');
        
    $requestParts = explode('/' , parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) )    ;
    //var_dump($requestParts);
    
    $controllerName = DEFAULT_CONTROLLER;
    
    if(count($requestParts)>= 2 && $requestParts[1]!= ''){
        $controllerName = $requestParts[1];
    }
    
    $actionName = DEFAULT_ACTION;
    
    if(count($requestParts)>= 3 && $requestParts[2]!= ''){
        $actionName = $requestParts[2];
    }
    
    $params = array_splice($requestParts, 3);
    
    $controllerClassName = ucfirst(strtolower($controllerName)).'Controller';
    $controllerFileName = "controllers/" . $controllerClassName . ".php";
    
    //var_dump($controllerFileName);
    
    if(class_exists($controllerClassName)){
           $controller = new $controllerClassName($controllerName, $actionName);
    }
    else{
        die("Cannot find controller '$controllerName' in controller '$controllerFileName'");
    }
    
    if(method_exists($controller, $actionName)){
       // $controller->{$action}();
        call_user_func_array(array($controller, $actionName), $params);
        //$controller->renderView();
    }
    else{
        die("Cannot find action '$actionName' in controller '$controllerClassName'");
    }
    
    
   // if(!eregi("^\\w+$", $controller)){
   //     die("Invalid controller name");
   // }
    
    function __autoload($class_name) {
    if (file_exists("controllers/$class_name.php")) {
        include "controllers/$class_name.php";
    }
    if (file_exists("models/$class_name.php")) {
        include "models/$class_name.php";
    }
    }