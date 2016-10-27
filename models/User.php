<?php

class RegUser{
    public $id;
    public $fname;
    public $lname;        
    public $email;

    public function __construct($_id , $_fname ,$_lname,$_email){
        $this->id = $_id;
        $this->fname = $_fname;
        $this->lname = $_lname;        
        $this->email = $_email;                      
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

class User extends RegUser{
   
    public $image;
    public $score;

    public function __construct($_id , $_fname ,$_lname ,$_email,$_image, $_score){
        $this->id = $_id;
        $this->fname = $_fname;
        $this->lname = $_lname;
        $this->score = $_score;         
        $this->email = $_email;
        $this->image = $_image;
                      
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

/*
class User extends RegUser{
    public $id;
    private $fname;
    private $lname;
    public $image;
    public $score;
    public $email;

    public function __construct($_id , $_fname ,$_lname ,$_email,$_image, $_score){
        $this->id = $_id;
        $this->fname = $_fname;
        $this->lname = $_lname;
        $this->score = $_score;         
        $this->email = $_email;
        $this->image = $_image;              
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

 */