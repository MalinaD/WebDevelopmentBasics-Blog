<?php

class AccountModel extends BaseModel{
    public function register($username, $password){
       $statement = self::$db->prepare("SELECT COUNT(Id) FROM Users WHERE Username = ?");
       $statement->bind_param("s", $username);
       $statement->execute();
       
       $result =$statement->get_result()->fetch_asoc();
       var_dump($result);
       
       if($result){
           return false;
       }
       
       
    }
    
    public function login($username, $password){
        
    }
}
