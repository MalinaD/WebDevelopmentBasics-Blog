<?php

class PostsController extends BaseController{
    private $db;
    
    public function onInit() {
        $this->title = "Posts";
        $this->db = new PostsModel();
    }
    
    public function index($page =0 , $pageSize = 5){
         $this->authorize();
         
         $from = $page * $pageSize;
         $this->page = $page;
         $this->pageSize = $pageSize;
              
         
         $this->posts = $this->db->getFilteredPosts($from, $pageSize);
         $this->renderView(__FUNCTION__);
    }
    
    public function showComments($id){
        $this->authorize();
         $this->id = $id; 
         
         $this->post = $this->db->getById($id);
         $this->comments = $this->db->findCommentsByPostId($id);
         $this->renderView(__FUNCTION__);
    }

    public function showPosts($id){
        $this->posts = $this->db->getAll();
        $this -> comments = $this -> db -> getAllCommentsByPostId($id);
        $this->renderView(__FUNCTION__, false);
    }
    
    public function singlePost($id){
        $this->authorize();
        $this->id = $id;
        $this->post = $this->db->getById($id);
        $this->comments = $this->db->findCommentsByPostId($id);
        $this->renderView(__FUNCTION__);
    }
    
        
    public function create() {
         $this->authorize();
        if (!$this -> isPost) {
            $title = $_POST['title'];
            $content = $_POST['description'];

            if (strlen($content) < 5) {
                $this->addFieldValue('description', $content);
                $this->addValidationError('description', 'The content should be at least 5 symbols');
                return $this->renderView(__FUNCTION__);
            }
            
            if ($this -> db ->createPost($title, $content)) {
                $this -> addInfoMessage ("Post created successfully.");
                
            } else {
                $this -> addErrorMessage("Cannot create post.");
            }
            $this -> redirect('posts');
        }
             return $this->renderView(__FUNCTION__);
        
    }
    
    
    public function delete($id){
        $this->authorize();
        if(!$this->isPost){
            $title = $_POST['title'];
            $content = $_POST['description'];
            if($this->db->deletePost($id)){
                $this->addInfoMessage("Post is deleted!");
                $this->redirect("posts");
                
            }  else {
                $this->addErrorMessage("Post cannot be deleted");
            }
            
            $this->post = $this->db->findCommentsByPostId($id);
            if(!$this->post){
                $this->addErrorMessage("Invalid post");
                $this->redirect("posts");
            }
        }
           
    }

    
}
