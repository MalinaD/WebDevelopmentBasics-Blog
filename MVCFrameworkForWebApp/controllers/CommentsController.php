<?php

class CommentsController extends BaseController{
    private $db;
    
    public function onInit() {
        $this->title = "Comments";
        $this->db = new CommentsModel();
    }
    
    public function index($id){
         $this->authorize();
         $this->id = $id; 
         $this->post = $this->postsModel->findCommentsByPostId($id);
         $this->comments = $this->db->getAllComments($id);
         $this->renderView(__FUNCTION__);
    }
    

}
