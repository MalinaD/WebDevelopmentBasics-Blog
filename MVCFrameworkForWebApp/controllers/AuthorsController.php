<?php

class AuthorsController extends BaseController{
    
    private $db;
    
    public function onInit(){
        $this->title = "Authors";
        $this->db = new AuthorsModel();
    }
    
    public function index(){
        //$model = new AuthorsModel();
        $this->authors = $this->db->getAll();
       // $this->authors = array(
       //     array('id'=> 1 ,'name'=> "Ivan"),
       //     array('id'=> 2 ,'name'=> "Pesho"),
       //     array('id'=> 3 ,'name'=> "Maria")
       // );
    }
    
    public function create(){
        if($this->isPost){
            $name = $_POST['author_name'];
            //$this->authors = $this->db->createAuthor($name);
            if ($this->db->createAuthor($name)) {
                $this->addInfoMessage("Author created.");
               
           } else {
                $this->addErrorMessage("Cannot create author.");
               
            }
            $this->redirect("authors");
        }
        $this->renderView(__FUNCTION__);
    }
    
    public function delete($id){
        //$this->renderView("index");
        $this->db->delete($id);
        $this->redirect('authors');
    }
}
