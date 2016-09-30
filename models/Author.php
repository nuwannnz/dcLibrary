<?php 

class Author{
    public $id;
    public $fname;
    public $lname;
    public $image;
    
    public function __construct($_id,$_fname,$_lname,$_image){
        $this->id = $_id;
        $this->fname = $_fname;
        $this->lname = $_lname;
        $this->image = $_image;
    }

    function getFullName(){
        return ucfirst($this->fname) . " " . ucfirst($this->lname);
    }
}



?>