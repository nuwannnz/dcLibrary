<?php 
//this script contains helper functions to interact with the database


//this function will return a book object for the given isbn
function getBook($conn,$isbn){

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


?>