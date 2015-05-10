<?php

class PostsModel extends BaseModel{
    
    public function getAll(){
        $statement = self::$db->query("SELECT title, description, date, id FROM posts");
        $result = $statement->fetch_all();
        return $result;
    }
    
    public function getFilteredPosts($from, $size){
        $statement = self::$db->prepare("SELECT title, description, date, id FROM posts LIMIT ?, ?");
         $statement->bind_param("ii", $from, $size);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        return $result;
    }
    
        
    public function getAllCommentsByPostId($postId){
        $statement = self::$db->prepare("SELECT text, post_id FROM comments c INNER JOIN users u ON c.visitor_id = u.id WHERE post_id = ?");
        $statement->bind_param("i", $postId);
        $statement->execute();
        $result = $statement->get_result()->fetch_all();
        return $result;
    }
    
       public function findCOmmentsByPostId($id) {
        $statement = self::$db->prepare("SELECT * FROM comments WHERE post_id = ? ");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result();
    }
    
     public function getById($id) {
        $statement = self::$db -> prepare("SELECT * FROM posts WHERE id = ? ORDER BY date DESC");            
        $statement->bind_param("i", $id);

        $statement->execute();
        return $statement -> get_result()->fetch_assoc();
    }
    
    public function createPost($title, $content) {
        if ($title == '' || $content == '') {
            return false;
        }
        $statement = self::$db->prepare("INSERT INTO posts SET title = ? , content = ?");
        $statement->bind_param("ss", $title, $content);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
    
    public function deletePost($id){
        $statement = self::$db->prepare("DELETE  FROM posts  WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
        
    }
}
