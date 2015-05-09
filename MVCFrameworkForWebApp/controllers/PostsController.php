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
              
         
         $this->posts = $this->db->getFilteredBooks($from, $pageSize);
         $this->renderView(__FUNCTION__);


    }
    
    public function showPosts(){
        $this->posts = $this->db->getAll();
        $this->renderView(__FUNCTION__, false);
    }
}
