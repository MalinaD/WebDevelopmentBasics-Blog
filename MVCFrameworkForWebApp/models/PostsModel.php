<?php

class PostsModel extends BaseModel{
    
    public function getAll(){
        self::$db->prepare("SELECT title FROM posts");
    }
}
