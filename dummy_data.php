<?php 
//this script will add dummy test data to tht db

require_once('config.php');
require_once($paths['include'] . '/connection.php');


//createRegisteredUsers();
//createUsers();
//createAdmins();
//createAuthors();
//createGenres();
//createBooks();
//createBookAuthors();
//createBookCheckouts();
//createBookCheckins();
//createReviews();
//populateNumOfReads();

$description_text = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean porta ipsum at elit porta, at tempor nulla consectetur. Quisque eget libero ac mauris posuere aliquam nec non eros. Quisque turpis lorem";

//this function will create registered users
function createRegisteredUsers(){
    global $conn;

    $firstNames = array('john','peter','newman','kennedy','newton','clerk','cary','kennwood','brooke');
    $lastNames = array('james','wood','rowling','potter','jeny','madona','adele','rihana','perri','selena','chester');

    for( $i=1 ; $i<30 ; $i++ ){
        $user_email = "user_$i@email.com";
        $firstName = $firstNames[array_rand($firstNames)];
        $lastName = $lastNames[ array_rand($lastNames)];
        
        $query_insert_reguser = "INSERT INTO `registered_user` ( `fname`, `lname`, `email`) VALUES ('$firstName', '$lastName', '$user_email')";

        $result_insert_reguser = mysqli_query($conn,$query_insert_reguser);

        if(!mysqli_affected_rows($conn) > 0){
            echo "error in createing reg users";
        }
    }

}


//this function will create users 
function createUsers(){
    global $conn;
    $firstNames = array('john','peter','newman','kennedy','newton','clerk','cary','kennwood','brooke');
    
    for($i=1 ; $i<=16 ; $i++){
        $query_select_reguser = "SELECT `fname` FROM `registered_user` WHERE  `user_reg_id`='$i'";
        $result_select_reguser = mysqli_query($conn,$query_select_reguser);

        $row_select_reguser = mysqli_fetch_assoc($result_select_reguser);

        $username = $row_select_reguser['fname'] . $i;
        $password = sha1($row_select_reguser['fname'] . "1234");
        $score = 0;
        $user_image = "user($i).png";

        $query_insert_user = "INSERT INTO `user` (`user_reg_id`, `username`, `password`, `user_image`, `score`) VALUES ('$i','$username', '$password', '$user_image', '$score')";

        $result_insert_user = mysqli_query($conn,$query_insert_user);

        if(!mysqli_affected_rows($conn)>0){
            echo "error in creating users";
        }
    }

}

//this function will create admin/staff accounts
function createAdmins(){
    global $conn;
    $firstNames = array('john','peter');

     for($i=1 ; $i<=2 ;$i++){
         $name= $firstNames[array_rand($firstNames)];
         $uname = $name . $i;
         $pword = sha1($name . '1234');

         $query_insert_admin = "INSERT INTO `admin` (`admin_name`, `admin_username`, `admin_password`) VALUES ('$name', '$uname', '$pword')";

         $result_insert_admin = mysqli_query($conn,$query_insert_admin);

         if(!mysqli_affected_rows($conn)>0){
             echo "error in creating admins";
         }
     }

}


//this function will create Authors
function createAuthors(){
    global $conn;
    global $description_text;

    $firstNames = array('john','peter','newman','kennedy','newton','clerk','cary','kennwood');
    $lastNames = array('james','wood','rowling','potter','jeny','madona','adele','rihana','perri');

    for( $i=1 ; $i<=25 ; $i++ ){
        
        $author_fname = $firstNames[array_rand($firstNames)];
        $author_lname =$lastNames[array_rand($lastNames)];
        $author_image = "author(".$i.").png";

        $query_insert_tbl_authors = "INSERT INTO `author` (`author_fname`,`author_lname`,`author_description`,`author_image`) VALUES('$author_fname','$author_lname','$description_text','$author_image')";

        $result_insert_tbl_authors = mysqli_query($conn,$query_insert_tbl_authors);
        if(!$result_insert_tbl_authors){
            echo "error in creating authors";
        }
    }
}


//this function will create genres 
function createGenres(){
    global $conn;
    $genres = array('Science', 'fiction','Satire','Drama','Action and Adventure','Romance','Mystery','Horror','Guide','Travel',"Children's",'Religion', 'Spirituality & New Age','History','Anthology','Poetry','Encyclopedias','Comics','Art','Fantasy');

    foreach($genres as $genre){
        $query_insert_tbl_genre = "INSERT INTO `genre` (`genre_title`) VALUES('$genre')";
        $result_insert_tbl_genre = mysqli_query($conn,$query_insert_tbl_genre);

        if(!mysqli_affected_rows($conn) > 0){
            echo "Error in creating genres";
        }
    }
}


//this function will create books
function createBooks(){
    global $conn;
    global $description_text;

    $book_titles = array();

    $book_titles[] = 'The Curious Incident';
    $book_titles[] = 'The Dog In The Night Time';
    $book_titles[] = 'To Kill A Mockingbird';
    $book_titles[] = 'The Unbearable Lightness Of Being';
    $book_titles[] = 'Alexander And The Terrible';
    $book_titles[] = 'Horrible, No Good';
    $book_titles[] = 'A Confederacy Of Dunces';
    $book_titles[] = 'For Whom The Bell Tolls';
    $book_titles[] = 'Brave New World';
    $book_titles[] = 'The Lion, the Witch and the Wardrobe';
    $book_titles[] = 'She: A History of Adventure';
    $book_titles[] = 'Think and Grow Rich';
    $book_titles[] = 'Harry Potter and the Half-Blood Prince';
    $book_titles[] = 'The Adventures of Sherlock Holmes';
    $book_titles[] = 'Harry Potter and the Goblet of Fire';
    $book_titles[] = 'Harry Potter and the Deathly Hallows';
    $book_titles[] = 'Anne of Green Gables';
    $book_titles[] = 'The Eagle Has Landed';
    $book_titles[] = 'Watership Down';
    $book_titles[] = 'The Hobbit';
    $book_titles[] = 'The Odyssey';
    $book_titles[] = 'The Late, Great Planet Earth';
    $book_titles[] = 'Valley of the Dolls';
    $book_titles[] = 'Who Moved My Cheese?';
    $book_titles[] = 'The Wind in the Willows';
    $book_titles[] = 'The Hunger Games';
    $book_titles[] = 'The Godfather';
    $book_titles[] = 'Jaws';
    $book_titles[] = 'What to Expect';
    $book_titles[] = 'The Adventures of Huckleberry Finn';
    $book_titles[] = 'Pride and Prejudice';

    $years = array();
    $years[] = '1990';
    $years[] = '1993';
    $years[] = '1994';
    $years[] = '1995';
    $years[] = '1996';
    $years[] = '1997';
    $years[] = '1998';
    $years[] = '2000';
    $years[] = '2004';
    $years[] = '2005';
    $years[] = '2010';

    for ($i=1; $i < 30; $i++) { 
        $isbn = mt_rand(10000,99999)+mt_rand(10000,99999);
        $Title = $book_titles[$i];        
        $published_year = $years[array_rand($years)];
        $genre_id = mt_rand(1,19);        
        $cover_iamge = "book(". $i .").png";
        $num_copies = mt_rand(0,10);
        $page_count = mt_rand(200,900);
        $added_date = date("Y-m-d",time() - mt_rand(10000,500000));
        

        $query_insert_tbl_book = "INSERT INTO `book` (`isbn`, `book_title`, `book_description`,`published_year`, `genre_id`, `num_of_reads`, `cover_image`, `num_of_copies`, `page_count`, `added_date`) VALUES ('$isbn', '$Title', '$description_text', '$published_year', '$genre_id', '0', '$cover_iamge', '$num_copies', '$page_count', '$added_date')";

        $result_insert_tbl_book = mysqli_query($conn,$query_insert_tbl_book);

        if(!$result_insert_tbl_book){
            echo "error in creating books";
        }
    }

}

//this function will create author book relationship data
function createBookAuthors(){
    global $conn;
    $query_select_book  = "SELECT `isbn` FROM `book`";
    $result_select_book = mysqli_query($conn,$query_select_book);

    $i = 0;
    while ($row_select_book = mysqli_fetch_assoc($result_select_book)) {
        $isbn = $row_select_book['isbn'];
        $author_id = mt_rand(1,26);
        $query_insert_bookAuthor = "INSERT INTO `book_author` (`isbn`,`author_id`) VALUES('$isbn','$author_id')";

        $result_insert_bookAuthor = mysqli_query($conn,$query_insert_bookAuthor);

        if(!mysqli_affected_rows($conn) > 0){
            echo "error in creating book authors";
        }

        //just some multiple authors for the same book
        if($i == 5 || $i == 9 || $i == 15){
            $isbn = $row_select_book['isbn'];
            $author_id = mt_rand(1,26);
            $query_insert_bookAuthor = "INSERT INTO `book_author` (`isbn`,`author_id`) VALUES('$isbn','$author_id')";

            $result_insert_bookAuthor = mysqli_query($conn,$query_insert_bookAuthor);

            if(!mysqli_affected_rows($conn) > 0){
                echo "error";
            }   
        }
        $i++;
    }

}

function createBookCheckouts(){
    global $conn;

    $reg_user_ids = getRegisteredUsersId();
    $isbns = getIsbns();

    for ($i=0; $i < 30; $i++) { 
        $admin_id = mt_rand(1,2);
        $user_reg_id = $reg_user_ids[array_rand($reg_user_ids)];
        $isbn = $isbns[array_rand($isbns)];
        $date = date("Y-m-d", time() -mt_rand(250000 , 500000) );
        $return_date = date("Y-m-d",time() -mt_rand(100000,200000) );
        $is_returned = 0;

        $query_insert_bookCheckouts = "INSERT INTO `book_checkout` (`checkout_id`, `admin_id`, `user_reg_id`, `isbn`, `date`, `return_date`, `is_returned`) VALUES (NULL, '$admin_id', '$user_reg_id', '$isbn', '$date', '$return_date', '$is_returned')";

        $result_insert_bookCheckouts = mysqli_query($conn, $query_insert_bookCheckouts);

        if(!mysqli_affected_rows($conn) > 0){ echo "Error in inserting book checkouts";}

        //if the user has a online account we have to add this book into the user reads table
        if(isUserExists($user_reg_id)){
            $query_insert_book_read = "INSERT INTO `user_read` (`user_reg_id`, `isbn`, `is_completed`) VALUES ('$user_reg_id', '$isbn', NULL)";
            $result_insert_book_read = mysqli_query($conn,$query_insert_book_read);

            if(!mysqli_affected_rows($conn) > 0){
                echo "Error in inserting into user reads"; 
            }
        }
    }

//this function will create book checkins
function createBookCheckins(){
    global $conn;

    $checkout_ids = getCheckoutIds();
    
    for ($i=0; $i < 12; $i++) { 
        $checkout_id = $checkout_ids[mt_rand(0,count($checkout_ids)-1)];
        //remove the above id from the array. So we don't use the same id twice
        removeElementFromArray($checkout_ids,$checkout_id);

        $date = date("Y-m-d", time() - mt_rand(100000,200000));

        $query_insert_checkin = "INSERT INTO `book_checkin` (`checkin_id`, `checkout_id`, `date`) VALUES (NULL, '$checkout_id', '$date')";
        $result_insert_checkin = mysqli_query($conn,$query_insert_checkin);

        if(!mysqli_affected_rows($conn) > 0){
            echo "error in inserting checkin";
        }

        //update the checkout
        $query_update_checkout = "UPDATE `book_checkout` SET `is_returned`='1' WHERE `checkout_id`='$checkout_id'";
        $result_update_checkout = mysqli_query($conn,$query_update_checkout);

        if(!mysqli_affected_rows($conn) > 0){
            echo "error in updating checkout";
        }

        

    }
}


}

//this function will create reviews for books
function createReviews(){
    global $conn;
    global $description_text;

    //get isbns
    $isbns = getIsbns();
    //get user ids
    $userIds = getUserIds();

    foreach ($isbns as $isbn ) {
        $i = mt_rand(1,5);
        for ($i=1; $i <=5; $i++) { 
            $userid = $userIds[array_rand($userIds)];
            if($userid == $last_userid) { $userid = $userIds[array_rand($userIds)];}
            $rating = mt_rand(1,5);
            $date = date("Y-m-d", time() - mt_rand(900000,9000000));

            $query_insert_review = "INSERT INTO `review` (`isbn`,`user_reg_id`,`content`,`rating`,`date`) VALUES ('$isbn','$userid','$description_text', '$rating','$date')"; 
            $result_insert_review = mysqli_query($conn,$query_insert_review);
            if(mysqli_affected_rows($conn) != 1){
                echo "failed to add review";
            }
            $last_userid = $userid;
        }
    }

}


function randomizeUserReads(){
    global $conn;

    $query_select_user_reads = "SELECT * FROM `user_read`"; 
    $result_select_user_reads = mysqli_query($conn,$query_select_user_reads);

    $user_reads = array();
    while($row_select_user_reads = mysqli_fetch_assoc($result_select_user_reads)){ 
         $user_reads[] = array(
             "userId" => $row_select_user_reads['user_reg_id'],
             "isbn" => $row_select_user_reads['isbn'],
         );
    };
    $completed_values = ["'1'","'0'",'NULL'];
    foreach ($user_reads as $user_read) {
        $isCompleted = $completed_values[array_rand($completed_values)];

        $query_update_user_reads = "UPDATE `user_read` SET `is_completed`=$isCompleted WHERE `user_reg_id`='". $user_read['userId'] ."' AND `isbn`='". $user_read['isbn']."'"; 
        $query_update_user_reads = mysqli_query($conn,$query_update_user_reads);
        if(mysqli_affected_rows($conn) == -1){
             echo "Failed to update user read";
        }
    }

}

function populateNumOfReads(){
    global $conn;
    
    $query_select_books = "SELECT `isbn` FROM `book`"; 
    $result_select_books = mysqli_query($conn,$query_select_books);
    while($row_select_books = mysqli_fetch_assoc($result_select_books)){
         $numOfReads = mt_rand(0,400); 
         $query_update_reads = "UPDATE `book` SET `num_of_reads`='$numOfReads' WHERE `isbn`='".$row_select_books['isbn']."'"; 
         $result_update_reads = mysqli_query($conn,$query_update_reads);
         if(mysqli_affected_rows($conn) != 1){
              echo "failed to update user reads";
         }
    };
}

//helper functions 

function getRegisteredUsersId(){
    global $conn;

    $query_select_regusers = "SELECT `user_reg_id` FROM `registered_user`";
    $result_select_regusers = mysqli_query($conn,$query_select_regusers);

    $reg_users = array();
    while ($row_select_regusers = mysqli_fetch_assoc($result_select_regusers)) {
        array_push($reg_users,$row_select_regusers['user_reg_id']);
    }
    return $reg_users;
}


function getUserIds(){
    global $conn;

    $query_select_user = "SELECT `user_reg_id` FROM `user`"; 
    $result_select_user = mysqli_query($conn,$query_select_user);
    while($row_select_user = mysqli_fetch_assoc($result_select_user)){ 
         $user_ids[] = $row_select_user['user_reg_id'];
    };
    return $user_ids;
}

function getIsbns(){
    global $conn;

    $query_select_isbn = "SELECT `isbn` FROM `book`";
    $result_select_isbn  = mysqli_query($conn,$query_select_isbn);

    $isbns = array();
    while ($row_select_isbn = mysqli_fetch_assoc($result_select_isbn)) {
        array_push($isbns,$row_select_isbn['isbn']);
    }    
    return $isbns;
}

function isUserExists($user_reg_id){
    global $conn;

    $query_select_user = "SELECT `user_reg_id` FROM `user` WHERE `user_reg_id`='$user_reg_id'";
    $result_select_user = mysqli_query($conn,$query_select_user);

    if(mysqli_num_rows($result_select_user) == 1){
        return true;
    }else{
        return false;
    }
}

function getCheckoutIds(){
    global $conn;

    $query_select_checkout = "SELECT `checkout_id` FROM `book_checkout`";
    $result_select_checkout  = mysqli_query($conn,$query_select_checkout);

    $checkouts = array();
    while ($row_select_checkouts = mysqli_fetch_assoc($result_select_checkout)) {
        array_push($checkouts,$row_select_checkouts['checkout_id']);
    }

    return $checkouts;
}

function removeElementFromArray(&$array ,$element){
    foreach ($array as $key => $value) {
        if($value === $element){
            array_splice($array,$key,1);
        }
    }    
}

?>