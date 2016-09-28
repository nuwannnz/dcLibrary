<?php require_once('../../config.php') ?>

<?php include_once($paths['include'] . '/logged_in_top.php') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- links -->
        <?php include_once($paths['include'] . '/logged_in_links.php') ?>    
        <style>
      
        #preview-image{
            border-radius:50%;
            width:250px;
            height:250px;      
            display:block;
            margin-top:100px;      
            border:5px solid #222233;
            background-color:#48486b
        }
               
        label,input[type=submit]{
            display:block;
            margin-top:30px;
            min-width:150px;
            width:150px;
            text-align:center;
            padding:10px;
            border:1px solid #222233;
            border-radius:5px;
            color:#222233;
            background-color:#fff;
            cursor:pointer;
        }

        label:hover ,input[type=submit]:hover{
            background-color:#222233;;
            color:#fff;                        
        }
        
        #skip-link{
            color:#222233;
            display:block;
            margin-top:30px;
        }


        </style>  
    </head>

    
 <body>
        
        <!-- top header -->
        <?php include_once($paths['include'] . '/logged_in_header.php') ?>

        <div style="position:absolute;top:0px;width:100%; height:50px; background-color:rgba(0,0,0,0.4);z-index:10000"></div>
            
<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >

    <p class="font-large" style="margin:0px;text-align:center;padding-top:20px;">Upload a profile picture</p>


    <div  style="position:relative;">
        <img class="center-align-bl " id="preview-image" src="../../images/users/user(11).png" alt="">
        <div class="progress" id="progressbar" style="position:absolute;top:50%;left:50%;margin-top:-45px;margin-left:-45px;display:none;"></div>        
    </div>
    <script src="<?php echo $header_paths['js'] . '/photoUpload.js'; ?>"></script>

    <form action="<?php echo $header_paths['submit_forms'] . '/profile_pic_upload_submit.php'; ?>" method="POST"  id="upload-form" >

        <input type="file" name="input-file" id="input-file" style="display:none" onchange="onFileSelect();" accept="image/png,image/jpeg" >

        <label class="center-align-bl site-font-m" for="input-file" id="upload-button" >Upload a photo</label>
        <input class="center-align-bl site-font-m" type="submit" id="confirm-button" name="confirm" style="display:none;font-size:17px;" value="Continue" ></label>

        <input type="hidden" id="image-name" name="image-name" value="">
        <input type="hidden" id="use-default" name="use-default" value="0">
        <input type="hidden" id="on-success" name="onSuccess" value="<?php print(isset($_POST['onSuccess']) ? $_POST['onSuccess'] : ''); ?>" >
    </form>

    <a class="center-align-in site-font-m" href="#" id="skip-link" onclick="submitDefault();">Use the default photo</a>

</div><!-- end of content container-->

        <!-- footer -->
        <?php include_once($paths['include'] . '/logged_in_footer.php') ?>
    </body>
</html>