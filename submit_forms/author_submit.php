<?php include_once('../config.php'); ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_SESSION['admin_detail'])) {
    include_once($paths['functions'] . '/sql_helpers.php');
    include_once($paths['functions'] . '/db_helper.php');
    include_once($paths['include'] . '/connection.php');

    $fname = fixString($_POST['fname']);
    $lname = fixString($_POST['lname']);        
    
    //check for empty values
    if(empty($fname) || empty($lname)){
        goToAddAuthorPage("Mandatory fields are missing.");
        exit();
    }
    include_once($paths['models'] . '/Author.php');

    //path for author images
    $target = $paths['images'] . '/authors/';

    if(isset($_POST['addAuthor']) && $_POST['addAuthor'] == "Add Author"){
       
        //insert the author
        $query_insert_user = "INSERT INTO `author` (`author_id`, `author_fname`, `author_lname`, `author_image`) VALUES (NULL, '$fname', '$lname', NULL)"; 
        $result_insert_user = mysqli_query($conn,$query_insert_user);

        $lastAuthorId = 0;        
        if(mysqli_affected_rows($conn) == 1){
             $lastAuthorId = mysqli_insert_id($conn);
        }elseif(mysqli_affected_rows($conn) == -1){
            goToAddAuthorPage("Failed to add author.");
            exit();
        }

        //first add the image 
        if(!isset($_FILES['authorImage'])){
            $imageName = "default.png";
        }else{
            $name = $_FILES['authorImage']['name'];
            $extension = substr($name,strripos($name,"."),strlen($name));
            $imageName = "author($lastAuthorId)$extension";
                if(count(glob($target . '/author('. $lastAuthorId . ').*')) >0){
                    array_map("unlink",glob($target . '/author('. $lastAuthorId . ').*'));
            }
            move_uploaded_file($_FILES['authorImage']['tmp_name'], $target . $imageName);
        }
        
        //update the author record

        $query_update_author = "UPDATE `author` SET `author_image`='$imageName' WHERE `author_id`='$lastAuthorId'"; 
        $result_update_author = mysqli_query($conn,$query_update_author);
        if(mysqli_affected_rows($conn) == 1){
             goToAddAuthorPage("Successfully adde a author.");
            exit();
        }else{
            goToAddAuthorPage("Failed to add author.");
            exit();
        }

    }else if(isset($_POST['saveAuthor']) && $_POST['saveAuthor'] == "Save Author" && isset($_POST['authorId'])){
        $oldAuthor = getAuthor($conn,$_POST['authorId']);

        $oldAuthor->fname = $fname;
        $oldAuthor->lname = $lname;

        //only if the there's a new image
        if(isset($_FILES['authorImage']) && !empty($_FILES['authorImage']['name'])){                
            $name = $_FILES['authorImage']['name'];
            $extension = substr($name,strripos($name,"."),strlen($name));
            $imageName = "author(".$oldAuthor->id.")$extension";
                if(count(glob($target . '/author('. $oldAuthor->id . ').*')) >0){
                array_map("unlink",glob($target . '/author('. $oldAuthor->id . ').*'));
            }
            move_uploaded_file($_FILES['authorImage']['tmp_name'], $target . $imageName);
            $oldAuthor->image = $imageName;
        }

        //now we can update the author
        $query_update_author = "UPDATE `author` SET `author_fname`='".$oldAuthor->fname."' ,`author_lname`='".$oldAuthor->lname."' ,`author_image`='".$oldAuthor->image."' WHERE `author_id`='".$oldAuthor->id."'"; 
        $result_update_author = mysqli_query($conn,$query_update_author);
        if(mysqli_affected_rows($conn) == 1 ){
             goToAddAuthorPage("Successfully updated the author.");
            exit();
        }else if(mysqli_affected_rows($conn) == 0 ){
             goToAddAuthorPage("Same details.");
            exit();
        }else{
            goToAddAuthorPage("Failed to update the author.");
            exit();
        }

    }else{
        goToErrorPage("Unauthorized Access!");
        exit();    
    }

}else{
    goToErrorPage("Unauthorized Access!");
    exit();
}

?>