<?php include_once('../config.php') ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_SESSION['admin_detail'])) {
    
    if(isset($_POST['addBook']) || isset($_POST['saveBook']) ) {
        include_once($paths['functions'] . '/sql_helpers.php');
        include_once($paths['functions'] . '/db_helper.php');
        include_once($paths['include'] . '/connection.php');

         //check for empty input values;
         $isbn = fixString($_POST['isbn']);
         $title = fixString($_POST['title']);
         $description = fixString($_POST['description']);
         $authorIds  = fixString($_POST['authorIds']);
         $genre = fixString($_POST['genre']);
         $numOfCopies = fixString($_POST['numOfCopies']);
         $pageCount = fixString($_POST['pageCount']);
         $year = fixString($_POST['year']);

         if(empty($isbn)||
            empty($title)||
            empty($description)||
            empty($authorIds)||
            empty($genre)||
            empty($year)||
            empty($numOfCopies)||
            empty($pageCount)){
                goToAddBookPage("Mandatory fields are missing.");
                exit();
            }

        //path for cover images
        $target = $paths['images'] . '/books/';
        $authors = explode(",",$authorIds);
        array_pop($authors);

        if(isset($_POST['addBook']) && $_POST['addBook'] == "Add Book") {
            //add a new book            
            if(!checkIsbnExists($conn,$isbn)){
                //first add the cover image
                if(!isset($_FILES['coverImage'])){
                    goToAddBookPage("Cover image is mandatory.");
                    exit();
                }

                $name = $_FILES['coverImage']['name'];
                $extension = substr($name,strripos($name,"."),strlen($name));
                $imageName = "book($isbn)$extension";
                 if(count(glob($target . '/book('. $isbn . ').*')) >0){
                    array_map("unlink",glob($target . '/book('. $isbn . ').*'));
                }
                move_uploaded_file($_FILES['coverImage']['tmp_name'], $target . $imageName);


                $newBook = new Book(
                    $isbn,
                    $title,
                    $description,
                    $year,
                    $genre,
                    $authors,
                    0,
                    $imageName,
                    $numOfCopies,
                    $pageCount,
                    date("Y-m-d",time())
                );

                if(addNewBook($conn,$newBook)){
                    goToAddBookPage("Successfully added a new book.");
                    exit();
                }else{
                    goToAddBookPage("Failed to add the book.");
                    exit();
                }       
            }   
        }else if(isset($_POST['saveBook'])  && $_POST['saveBook'] == "Save Book"){
            $oldBook = getBook($conn,$isbn);

            $oldBook->title = $title;
            $oldBook->description = $description;
            $oldBook->genre_id;
            $oldBook->year = $year;
            $oldBook->author_ids = $authors;
            $oldBook->num_of_copies = $numOfCopies;
            $oldBook->page_count = $pageCount;

            //only if the there's a new image
            if(isset($_FILES['coverImage']) && !empty($_FILES['coverImage']['name'])){                
                $name = $_FILES['coverImage']['name'];
                $extension = substr($name,strripos($name,"."),strlen($name));
                $imageName = "book($isbn)$extension";
                 if(count(glob($target . '/book('. $isbn . ').*')) >0){
                    array_map("unlink",glob($target . '/book('. $isbn . ').*'));
                }
                move_uploaded_file($_FILES['coverImage']['tmp_name'], $target . $imageName);
                $oldBook->cover_image = $imageName;
            }

            if(updateBook($conn,$oldBook)){
                goToAddBookPage("Successfully updated the book.");
                exit();
            }else{
                goToAddBookPage("Failed to update the book.");
                exit();
            }

        }

    }



}else{
    goToErrorPage("Unauthorized Access!");
    exit();
}

?>