<?php

class PostsController extends BaseController{
    private $db;
    
    public function onInit() {
        $this->title = "Posts";
        $this->db = new PostsModel();
    }
    
    public function index(){
         $this->authoorize();
         $this->renderView();
    }
    
    public function showPosts(){
        
    }
}