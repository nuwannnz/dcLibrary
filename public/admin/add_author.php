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
            
        </style>        
    </head>

    
<?php require_once($paths['include'] . '/admin_header.php') ?>

<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >

<?php 

if(isset($_GET['id'])) {
    echo "<h2>Edit author ( Author id:".$_GET['id']." )</h2>";
    $CurrentAuthor = getAuthor($conn,$_GET['id']);
}else{
    echo "<h2>Add a author</h2>";
    $CurrentAuthor = null;
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

<form action="<?php echo $header_paths['submit_forms'] .'/author_submit.php' ?>" method="POST" onsubmit="return onAdd();" enctype="multipart/form-data" >
    <?php
     if($CurrentAuthor != null){     
         echo "<input type=\"hidden\" name=\"authorId\" value=\"".$CurrentAuthor->id."\"  >";
     }
    ?>

    <label for="fname">First name</label>
    <input type="text" name="fname" value="<?php print($CurrentAuthor==null ? '' : $CurrentAuthor->fname) ?>">

    <label for="lname">Last name</label>
    <input type="text" name="lname" value="<?php print($CurrentAuthor==null ? '' : $CurrentAuthor->lname) ?>">

    <label for="authorImage">Cover image</label>
    <input type="file" name="authorImage" id="authorImage" accept="image/png,image/jpeg" style="font-size:15px;">

    <?php 
    
    if($CurrentAuthor == null){
        echo "<input type=\"submit\" name=\"addAuthor\" value=\"Add Author\">"; 
    }else{
        echo "<input type=\"submit\" name=\"saveAuthor\" value=\"Save Author\">";
    }
    
    ?>    
</form>

    
</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php') ?>
           