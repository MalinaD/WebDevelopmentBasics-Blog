<?php

class PostsModel extends BaseModel{
    
    public function getAll(){
        $statement = self::$db->query("SELECT title FROM posts");
        $result = $statement->fetch_all();
        return $result;
    }
    
    public function getFilterBooks($from, $to){
        $statement = self::$db->prepare("SELECT title FROM posts");
        $result = $statement->fetch_all();
        return $result;
    }
}
