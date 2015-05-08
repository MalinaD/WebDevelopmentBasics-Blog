<?php

class PostsController extends BaseController{
    private $db;
    
    public function onInit() {
        $this->title = "Posts";
        $this->db = new PostsModel();
    }
    
    public function index($page, $pageSize){
        
         $this->authoorize();
         
         $this->posts = $this->db->getAll();
         
         $this->renderView();
    }
    
    public function showPosts(){
        $this->posts = $this->db->getAll();
        $this->renderView(__FUNCTION__, false);
    }
}
