<?php 
//this script contains helper functions to interact with the database


//this function will return a book object for the given isbn
function getBook($conn,$isbn){
    global $paths;
    include_once($paths['models'] . '/Book.php');

    $query_select_book = "SELECT * FROM `book` WHERE `isbn`='$isbn'";
    $result_select_book = mysqli_query($conn,$query_select_book);

    if(mysqli_num_rows($result_select_book) == 0){
        return false;
    }

    $row_select_book = mysqli_fetch_assoc($result_select_book);

    $book = new Book(
        $isbn,
        $row_select_book['book_title'],
        $row_select_book['book_description'],
        $row_select_book['published_year'],
        $row_select_book['genre_id'],
        getAuthorIdsForBook($conn,$isbn),
        $row_select_book['num_of_reads'],
        $row_select_book['cover_image'],
        $row_select_book['num_of_copies'],
        $row_select_book['page_count'],
        $row_select_book['added_date']
    );
    return $book;

}

//this function will return a User object for the given user id
function getUser($conn,$userId){
    global $paths;
    include_once($paths['models'] . '/User.php');

    $query_select_user = "SELECT `user_image`,`score` FROM `user` WHERE `user_reg_id`='$userId'";
    $result_select_user = mysqli_query($conn,$query_select_user);

    $row_select_user = mysqli_fetch_assoc($result_select_user);

    $query_select_reguser = "SELECT `fname`,`lname` FROM `registered_user` WHERE `user_reg_id`='$userId'";
    $result_select_reguser = mysqli_query($conn,$query_select_reguser);

    $row_select_reguser = mysqli_fetch_assoc($result_select_reguser);

    $user = new User(
        $userId,
        $row_select_reguser['fname'],
        $row_select_reguser['lname'],
        $row_select_user['user_image'],
        $row_select_user['score']
    );

    return $user;
    
}

//this will update the user image of the given id 
// with the given image 
function updateUserImage($conn,$userId,$image){

    $query_update_user = "UPDATE `user` SET `user_image`='$image' WHERE `user_reg_id`='$userId'";
    $result_update_user = mysqli_query($conn,$query_update_user);

    if(mysqli_affected_rows($conn) == 1){
        return true;
    }else{
        return false;
    }
}


function getAuthor($conn,$id){
    global $paths;
    include_once($paths['models'] . '/Author.php');

    $query_select_author = "SELECT * FROM `author` WHERE `author_id`='$id'"; 
    $result_select_author = mysqli_query($conn,$query_select_author);
    $row_select_author = mysqli_fetch_assoc($result_select_author); 
    $author = new Author(
        $id,
        $row_select_author['author_fname'],
        $row_select_author['author_lname'],
        $row_select_author['author_image']
    );
    
    return $author;
  
}


function getAuthorIdsForBook($conn,$isbn){
    $query_select_author_id = "SELECT `author_id` FROM `book_author` WHERE `isbn`='$isbn'";
    $result_select_author_id = mysqli_query($conn,$query_select_author_id);

    $ids = array();
    while ($row_select_author_id = mysqli_fetch_assoc($result_select_author_id)) {
        $ids[] = $row_select_author_id['author_id'];
    }

    return $ids;

}

function getGenre($conn,$id){
    global $paths;
    include_once($paths['models'] . '/Genre.php');

    $query_select_genre = "SELECT * FROM `genre` WHERE `genre_id`='$id'"; 
    $result_select_genre = mysqli_query($conn,$query_select_genre);
    $row_select_genre = mysqli_fetch_assoc($result_select_genre);
    $genre = new Genre(
        $id,
        $row_select_genre['genre_title']
    );
    return $genre;
  
}

function getRatingForBook($conn,$isbn){
    $query_select_avg_rating = "SELECT AVG(`rating`) AS avg_rating FROM `review` WHERE `isbn`='$isbn'"; 
    $result_select_avg_rating = mysqli_query($conn,$query_select_avg_rating);
    $row_select_avg_rating = mysqli_fetch_assoc($result_select_avg_rating);
    
    return round($row_select_avg_rating['avg_rating'],1);
}

function getReviewsForBook($conn,$isbn){
    global $paths;
    include_once($paths['models']. '/Review.php');

    $query_select_review = "SELECT * FROM `review` WHERE `isbn`='$isbn'"; 
    $result_select_review = mysqli_query($conn,$query_select_review);
    while($row_select_review = mysqli_fetch_assoc($result_select_review)){ 
         $reviews[] = new Review(
             $isbn,
             $row_select_review['user_reg_id'],
             $row_select_review['content'],
             $row_select_review['rating'],
             $row_select_review['date']
         );
    };

    return $reviews;
}




?>