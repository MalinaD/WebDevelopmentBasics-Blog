<?php

abstract class BaseController {
    
    //protected $action;
    protected $controllerName;
    protected $layoutName = DEFAULT_LAYOUT;
    protected $isViewRendered = false;
    protected $isPost = false;
    
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
    
    public function redirect($controllerName, $actionName = null, $params = null){
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
    
   public function addMessage($msg, $type){
       if(!isset($_SESSION['messages'])){
            $_SESSION['messages'] = [];
        }
         array_push($_SESSION[$msg], $type);
    }
    
    public function addInfoMessage($msg){
        $this->addMessage(INFO_MESSAGES_SESSION_KEY, $msg);
    }
    
    public function addErrorMessage($msg){
       $this->addMessage(ERROR_MESSAGES_SESSION_KEY, $msg); 
    }
}
