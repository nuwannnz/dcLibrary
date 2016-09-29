<?php 

class Review{
    public $isbn;
    public $user_id;
    public $content;
    public $rating;
    public $date;

    public function __construct($_isbn,$_userId,$_content,$_rating,$_date){
        $this->isbn = $_isbn;
        $this->user_id = $_userId;
        $this->content = $_content;
        $this->rating = $_rating;
        $this->date = $_date;
    }    
}



?>