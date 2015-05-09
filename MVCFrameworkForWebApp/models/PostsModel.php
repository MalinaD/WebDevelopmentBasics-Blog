<?php

class PostsModel extends BaseModel{
    
    public function getAll(){
        $statement = self::$db->query("SELECT title, description, date FROM posts");
        $result = $statement->fetch_all();
        return $result;
    }
    
    public function getFilteredBooks($from, $size){
        $statement = self::$db->prepare("SELECT title, description, date FROM posts LIMIT ?, ?");
        $statement->bind_param("ii", $from, $size);
        $result = $statement->get_result();
        return $result;
    }
}
