<?php

class PostsController extends BaseController{
    private $db;
    
    public function onInit() {
        $this->title = "Posts";
        $this->db = new PostsModel();
    }
    
    public function index($page =0 , $pageSize = 5){
         $this->authoorize();
         
         $from = $page * $pageSize;
         $this->page = $page;
         $this->pageSize = $pageSize;
              
         
         $this->posts = $this->db->getFilteredPosts($from, $pageSize);
         $this->renderView(__FUNCTION__);
    }
    
    public function showComments($id){
        $this->authoorize();
         $this->id = $id; 
         
         $this->post = $this->db->find($id);
         $this->comments = $this->db->getAllCommentsByPostId($id);
         $this->renderView(__FUNCTION__);
    }

    public function showPosts(){
        $this->posts = $this->db->getAll();
        $this->renderView(__FUNCTION__, false);
    }
    
        
    public function create() {
         $this->authoorize();
        if (!$this -> isPost) {
            $title = $_POST['title'];
            $content = $_POST['description'];

            if (strlen($content) < 5) {
                $this->addFieldValue('content', $content);
                $this->addValidationError('content', 'The content should be at least 5 symbols');
                return $this->renderView(__FUNCTION__);
            }
            
            if ($this -> db ->createPost($title, $content)) {
                $this -> addInfoMessage ("Post created successfully.");
                $this -> redirect('posts');
            } else {
                $this -> addErrorMessage("Cannot create post.");
            }
            
             return $this->renderView(__FUNCTION__);
        }
    }
    
    public function delete($id){
        $this->authoorize();
        if(!$this->isPost){
            $title = $_POST['title'];
            $content = $_POST['description'];
            if($this->db->deletePost($id)){
                $this->addInfoMessage("Post is deleted!");
                $this->redirect("posts");
                
            }  else {
                $this->addErrorMessage("Post cannot be deleted");
            }
            
            $this->post = $this->db->find($id);
            if(!$this->post){
                $this->addErrorMessage("Invalid post");
                $this->redirect("posts");
            }
        }
           
    }
}
