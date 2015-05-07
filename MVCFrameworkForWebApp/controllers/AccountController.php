<?php

class AccountController extends BaseController{
    private $db;
    
    public function onInit(){
        $this->db = new AccountModel();
    }
    
    public function register(){

      if($this->isPost){
          $username = $_POST['username'];
          if($username == null || strlen($username) < 3){
              $this->addErrorMessage("This username is invalid");
              $this->redirect("account", "register");
          }
          $password = $_POST['password'];
          
          $isRegistered = $this->db->register($username, $password);
          
          if($isRegistered){
              $_SESSION['username'] =$username;
              $this->addInfoMessage("Successfull registration!");
              $this->redirect("books", "index");
          }
          else{
              $this->addErrorMessage("Register failed!");
          }
      }  
    
    $this->renderView(__FUNCTION__);
    }
    
    public function login(){
        if($this->isPost){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $isLoggedIn = $this->db->login($username, $password);
            
            if($isLoggedIn){
                 $_SESSION['username'] =$username;
                $this->addInfoMessage("Successfull login!");
                $this->redirect("books", "index");
            }
            else{
                $this->addErrorMessage("Failed to log in");
            }
        }
        $this->renderView(__FUNCTION__);
    }
        
    public function logout(){
        session_destroy();
    }
}