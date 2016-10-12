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

    $query_select_reguser = "SELECT `fname`,`lname`,`email` FROM `registered_user` WHERE `user_reg_id`='$userId'";
    $result_select_reguser = mysqli_query($conn,$query_select_reguser);

    $row_select_reguser = mysqli_fetch_assoc($result_select_reguser);

    $user = new User(
        $userId,
        $row_select_reguser['fname'],
        $row_select_reguser['lname'],
        $row_select_reguser['email'],
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

function addReview($conn,$review){
    $query_insert_review = "INSERT INTO `review` (`isbn`,`user_reg_id`,`content`,`rating`,`date`) VALUES('".$review->isbn."','".$review->user_id."' ,'".$review->content."','".$review->rating."', '". $review->date."' )"; 
    $result_insert_review = mysqli_query($conn,$query_insert_review);
    $m = mysqli_affected_rows($conn);
    if(mysqli_affected_rows($conn) != 1){
         return false;
    }
    return true;
}


function isBookListContainsBook($conn,$isbn,$userId){
    $query_select_bookList = "SELECT `isbn` FROM `user_book_list` WHERE `isbn`='$isbn' AND `user_reg_id`='$userId'"; 
    $result_select_bookList = mysqli_query($conn,$query_select_bookList);
    
    if(mysqli_num_rows($result_select_bookList) == 1){
        return true;
    }else{
        return false;
    }

}

function addBookToList($conn,$isbn,$userId){
    $query_insert_bookList = "INSERT INTO `user_book_list` (`isbn`,`user_reg_id`) VALUES('$isbn','$userId')"; 
    $result_insert_bookList = mysqli_query($conn,$query_insert_bookList);
    if(mysqli_affected_rows($conn) != 1){
         return false;
    }
    return true;    
}

function removeFromBookList($conn,$isbn,$userId){
    $query_delete_bookList = "DELETE FROM `user_book_list` WHERE `isbn`='$isbn' AND `user_reg_id`='$userId'"; 
    $result_delete_bookList = mysqli_query($conn,$query_delete_bookList);
    if(mysqli_affected_rows($conn) != 1){
        return false;
    }
    return true; 
}


function getBooksOfAuthor($conn,$id){
    $query_select_books = "SELECT `isbn` FROM `book_author` WHERE `author_id`='$id'"; 
    $result_select_books = mysqli_query($conn,$query_select_books);
    while($row_select_books = mysqli_fetch_assoc($result_select_books)){ 
         $books[] = getBook($conn,$row_select_books['isbn']);
    };

    return $books;
}


function getBookShelfEntries($conn,$userId){
    global $paths;
    include_once($paths['models']. '/Book.php');

    $query_select_user_read = "SELECT * FROM `user_read` WHERE `user_reg_id`='$userId'"; 
    $result_select_user_read = mysqli_query($conn,$query_select_user_read);
    $userReads = array();
    while($row_select_user_read = mysqli_fetch_assoc($result_select_user_read)){ 
         $userReads[] = new BookShelfEntry(
             getBook($conn,$row_select_user_read['isbn']),
             getCheckout($conn,$row_select_user_read['isbn'],$row_select_user_read['user_reg_id']),
             $row_select_user_read['is_completed']
         );
    };

    return $userReads;

}

function getCheckout($conn,$isbn,$userId){
    global $paths;
    include_once($paths['models']. '/Book.php');

    $query_select_checkout = "SELECT * FROM `book_checkout` WHERE `isbn`='$isbn' AND `user_reg_id`='$userId'"; 
    $result_select_checkout = mysqli_query($conn,$query_select_checkout);
    $row_select_checkout = mysqli_fetch_assoc($result_select_checkout);

    $checkout = new BookCheckout(
        $row_select_checkout['checkout_id'],
        $row_select_checkout['date'],
        $row_select_checkout['return_date'],
        $row_select_checkout['isbn'],
        $row_select_checkout['user_reg_id'],
        $row_select_checkout['admin_id'],
        $row_select_checkout['is_returned']
    );
    return $checkout;
}

function getUserBookList($conn,$userId){
    $query_select_booklist = "SELECT * FROM `user_book_list` WHERE `user_reg_id`='$userId'"; 
    $result_select_booklist = mysqli_query($conn,$query_select_booklist);
    $list = array();
    while($row_select_booklist = mysqli_fetch_assoc($result_select_booklist)){ 
         $list[] = getBook($conn,$row_select_booklist['isbn']);
    };
    return $list;
}

function getTopBooks($conn,$count){
    $query_select_topbooks = "SELECT `isbn` , avg(`rating`) as `avg_rating` FROM `review` GROUP BY `isbn` ORDER BY `avg_rating` DESC LIMIT 0,$count"; 
    $result_select_topbooks = mysqli_query($conn,$query_select_topbooks);
    $books = array();
    while($row_select_topbooks = mysqli_fetch_assoc($result_select_topbooks)){ 
         $books[] = getBook($conn,$row_select_topbooks['isbn']);
    };
    return $books;
}

function getTopAuthors($conn,$count){
    
    $query_select_top_reads = "SELECT `isbn` FROM `book` ORDER BY `num_of_reads` DESC LIMIT 0,$count"; 
    $result_select_top_reads = mysqli_query($conn,$query_select_top_reads);
    $authors = array();
    while($row_select_top_reads = mysqli_fetch_assoc($result_select_top_reads)){ 
         $query_select_author = "SELECT `author_id` FROM `book_author` WHERE `isbn`='". $row_select_top_reads['isbn']."' "; 
         $result_select_author = mysqli_query($conn,$query_select_author);
         while($row_select_author = mysqli_fetch_assoc($result_select_author)){ 
             $authors[] = getAuthor($conn,$row_select_author['author_id']);
         };
    };
    return $authors;
}

function getAllBooks($conn,$count=0){
    if($count > 0 ){
        $query_select_books = "SELECT `isbn` FROM `book` LIMIT 0,$count"; 
    }else if($count==0){
        $query_select_books = "SELECT `isbn` FROM `book`";
    }
    $result_select_books = mysqli_query($conn,$query_select_books);
    $books = array();
    while($row_select_books = mysqli_fetch_assoc($result_select_books)){ 
         $books[] = getBook($conn,$row_select_books['isbn']);
    };
    return $books;
}

function checkUsernameExists($conn,$uname){
    $query_select_username = "SELECT COUNT(`user_reg_id`) AS `userCount` FROM `user` WHERE `username`='$uname' "; 
    $result_select_username = mysqli_query($conn,$query_select_username);
    $row_select_username = mysqli_fetch_assoc($result_select_username);

    if($row_select_username['userCount'] == 0){
        return true;
    }else{
        return false;
    }
}

function updateUsername($conn,$userId,$uname){

    $query_update_username = "UPDATE `user` SET `username`='$uname' WHERE `user_reg_id`='$userId'"; 
    $result_update_username = mysqli_query($conn,$query_update_username);
    if(mysqli_affected_rows($conn) != 1){
         return false;
    }
    return true;
}

function checkUserPassword($conn,$userId,$pword){
    $query_select_pword = "SELECT COUNT(`user_reg_id`) as `userCount` FROM `user` WHERE `user_reg_id`='$userId' AND `password`='". sha1($pword) ."'"; 
    $result_select_pword = mysqli_query($conn,$query_select_pword);
    $row_select_pword = mysqli_fetch_assoc($result_select_pword);

    if($row_select_pword['userCount'] == 1){
        return true;
    }else{
        return false;
    }
}

function updatePassword($conn,$userId,$pword){
    $query_update_pword = "UPDATE `user` SET `password`='". sha1($pword)."' WHERE `user_reg_id`='$userId'"; 
    $result_update_pword = mysqli_query($conn,$query_update_pword);
    if(mysqli_affected_rows($conn) != 1){
         return false;
    }
    return true;
}

function checkEmailExists($conn,$email){
    $query_select_email = "SELECT COUNT(`user_reg_id`) as emailCount FROM `registered_user` WHERE `email`='$email'"; 
    $result_select_email = mysqli_query($conn,$query_select_email);
    $row_select_email = mysqli_fetch_assoc($result_select_email);

    if($row_select_email['emailCount'] == 1){
        return true;
    }else{
        return false;
    }
}

function updateUserDetails($conn,$userId,$fname,$lname,$email){
    $query_update_userDetails = "UPDATE `registered_user` SET `fname`='$fname' , `lname`='$lname' , `email`='$email' WHERE `user_reg_id`='$userId'"; 
    $result_update_userDetails = mysqli_query($conn,$query_update_userDetails);
    if(mysqli_affected_rows($conn) == 1){
         return "Updated details successfully";
    }else if(mysqli_affected_rows($conn) == 0){
        return "Same information";
    }else if(mysqli_affected_rows($conn) == -1){
        return "Failed to update user details";
    }
}

function deleteUserAccount($conn,$userId){
    //delete user
    $query_delete_user = "DELETE FROM `user` WHERE `user_reg_id`='$userId'"; 
    $result_delete_user = mysqli_query($conn,$query_delete_user);
    $row_delete_user = mysqli_fetch_assoc($result_delete_user);

    //delete user book list
    $query_delete_userBookList = "DELETE FROM `user_book_list` WHERE `user_reg_id`='$userId'"; 
    $result_delete_userBookList = mysqli_query($conn,$query_delete_userBookList);
    $row_delete_userBookList = mysqli_fetch_assoc($result_delete_userBookList);
    

}

function getQueryBooks($conn,$term){
    $query_select_book = "SELECT `isbn` FROM `book` WHERE `book_title` LIKE '%".$term ."%' "; 
    $result_select_book = mysqli_query($conn,$query_select_book);
    $books = array();
    while($row_select_book = mysqli_fetch_assoc($result_select_book)){ 
         $books[] = getBook($conn,$row_select_book['isbn']);
    };

    return $books;
}

function getQueryAuthors($conn,$term){
    $query_select_author = "SELECT `author_id` FROM `author` WHERE `author_fname` LIKE '%". $term ."%' OR `author_lname` LIKE '%". $term ."%' "; 
    $result_select_author = mysqli_query($conn,$query_select_author);
    $authors = array();
    while($row_select_author = mysqli_fetch_assoc($result_select_author)){ 
         $authors[] = getAuthor($conn,$row_select_author['author_id']);
    };
    return $authors;
}

?>