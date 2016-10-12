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
        $this->num_of_copies = $_num_of_copies;
        $this->page_count = $_page_count;
        $this->added_on = $_added_on;                
        $this->cover_image = $_cover_image;
        
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


class BookCheckout{
    public  $checkout_id;
    public  $checkout_date;
    public  $return_date;
    public  $isbn;
    public  $user_id;
    public  $admin_id;
    public  $is_returned;

    public function __construct($_id,$_date, $_return_date, $_isbn, $_userId, $_admin_id, $_isreturned){
        $this->checkout_id = $_id;
        $this->checkout_date = $_date;
        $this->return_date = $_return_date;
        $this->isbn= $_isbn;
        $this->user_id= $_userId;
        $this->admin_id = $_admin_id;
        $this->is_returned = $_isreturned;
    }

}

class BookShelfEntry{

    public $book;
    public $bookCheckout;
    public $status;

    public function __construct($_book ,$_bookcheckout,$_status){
        $this->book = $_book;
        $this->bookCheckout = $_bookcheckout; 
        $this->status = $_status;
    }
}

?>