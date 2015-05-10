<?php

class AuthorsController extends BaseController{
    
    private $db;
    
    public function onInit(){
        $this->title = "Authors";
        $this->db = new AuthorsModel();
    }
    
    public function index(){
        //$model = new AuthorsModel();
        $this->authorize();
        $this->authors = $this->db->getAll();
        $this->renderView();

    }
    
    public function create(){
        $this->authorize();
        
        if($this->isPost){
            $name = $_POST['author_name'];
            //$this->authors = $this->db->createAuthor($name);
            
            if(strlen($name)< 3){
                $this->addFieldValue('author_name', $name);
                $this->addValidationError('author_name', 'The author name length should be greater than 2');
                return $this->renderView(__FUNCTION__);
            }
            
            if ($this->db->createAuthor($name)) {
                $this->addInfoMessage("Author created.");
               
           } else {
                $this->addErrorMessage("Cannot create author.");
               
            }
            $this->redirect('authors');
        }
        $this->renderView(__FUNCTION__);
    }
    
    public function delete($id){
         $this->authorize();
        //$this->renderView("index");
       if($this->db->delete($id)){
           $this->addInfoMessage("Author deleted");
       }
       else {
           $this->addErrorMessage("Cannot delete author");
       }
        $this->redirect('authors');
    }
}
