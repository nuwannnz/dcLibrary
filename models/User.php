<?php

class User{
    public $id;
    private $fname;
    private $lname;
    public $image;
    public $score;

    public function __construct($_id , $_fname ,$_lname ,$_image, $_score){
        $this->id = $_id;
        $this->fname = $_fname;
        $this->lname = $_lname;
        $this->image = $_image;
        $this->score = $_score;         
    }

    public function getFullName(){
        return ucfirst($this->fname) . ' ' . ucfirst($this->lname);
    }

    public function getFName(){
        return ucfirst($this->fname);
    }

    public function getLName(){
        return ucfirst($this->lname);
    }
}



 ?>