<?php require_once('../../config.php') ?>
<?php require_once($paths['include'] . '/admin_top.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once($paths['include'] . '/admin_links.php') ?>        
        <link href="<?php echo $header_paths['css'] . '/input-styles.css'; ?>" rel="stylesheet">    

        <style>
            label{
                margin-top:10px;
                display:block;
            }
            .select-wrapper{
                display:inline-block;
                width:200px;
                height:80px;                
            }
            select{
                margin-top:10px;
                padding:5px;
            }            
        </style>        
    </head>

    
<?php require_once($paths['include'] . '/admin_header.php') ?>

<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >

<?php 

if(isset($_GET['isbn'])) {
    echo "<h2>Edit book ( isbn:".$_GET['isbn']." )</h2>";
    $CurrentBook = getBook($conn,$_GET['isbn']);
}else{
    echo "<h2>Add a book</h2>";
    $CurrentBook = null;
}

 
//error message
if(isset($_GET['message'])){
    $message = urldecode(base64_decode($_GET['message']));
echo <<<ERROR_MESSAGE
    <div class="error-message-container center-align-bl">
        <p  style="margin:0px;">$message</p>
    </div>
ERROR_MESSAGE;
}



?>

<form action="<?php echo $header_paths['submit_forms'] .'/book_submit.php' ?>" method="POST" onsubmit="return onAdd();" enctype="multipart/form-data"" >
    <?php
     if($CurrentBook == null){
        echo "<label for=\"isbn\">Isbn</label>";
        echo "<input type=\"number\" name=\"isbn\" value=\"\"  >";
     }else{
         echo "<input type=\"hidden\" name=\"isbn\" value=\"".$CurrentBook->isbn."\"  >";
     }
    ?>

    <label for="title">Book title</label>
    <input type="text" name="title" value="<?php print($CurrentBook==null ? '' : $CurrentBook->title) ?>">

    <label for="description">Book description</label>
    <textarea name="description" style="min-height:70px;">
        <?php print($CurrentBook==null ? '' : $CurrentBook->description) ?>
    </textarea>

<?php 
    echo "<div id=\"authorContainer\" style=\"margin-top:20px;\">";
if($CurrentBook != null){
    
    $num = 1;
    foreach ($CurrentBook->author_ids as $author_id) {
        echo "<div class=\"select-wrapper\">";
            echo "<label for=\"author$num\">Author $num</label>";
            echo "<select class=\"author\" name=\"author\" id=\"author$num\">";
                
                    $authors = getAllAuthors($conn);
                        echo "<option value=\"0\"\">none</option>";
                    foreach ($authors as $author) {
                        if($author->id == $author_id){
                            echo "<option value=\"". $author->id ."\" selected=\"selected\">". $author->getFullName()."</option>";        
                        }else{
                            echo "<option value=\"". $author->id ."\">". $author->getFullName()."</option>";
                        }
                    }
                
            echo "</select>";
        echo "</div>";
        $num++;
    }


    // an empty one
    echo "<div id=\"emptyAuthor\" class=\"select-wrapper\">";
            echo "<label for=\"author$num\">Author $num</label>";
            echo "<select class=\"author\" name=\"author$num\" id=\"author$num\" onchange=\"onAuthorSelect();\">";
                
                    $authors = getAllAuthors($conn);
                        echo "<option value=\"0\"\">none</option>";
                    foreach ($authors as $author) {                        
                            echo "<option value=\"". $author->id ."\">". $author->getFullName()."</option>";                        
                    }
                
            echo "</select>";
    echo "</div>";
/*
for ($i=1; $i <=3 ; $i++) { 
        echo "<div class=\"select-wrapper\">";
            echo "<label for=\"author$i\">Author $i</label>";
            echo "<select name=\"author$1\" id=\"author$i\">";
                
                    $authors = getAllAuthors($conn);
                        echo "<option value=\"0\"\">none</option>";
                    foreach ($authors as $author) {
                        echo "<option value=\"". $author->id ."\">". $author->getFullName()."</option>";
                    }
                
            echo "</select>";
        echo "</div>";

}
echo "</div>";
*/
}else{
     echo "<div id=\"emptyAuthor\" class=\"select-wrapper\">";                        
                echo "<label for=\"author\">Author 1</label>";
                echo "<select class=\"author\" name=\"author\" id=\"author1\" onchange=\"onAuthorSelect();\">";
                    
                        $authors = getAllAuthors($conn);
                            echo "<option value=\"0\"\">none</option>";
                        foreach ($authors as $author) {
                            echo "<option value=\"". $author->id ."\">". $author->getFullName()."</option>";
                        }
                    
                echo "</select>";
            echo "</div>";

    
}

echo "</div>";

    echo  "<label for=\"genre\" >Genre</label>";
    echo "<select name=\"genre\" id=\"genre\">";
            
                $genres = getAllGenres($conn);                         
if($CurrentBook != null){
                foreach ($genres as $genre) {
                    if($CurrentBook->genre_id == $genre->id){
                        echo "<option value=\"". $genre->id ."\" selected=\"selected\">". $genre->name."</option>";
                    }else{
                        echo "<option value=\"". $genre->id ."\">". $genre->name."</option>";
                    }
                }        
}else{
                foreach ($genres as $genre) {
                        echo "<option value=\"". $genre->id ."\">". $genre->name."</option>";
                    
                }
}
    echo "</select>";

?>
<input type="hidden" name="authorIds" id="authorIds" value="">

<script>
    var authorTemplate,authorContainer;
    this.onload = function(){
        authorTemplate = document.getElementById('emptyAuthor');
        authorContainer = document.getElementById('authorContainer');
    }
    function onAuthorSelect($authorId){
        var wrappers =document.getElementsByClassName('select-wrapper');
        var authorSelects = document.getElementsByClassName('author');
        for(var i =0;i<authorSelects.length;i++){
            if(authorSelects[i].value == 0){
                return ;
            }else{
                continue;
            }
        }
        var clonedTemplate = authorTemplate.cloneNode(true);
        var count = wrappers.length + 1;
        clonedTemplate.firstChild.innerHTML = "Author "+ count; 
        authorContainer.appendChild(clonedTemplate);
        
    }

    function onAdd(){
        var authorSelects = document.getElementsByClassName('author');
        var authorIds = document.getElementById('authorIds');
        for(var i=0; i<authorSelects.length; i++){
            if(authorSelects[i].value != 0){
                authorIds.value += authorSelects[i].value + ',';
            }
        }
        return true;
    }
</script>

    <label for="numOfCopies">Number of copies</label>
    <input type="number" name="numOfCopies" value="<?php print($CurrentBook==null ? '1' : $CurrentBook->num_of_copies) ?>">

    <label for="year">Year</label>
    <input type="number" min="1900" max="9999"  name="year" value="<?php print($CurrentBook==null ? '1' : $CurrentBook->year) ?>">

    <label for="pageCount">Number of pages</label>
    <input type="number" name="pageCount" value="<?php print($CurrentBook==null ? '1' : $CurrentBook->page_count) ?>">

    <label for="coverImage">Cover image</label>
    <input type="file" name="coverImage" id="coverImage" accept="image/png,image/jpeg" style="font-size:15px;">

    <?php 
    
    if($CurrentBook == null){
        echo "<input type=\"submit\" name=\"addBook\" value=\"Add Book\">"; 
    }else{
        echo "<input type=\"submit\" name=\"saveBook\" value=\"Save Book\">";
    }
    
    ?>    
</form>

    
</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php') ?>
           