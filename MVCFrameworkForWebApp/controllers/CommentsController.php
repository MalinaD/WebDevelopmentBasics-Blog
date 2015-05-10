<?php

class CommentsController extends BaseController{
    private $db;
    
    public function onInit() {
        $this->title = "Comments";
        $this->db = new CommentsModel();
    }
    
    public function index($id){

         $this->id = $id; 
         $this->post = $this->db->findCommentsByPostId($id);
         $this->comments = $this->db->findCommentsById($id);
         $this->renderView();
    }
    
 public function deleteComment($id) {
        $this->authorize();
        if($this->isPost){
            $postId = $_POST['post_id'];
        if ($this->db->deleteComments($id)) {
            $this->addInfoMessage("Comment deleted successfully.");
            $this->redirect("posts/singlePost/$postId");
        } else {
            $this->addErrorMessage("Error deleting comment.");
        }
        
        }
        $this->comment = $this->db->findCommentsById($id);
        if(!$this->comment){
            $this->addErrorMessage("Invalid post");
            $this->redirect("posts");
        }
    }
    
    public function addComment($id){
        $this->post = $this->db->getById($id);
        if($this->isPost) {
            $comment = $_POST['comment'];
            $postId = $_POST['post_id'];
            //$user = $_SESSION['username'];
            $user = $_POST['username'];
            if (strlen($comment) < 2) {
                $this->addFieldValue('comment', $comment);
                $this->addValidationError('comment', 'The comment should be at least 2 symbols.');
                return $this->renderView(__FUNCTION__);
            }
            if ($this->db->addComments($comment, $user, $postId)) {
                $this->addInfoMessage("Comment added successfully.");
                
            } else {
                $this->addErrorMessage("Cannot add comment.");
            }
            $this->redirect('posts');
        }
        $this->renderView(__FUNCTION__);
    }
}
