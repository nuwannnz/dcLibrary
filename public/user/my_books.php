<?php require_once('../../config.php') ?>

<?php include_once($paths['include'] . '/logged_in_top.php') ?>


<?php
include_once($paths['functions'] . '/html_helper.php');
//if this is the first time user logged in 
// redirect to the profile pic upload page 
if($CurrentUser->image == null){
    goToProfilePicPage();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- links -->
        <?php include_once($paths['include'] . '/logged_in_links.php') ?>      
        <link href="<?php echo $header_paths['css'] . '/my-books-styles.css'; ?>" rel="stylesheet">
    </head>

    
 <body>
        
        <!-- top header -->
        <?php include_once($paths['include'] . '/logged_in_header.php') ?>

        
            
<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >
    
    <h2 style="margin:0px;padding:20px;">My Books</h2>

    <div class="tabs">

<?php $bookshelf = getBookShelfEntries($conn,$_SESSION['user_detail']); ?>

        <div class="tab-links">
            <ul> 
                <li> <a class="tablink" onclick="changeTab(event,0);" href="javascript: void(0);">Currently reading</a></li>                
                <li> <a class="tablink" onclick="changeTab(event,1);" href="javascript: void(0);">Completed</a></li>
                <li> <a class="tablink" onclick="changeTab(event,2);" href="javascript: void(0);">Bookshelf</a></li>
                <li> <a class="tablink" onclick="changeTab(event,3);" href="javascript: void(0);">Book list</a></li>
            </ul>            
        </div>
        
        <div class="tab-content-container">
            
            <div class="tab-content">
            <?php 
            //Currently reading 
              $currenlyReadingBooks = array(); 
                foreach($bookshelf as $book){                                        
                    if($book->status === "0"){
                        $currenlyReadingBooks[] = $book->book;
                    }
                }

                if(count($currenlyReadingBooks) > 0){
                    foreach ($currenlyReadingBooks as $currenlyReadingBook) {
                        printBook($currenlyReadingBook);
                    }
                }else{
                    echo "<p class=\"center-align-bl center-align-in\" style=\"padding-top:50px;\"> No books here...</p>";
                }
            ?>
                <div class="clearfix"></div>
            </div><!-- end of tab content 1-->

            <div class="tab-content">
                <?php
                //Completed books 
                $completedBooks = array(); 
                foreach($bookshelf as $book){                                        
                    if($book->status === "1"){
                        $completedBooks[] = $book->book;
                    }
                }

                if(count($completedBooks) > 0){
                    foreach ($completedBooks as $completedBook) {
                        printBook($completedBook);
                    }
                }else{
                    echo "<p class=\"center-align-bl center-align-in\" style=\"padding-top:50px;\"> No books here...</p>";
                }
                ?>
            </div><!-- end of tab content 2-->

            <div class="tab-content">
               
               <?php                
               
               
               //book shelf table
               echo "<table class=\"book-shelf\">";
                echo "<tr>";
                    echo "<th>Cover</th>";
                    echo "<th>Title</th>";
                    echo "<th>Checkout date</th>";
                    echo "<th>Return date</th>";
                    echo "<th>Overdue</th>";
                    echo "<th>Status</th>";

                echo "</tr>";
                
                foreach ($bookshelf as $bookshelf_entry) {
                    echo "<tr>";

                        //cover image
                        echo "<td>";
                            echo "<a href=\"". $header_paths['public'].'/book_detail.php?isbn='. $bookshelf_entry->book->isbn."\" >";
                            echo "<img src=\"". $header_paths['images'] .'/books/' .$bookshelf_entry->book->cover_image ."\" style=\"width:55px;height:80px;\" />";
                            echo "</a>";
                        echo "</td>";

                        //title
                        echo "<td>";
                            echo "<a style=\"text-decoration:none;color:#222;\" href=\"". $header_paths['public'].'/book_detail.php?isbn='. $bookshelf_entry->book->isbn."\" >";
                            echo "<p>". $bookshelf_entry->book->title ."</p>";
                            echo "</a>";
                        echo "</td>";

                        // date
                        echo "<td>";
                            echo "<p>". $bookshelf_entry->bookCheckout->checkout_date ."</p>";
                        echo "</td>";

                        //return date
                        echo "<td>";
                            echo "<p>". $bookshelf_entry->bookCheckout->return_date ."</p>";
                        echo "</td>";

                        //overdue
                        echo "<td>";                        
                            if($bookshelf_entry->bookCheckout->is_returned == 0){
                                if($bookshelf_entry->bookCheckout->return_date < strtotime(date("Y/m/d",time()))){
                                    echo "<p class=\"warning\">Yes</p>";
                                }
                            }else{
                                echo "<p>No</p>";
                            }
                        echo "</td>";

                        //status form
                        echo "<td>";
                            echo "<form action=\"". $header_paths['submit_forms'] . '/status_submit.php'."\" id=\"statusForm".$bookshelf_entry->book->isbn."\" method=\"POST\">";
                                echo "<select class=\"dropdown\" name=\"status\" onchange=\"submitStatusForm('".$bookshelf_entry->book->isbn."')\" >";
                                if($bookshelf_entry->status == null){
                                    echo "<option value=\"1\" selected>Want to read</option>";
                                    echo "<option value=\"2\" >Currently reading</option>";
                                    echo "<option value=\"3\" >Completed</option>";
                                }else if($bookshelf_entry->status == 0){
                                    echo "<option value=\"1\"  >Want to read</option>";
                                    echo "<option value=\"2\"  selected>Currently reading</option>";
                                    echo "<option value=\"3\"  >Completed</option>";
                                }else if($bookshelf_entry->status == 1){
                                    echo "<option value=\"1\" >Want to read</option>";
                                    echo "<option value=\"2\" >Currently reading</option>";
                                    echo "<option value=\"3\" selected>Completed</option>";
                                }
                                echo "</select>";
                                echo "<input type=\"hidden\" name=\"isbn\" value=\"". $bookshelf_entry->book->isbn."\"  />";
                            echo "</form>";
                        echo "</td>";


                    echo "</tr>";
                }
                

               echo "</table>";

            
               
               ?>
               <script>
                function submitStatusForm(isbn){
                    document.getElementById("statusForm"+isbn).submit();
                }
               </script>
            </div><!-- end of tab content 3-->

            <div class="tab-content">
            <?php 
               $bookList = getUserBookList($conn,$_SESSION['user_detail']);

                if(count($bookList)>0){                                
                    //book list table
                    echo "<table class=\"book-shelf\">";
                        echo "<tr>";
                            echo "<th>Cover</th>";
                            echo "<th>Title</th>";                            
                            echo "<th>Copies</th>";                            
                            echo "<th></th>";
                        echo "</tr>";
                        
                        foreach ($bookList as $book) {
                            echo "<tr>";

                                //cover image
                                echo "<td>";
                                    echo "<a href=\"". $header_paths['public'].'/book_detail.php?isbn='. $book->isbn."\" >";
                                    echo "<img src=\"". $header_paths['images'] .'/books/'. $book->cover_image ."\" style=\"width:55px;height:80px;\" />";
                                    echo "</a>";
                                echo "</td>";

                                //title
                                echo "<td>";
                                    echo "<a style=\"text-decoration:none;color:#222;\" href=\"". $header_paths['public'].'/book_detail.php?isbn='. $book->isbn."\" >";
                                    echo "<p>". $book->title ."</p>";
                                    echo "</a>";
                                echo "</td>";

                                // num of copies
                                echo "<td>";
                                    echo "<p>". $book->num_of_copies ."</p>";
                                echo "</td>";                           

                                //remove button                               
                                echo "<td>";
                                    echo "<form action=\"". $header_paths['submit_forms'] . '/book_list_submit.php'."\" id=\"bookListForm".$book->isbn."\" method=\"POST\">";

                                        echo "<input class=\"close-button\" name=\"addToList\" type=\"submit\" value=\"X\"  />";

                                        echo "<input type=\"hidden\" name=\"isbn\" value=\"". $book->isbn."\"  />";
                                        echo "<input type=\"hidden\" name=\"add\" value=\"0\"  />";
                                        echo "<input type=\"hidden\" name=\"return_location\" value=\"". $header_paths['public']. '/user/my_books.php?tab=3'."\"  />";

                                    echo "</form>";
                                echo "</td>";


                            echo "</tr>";
                        }
                        

                    echo "</table>";
                }else{
                     echo "<p class=\"center-align-bl center-align-in\" style=\"padding-top:50px;\"> No books here...</p>";
                }
               
            ?>
            </div><!-- end of tab content 4-->

           

        </div><!-- end of tab content container-->
        <script src="<?php echo $header_paths['js'] . '/tabcontrol.js'; ?>"></script>

    </div><!-- end of tabs-->
</div><!-- end of content container-->

        <!-- footer -->
        <?php include_once($paths['include'] . '/logged_in_footer.php') ?>
    </body>
</html>