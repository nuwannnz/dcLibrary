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

function getAllRegUsers($conn){
    global $paths;
    include_once($paths['models'] . '/User.php');

    $query_select_reguser = "SELECT * FROM `registered_user`"; 
    $result_select_reguser = mysqli_query($conn,$query_select_reguser);
    $users = array();
    while($row_select_reguser = mysqli_fetch_assoc($result_select_reguser)){ 
         $users[] = new RegUser(
             $row_select_reguser['user_reg_id'],
             $row_select_reguser['fname'],
             $row_select_reguser['lname'],
             $row_select_reguser['email']             
         );
    };
    return $users;
}

function addRegisteredUser($conn,$regUser){
    global $paths;
    include_once($paths['models'] . '/User.php');

    $query_insert_user = "INSERT INTO `registered_user` (`user_reg_id`,`fname`,`lname`,`email`) VALUES(NULL,'".$regUser->fname."','".$regUser->lname."','".$regUser->email."')"; 
    $result_insert_user = mysqli_query($conn,$query_insert_user);
    if(mysqli_affected_rows($conn) == 1){
         return true;
    }else if(mysqli_affected_rows($conn) == -1){
        return false;
    }
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


function deleteRegisteredUser($conn,$userId){
    $query_delete_user = "DELETE FROM `registered_user` WHERE `user_reg_id`='$userId'"; 
    $result_delete_user = mysqli_query($conn,$query_delete_user);
    
    deleteUserAccount($conn,$userId);             
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
    $reviews = array();
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

function addNewBook($conn,$book){
    $query_insert_book = "INSERT INTO `book` (`isbn`, `book_title`, `book_description`, `published_year`, `genre_id`, `num_of_reads`, `cover_image`, `num_of_copies`, `page_count`, `added_date`) VALUES ('".$book->isbn."', '".$book->title."', '".$book->description."', '".$book->year."', '".$book->genre_id."', 0, '".$book->cover_image."', '".$book->num_of_copies."', '".$book->page_count."', '".date("Y-m-d",time())."')"; 
    $result_insert_book = mysqli_query($conn,$query_insert_book);
    if(mysqli_affected_rows($conn) == 1){
         //build up the author book relationships
         foreach ($book->author_ids as $author_id) {                        
            $query_insert_bookAuthor = "INSERT INTO `book_author` (`isbn`,`author_id`) VALUES('".$book->isbn."','$author_id')"; 
            $result_insert_bookAuthor = mysqli_query($conn,$query_insert_bookAuthor);
            if(mysqli_affected_rows($conn) == -1){
                return false;
            }
         }
         return true;
    }else{
        return false;
    }
}

function updateBook($conn,$book){
    $query_update_book = "UPDATE `book` SET `book_title`='".$book->title."', `book_description`='".$book->description."', `published_year`='".$book->year."',`genre_id`='".$book->genre_id."',`cover_image`='".$book->cover_image."',`num_of_copies`='".$book->num_of_copies."',`page_count`='".$book->page_count."' WHERE `isbn`='".$book->isbn."' "; 
    $result_update_book = mysqli_query($conn,$query_update_book);
    if(mysqli_affected_rows($conn) == 1 || mysqli_affected_rows($conn) == 0){
         //update author book relationship
         $oldIds = getAuthorIdsForBook($conn,$book->isbn);
         foreach ($book->author_ids as $author_id) {
             foreach ($oldIds as $oldId) {
                 if($oldId == $author_id){
                     continue;
                 }else{
                      //update a new record
                    $query_insert_bookAuthor = "INSERT INTO `book_author` (`isbn`,`author_id`) VALUES('".$book->isbn."','$author_id')"; 
                    $result_insert_bookAuthor = mysqli_query($conn,$query_insert_bookAuthor);
                    if(mysqli_affected_rows($conn) == -1){
                        return false;
                    }
                 }
            }                
         }
         return true;
    }else if(mysqli_affected_rows($conn) == -1){
        return false;
    }
}


function deleteBook($conn,$isbn){
    //delete from book table
    $query_delete_book = "DELETE FROM `book` WHERE `isbn`='$isbn'"; 
    $result_delete_book = mysqli_query($conn,$query_delete_book);
    if(mysqli_affected_rows($conn) == 1){
        //delete from book_author table
        $query_delete_bookAuthor = "DELETE FROM `book_author` WHERE `isbn`='$isbn'"; 
        $result_delete_bookAuthor = mysqli_query($conn,$query_delete_bookAuthor);
        if(mysqli_affected_rows($conn) != 1){
             $query_delete_bookReview = "DELETE FROM `review` WHERE `isbn`='$isbn' "; 
             $result_delete_bookReview = mysqli_query($conn,$query_delete_bookReview);
             if(mysqli_affected_rows($conn) != 1){
                  $query_delete_user_Book = "DELETE FROM `user_book_list` WHERE `isbn`='$isbn'"; 
                  $result_delete_user_Book = mysqli_query($conn,$query_delete_user_Book);
                  if(mysqli_affected_rows($conn) != 1){
                       return true;
                  }else{
                      return false;
                  }
             }
        }else{
            return false;
        }
    }else{
        return false;        
    }

}


function checkIsbnExists($conn,$isbn){
    
    if(!getBook($conn,$isbn)){
        return false;
    }else{
        return true;
    }
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

function getCheckout($conn,$isbn,$userId,$id=0){
    global $paths;
    include_once($paths['models']. '/Book.php');

    if($id == 0){
        $query_select_checkout = "SELECT * FROM `book_checkout` WHERE `isbn`='$isbn' AND `user_reg_id`='$userId'";    
    }else{
        $query_select_checkout = "SELECT * FROM `book_checkout` WHERE `checkout_id`='$id'"; 
    }
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


function getCheckin($conn,$id){
    global $paths;
    include_once($paths['models']. '/Book.php');

    $query_select_checkin = "SELECT * FROM `book_checkin` WHERE `checkin_id`='$id'"; 
    $result_select_checkin = mysqli_query($conn,$query_select_checkin);
    $row_select_checkin = mysqli_fetch_assoc($result_select_checkin);

    $checkin = new BookCheckin(
        $id,
        $row_select_checkin['checkout_id'],
        $row_select_checkin['admin_id'],
        $row_select_checkin['date']
    );
    return $checkin;
}

function addNewCheckin($conn,$checkin){
    global $paths;
    include_once($paths['models']. '/Book.php');

    $query_insert_checkin = "INSERT INTO `book_checkin` (`checkin_id`,`checkout_id`,`admin_id`,`date`) VALUES(NULL,'".$checkin->checkout_id."','".$checkin->admin_id."','".$checkin->checkin_date."')"; 
    $result_insert_checkin = mysqli_query($conn,$query_insert_checkin);
    

         //update the checkout
         $query_update_checkout = "UPDATE `book_checkout` SET `is_returned`=1 WHERE `checkout_id`='".$checkin->checkout_id."'"; 
         $result_update_checkout = mysqli_query($conn,$query_update_checkout);         
    
              //update user reads
              $checkout = getCheckout($conn,0,0,$checkin->checkout_id);
              $query_delete_user_read = "DELETE FROM `user_read` WHERE `isbn`='".$checkout->isbn."' AND `user_reg_id`='".$checkout->user_id."'"; 
              $result_delete_user_read = mysqli_query($conn,$query_delete_user_read);
              return true;
              /*
              if(mysqli_affected_rows($conn) == 1){
                   return true;
              }else if(mysqli_affected_rows($conn) == -1){
                  return false;
              }
              */
         
    
}

function getRecentCheckins($conn,$count=0){
    if($count>0){
        $query_select_checkin = "SELECT * FROM `book_checkin` ORDER BY `date` DESC LIMIT 0,$count"; 
    }else{
        $query_select_checkin = "SELECT * FROM `book_checkin` ORDER BY `date` DESC ";
    }
    $result_select_checkin = mysqli_query($conn,$query_select_checkin);
    $checkins = array();
    while($row_select_checkin = mysqli_fetch_assoc($result_select_checkin)){ 
         $checkins[] = getCheckin($conn,$row_select_checkin['checkin_id']);
    }
    return $checkins;
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
        $query_select_books = "SELECT `isbn` FROM `book` ORDER BY `added_date` DESC LIMIT 0,$count"; 
    }else if($count==0){
        $query_select_books = "SELECT `isbn` FROM `book` ORDER BY `added_date` DESC";
    }
    $result_select_books = mysqli_query($conn,$query_select_books);
    $books = array();
    while($row_select_books = mysqli_fetch_assoc($result_select_books)){ 
         $books[] = getBook($conn,$row_select_books['isbn']);
    };
    return $books;
}

function getAllAuthors($conn){
    $query_select_author = "SELECT `author_id` FROM `author`"; 
    $result_select_author = mysqli_query($conn,$query_select_author);
    $authors = array();
    while($row_select_author = mysqli_fetch_assoc($result_select_author)){ 
         $authors[] = getAuthor($conn,$row_select_author['author_id']);
    };
    return $authors;
}

function getAllGenres($conn){
    
    $query_select_genre = "SELECT `genre_id` FROM `genre`"; 
    $result_select_genre = mysqli_query($conn,$query_select_genre);
    $genres = array();
    while($row_select_genre = mysqli_fetch_assoc($result_select_genre)){ 
         $genres[] = getGenre($conn,$row_select_genre['genre_id']);
    };

    return $genres;
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

    //delete user book list
    $query_delete_userBookList = "DELETE FROM `user_book_list` WHERE `user_reg_id`='$userId'"; 
    $result_delete_userBookList = mysqli_query($conn,$query_delete_userBookList);    
    

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

function getAdmin($conn,$adminId){
    global $paths;
    include_once($paths['models'] . '/Admin.php');

    $query_select_admin = "SELECT `admin_name` FROM `admin` WHERE `admin_id`='$adminId'"; 
    $result_select_admin = mysqli_query($conn,$query_select_admin);
    $row_select_admin = mysqli_fetch_assoc($result_select_admin);
    $admin = new Admin($adminId,$row_select_admin['admin_name']);

    return $admin;
}

function getRecentCheckouts($conn,$count=0){
    global $paths;
    include_once($paths['models'] . '/Book.php');

    if($count >0){
        $query_select_checkout = "SELECT * FROM `book_checkout` ORDER BY `date` DESC LIMIT 0,$count";
    }else{
        $query_select_checkout = "SELECT * FROM `book_checkout` ORDER BY `date` DESC"; 
    }
    $result_select_checkout = mysqli_query($conn,$query_select_checkout);
    $checkouts = array();
    while($row_select_checkout = mysqli_fetch_assoc($result_select_checkout)){ 
        $checkouts[] = new BookCheckout(
            $row_select_checkout['checkout_id'],
            $row_select_checkout['date'],
            $row_select_checkout['return_date'],
            $row_select_checkout['isbn'],
            $row_select_checkout['user_reg_id'],
            $row_select_checkout['admin_id'],
            $row_select_checkout['is_returned']
        );
    };
    return $checkouts;
}

function addNewCheckout($conn,$checkout){
    global $paths;
    include_once($paths['models'] . '/Book.php');

    $query_insert_checkout = "INSERT INTO `book_checkout` (`checkout_id`, `admin_id`, `user_reg_id`, `isbn`, `date`, `return_date`, `is_returned`) VALUES (NULL, '".$checkout->admin_id."', '".$checkout->user_id."', '".$checkout->isbn."', '".$checkout->checkout_date."', '".$checkout->return_date."', '0')"; 
    $result_insert_checkout = mysqli_query($conn,$query_insert_checkout);
    if(mysqli_affected_rows($conn) == 1){
         return true;
    }else{
        return false;
    }
}

?>