<?php

class PostsModel extends BaseModel{
    
    public function getAll(){
        $statement = self::$db->query("SELECT title FROM posts");
        $result = $statement->fetch_all();
        return $result;
    }
}
