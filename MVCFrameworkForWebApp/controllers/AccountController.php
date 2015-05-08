<?php

class AccountController extends BaseController{
    private $db;
    
    public function onInit(){
        $this->db = new AccountModel();
    }
    
    public function register(){

      if($this->isPost){
          $username = $_POST['username'];
          $password = $_POST['password'];
                    
          if($username == null || strlen($username) < 3){
              $this->addErrorMessage("The username is invalid, must be at least 3 symbols long!");
              $this->redirect('account', 'register');
          }

          $isRegistered = $this->db->register($username, $password);
          
          if($isRegistered){
              $_SESSION['username'] =$username;
              $this->addInfoMessage("Successfull registration!");
              $this->redirect('posts', 'index');
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
            
          if($username == null || strlen($username) < 3){
              $this->addErrorMessage("The username is invalid, must be at least 3 symbols long!");
              $this->redirect('account', 'register');
          }
            
            $isLoggedIn = $this->db->login($username, $password);
            
            if(isset($isLoggedIn) && $isLoggedIn == TRUE){
                 $_SESSION['username'] =$username;
                $this->addInfoMessage("Successfull login!");
                return $this->redirect('posts', 'index');
            }
            else{
                $this->addErrorMessage("Failed to login");
                $this->redirect('account', 'login');
                //$this->renderView(__FUNCTION__);
               // return;
            }
        }
        $this->renderView(__FUNCTION__);
    }
        
    public function logout(){
        $this->authoorize();
        unset($_SESSION['username']);
        $this->addInfoMessage("Logout successful!");
        $this->redirectToUrl("/");
    }
}
