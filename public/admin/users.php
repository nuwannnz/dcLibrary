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
        #confirmDeleteDialog{
            display:none;
            width:100%;
            position:absolute;
            top:0px;
            right:0px;
            bottom:0px;
            left:0px; 
            background-color:rgba(0,0,0,0.5);
        }    
        #confirmDeleteDialog div{
            width:400px;
            height:200px;
            background-color:#fff;
            position:fixed;
            top:50%;
            left:50%;
            margin-left:-200px;
            margin-top:-100px;
        }
        #confirmDeleteDialog div h3{
            text-align:center;
        }

        #deleteConfirmBtn{
            background-color:#ea3434;
            color:#fff;
            border-color:#b71c1c;
        }

        #cancelBtn{
             display: inline-block;
            width: 100px;
            height: 22px;
            font-size: 19px;
            border-radius: 5px;
            text-align: center;
            padding-top: 5px;
            width: 314px;
            height: 35px;
            border: 1px solid #222233;
            background-color: #fff;
            cursor: pointer;
            margin-left:42px;
            }

        </style>          
    </head>

    
<?php require_once($paths['include'] . '/admin_header.php') ?>

<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;position:relative;" >

<?php
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
    <div  >
        <div style="width:100%;position:relative;height:50px;">
            <a class="border-button" href="<?php echo $header_paths['public'] . '/admin/add_user.php'; ?>" style="padding:4px 10px;border-color:#222233;margin:10px;color:#222233;position:absolute;right:0px;">Add a user</a>
        </div>

        <h2 style="padding-left:10px;">All users</h2>
        <?php 

        $regUsers = getAllRegUsers($conn);
       
         if(count($regUsers)>0){                                
                    //user list table
                    echo "<table class=\"book-shelf\">";
                        echo "<tr>";
                            echo "<th>Register id</th>";
                            echo "<th>First name</th>";                            
                            echo "<th>Last name</th>";                            
                            echo "<th>Email</th>";
                            echo "<th></th>";
                        echo "</tr>";
                        
                        foreach ($regUsers as $user) {
                            echo "<tr>";

                                //user id
                                echo "<td>";
                                   echo "<p>". $user->id ."</p>";
                                echo "</td>";

                                //first name
                                echo "<td>";
                                    echo "<p>". $user->fname ."</p>";
                                echo "</td>";

                                // last name
                                echo "<td>";
                                    echo "<p>". $user->lname ."</p>";
                                echo "</td>";                           

                                //email                               
                                echo "<td>";
                                    echo "<p>". $user->email ."</p>";
                              echo "</td>";

                                //remove button                               
                                echo "<td>";                                                                        
                                        echo "<a class=\"close-button\" name=\"addToList\" type=\"submit\"  onclick=\"confirmDelete(".$user->id.")\" style=\"padding:2px 8px;\" >X</a>";                                        
                                echo "</td>";

                            echo "</tr>";
                        }
                        

                    echo "</table>";
                }else{
                     echo "<p class=\"center-align-bl center-align-in\" style=\"padding-top:50px;\"> No users here...</p>";
                }
        
        
        ?>        
    </div>

    <div id="confirmDeleteDialog" >
        <div>
            <h3>This user will be deleted permanently!</h3>
            <form action="<?php echo $header_paths['submit_forms'] .'/delete_user_submit.php'; ?>" method="POST" onsubmit="return onConfirmDelete()">
                <input type="hidden" id="deleteUserId" name="deleteUserId" >
                <input class="center-align-bl" type="submit" id="deleteConfirmBtn" name="deleteConfirmBtn" value="Delete user">
                <a class="center-align-bl" id="cancelBtn" onclick="cancelDelete();">Cancel</a>
            </form>
        </div>
    </div>

<script>
        var deleteDialog = document.getElementById('confirmDeleteDialog');
        var deleteUserId = document.getElementById('deleteUserId');
    
    function confirmDelete(userId){

        deleteUserId.value =userId;
        deleteDialog.style.display ="block";
    }

    function onConfirmDelete(){
        var deleteUserId = document.getElementById('deleteUserId');
        if(deleteUserId.value == ''){
            return false;
        }else{
            return true;
        }
    }

    function cancelDelete(){
        deleteDialog.style.display = "none";
        deleteUserId.value = '';
    }
</script>
</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php') ?>