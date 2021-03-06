<?php

class AccountModel extends BaseModel{
    public function register($username, $password){
       $statement = self::$db->prepare("SELECT COUNT(Id) FROM Users WHERE Username = ?");
       $statement->bind_param("s", $username);
       $statement->execute();
       
       $result =$statement->get_result()->fetch_assoc();
       var_dump($result['COUNT(Id)']);
       
       if($result['COUNT(Id)']){
           return false;
       }
       else{
                //$username = mysqli_real_escape_string($username);
            $hash_pass = password_hash($password, PASSWORD_BCRYPT);

            $registerStatement = self::$db->prepare("INSERT INTO Users (username, pass_hash) VALUES(? , ?)");
            $registerStatement->bind_param("ss",$username, $hash_pass);
            $registerStatement->execute();

            return true;
       }
       
    }
    
    public function login($username, $password){
        $statement = self::$db->prepare("SELECT id, username, pass_hash FROM Users WHERE username = ?");
       $statement->bind_param('s', $username);
       $statement->execute();
       
       $result =$statement->get_result()->fetch_assoc();
      
       if(password_verify($password, $result['pass_hash'])){
            return true;
       }

       return false;

    }
}
