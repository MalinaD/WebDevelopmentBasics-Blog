<?php

class CommentsModel extends BaseModel {
    public function deleteComment($id)
    {
        $statement = self::$db->prepare(
            "DELETE FROM comments WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
    
    public function findCommentsById($id) {
        $statement = self::$db->prepare("SELECT * FROM comments WHERE id = ? ");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
        
        //while ($data = $result -> fetch_assoc())
        //{
        //    $statistic[] = $data;
       // }
        //return $statistic;
    }
    
    public function findCommentsByPostId($id) {
        $statement = self::$db->prepare("SELECT * FROM comments WHERE post_id = ? ");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
        
    }
}
