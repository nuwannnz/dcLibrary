<?php 

class Book{

   public $isbn;
   public $title;
   public $description;
   public $year;
   public $genre_id;
   public $author_ids;
   public $num_of_reads;
   public $cover_image;
   public $num_of_copies;
   public $page_count;
   public $added_on;


   public function __construct($_isbn,$_title,
                                $_description,
                                $_year,
                                $_genre_id,
                                $_author_ids,
                                $_num_of_reads,
                                $_cover_image,
                                $_num_of_copies,
                                $_page_count,
                                $_added_on){
                                
        $this->isbn = $_isbn;
        $this->title = $_title;
        $this->description = $_description;
        $this->year = $_year;
        $this->genre_id = $_genre_id;
        $this->author_ids = $_author_ids;
        $this->num_of_reads = $_num_of_reads;
        $this->cover_image = $_cover_image;
        $this->num_of_copies = $_num_of_copies;
        $this->page_count = $_page_count;
        $this->added_on = $_added_on;
    } 

    public function getNumOfReadsFormatted(){
        if($this->num_of_reads < 10000){
        return $this->num_of_reads;
    }else if( $this->num_of_reads > 10000 && $this->num_of_reads <1000000){
        return round($this->num_of_reads/1000,1) . "k";
    }else if( $this->num_of_reads >1000000 && $this->num_of_reads < 1000000000){
        return $this->num_of_reads/1000000 ."m";
    }
    }
} 

?>