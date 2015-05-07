<?php

abstract class BaseController {
    
    //protected $action;
    protected $controllerName;
    protected $layoutName = DEFAULT_LAYOUT;
    protected $isViewRendered = false;
    protected $isPost = false;
    protected $user;
    protected $isLoggedIn;
    
    function __construct($controllerName,$action) {
        //$this->action = $action;
        $this->controller = $controllerName;
        if($_SERVER['REQUEST_METHOD']=== 'POST'){
            $this->isPost = true;
        }
        $this->onInit();
    }
    
    public function onInit(){
        //TODO
    }
    
    public function index(){
       //TODO - implement the default action 
    }
    
    public function renderView($viewName = "index", $includeLayout = true){
        if(!$this->isViewRendered){
            //if($viewName == null){
           // $viewName = $this->action;
           //  }
        $viewFileName = 'views/' . $this->controller . '/' . $viewName . '.php';
        
        if($includeLayout){
            $headerFile = 'views/layout/' . $this->layoutName . '/header.php';
        include_once($headerFile);
        }
        
        include_once($viewFileName);
        
        if($includeLayout){
            $footerFile = 'views/layout/' . $this->layoutName . '/footer.php';
        include_once($footerFile);
        }
        
        $this->isViewRendered = true;
        }
        
    }
    
    public function redirectToUrl($url){
        header("Location: " . $url);
        die;
    }
    
    public function redirect($controllerName, $actionName = "index", $params = null){
        $url = '/' . urlencode($controllerName);
        if($actionName != null){
            $url.= '/' . urlencode($actionName);
        }
        
        if($params != null){
            $encodedParams = array_map($params, 'urlencode');
            $url .= implode('/', $encodedParams);
        }
        $this->redirectToUrl($url);
    }
    
   public function addMessage($msg, $msgText){
       if(!isset($_SESSION[$msg])){
            $_SESSION[$msg] = [];
        }
         array_push($_SESSION[$msg], $msgText);
    }
    
    public function addInfoMessage($msg){
        $this->addMessage($msg, INFO_MESSAGES_SESSION_KEY);
    }
    
    public function addErrorMessage($msg){
       $this->addMessage($msg, ERROR_MESSAGES_SESSION_KEY); 
    }
}
