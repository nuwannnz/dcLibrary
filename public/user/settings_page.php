<?php require_once('../../config.php'); ?>
<?php include_once($paths['include'] . '/logged_in_top.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>dcLibrary</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php require_once($paths['include'] . '/logged_in_links.php') ?>        
        <link href="<?php echo $header_paths['css'] . '/input-styles.css'; ?>" rel="stylesheet">
        <link href="<?php echo $header_paths['css'] . '/settings-page-styles.css'; ?>" rel="stylesheet">    
        <style> 

        label{
            
            display: inline-block;
            padding-top: 10px;
        }    
        
        .input-form{
            width:315px;            
            text-align:left;
            margin-top:30px;
        }

        #deleteAccBtn{
            background-color:#ea3434;
            color:#fff;
            border-color:#b71c1c;
        }

        #profilePicUploadBtn{
            width:210px;
            height:210px;
            border-radius:50%;
            background-color:transparent;
            position: absolute;
            margin:0px;
            border:0px;            
            top: 45px;
            left: 20px;                       
        }  

        #profilePicUploadBtn:hover{
            display:block;
            background-color:rgba(255,255,255,0.8);
            background-image:url('<?php echo $header_paths['resources'] . '/images/edit.png'; ?>');
            background-repeat:no-repeat;
            background-position-x: 79px;
            background-position-y: 77px;
            
        }
        </style>    
    </head>

    
<?php require_once($paths['include'] . '/logged_in_header.php') ?>

<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >
    
    <div class="profile-top" style="">
        <form action="<?php echo $header_paths['public'] . '/user/profile_pic_upload.php'; ?>" method="POST" >
            <input id="profilePicUploadBtn" type="submit" value="" />
            <input name="onSuccess" type="hidden" value="<?php echo $header_paths['public'] . '/user/settings_page.php'; ?>" />
        </form>
        <img src="<?php echo $header_paths['images'] . '/users/'. $CurrentUser->image; ?>" alt="User Image" >
        <span><?php echo $CurrentUser->getFullName(); ?></span>
        <span><?php echo $CurrentUser->email; ?></span>
    </div>

    <table class="tabs">
        <tr>
            <td style="width:200px;vertical-align:top;padding-left:0px;">
                <div class="tab-links">
                <ul> 
                    <li> <a class="tablink" onclick="changeTab(event,0);" href="javascript: void(0);">Personal Details</a></li>
                    <li> <a class="tablink" onclick="changeTab(event,1);" href="javascript: void(0);">Username</a></li>                
                    <li> <a class="tablink" onclick="changeTab(event,2);" href="javascript: void(0);">Password</a></li>
                    <li> <a class="tablink" onclick="changeTab(event,3);" href="javascript: void(0);">More</a></li>                    
                </ul>
                </div>  
            </td>

            <td>
                <div class="tab-content-container">
<?php 

if(isset($_GET['message'])){
    $message = urldecode(base64_decode($_GET['message']));
echo <<<ERROR_MESSAGE
    <div class="error-message-container center-align-bl">
        <p  style="margin:0px;">$message</p>
    </div>
ERROR_MESSAGE;
}
?>                  
                    <!-- personal details tab-->
                    <div class="tab-content">
                    <h2>Change personal details</h2>
                    <form action="<?php echo $header_paths['submit_forms'] . '/profile_submit.php'; ?>" method="POST" class="input-form center-align-bl"  >
                        
                            
                        <p id="fname_error" class="error-text">please enter a valid firstname</p>
                        <label for="fname">Firstname</label>
                        <input class="center-align-bl" type="text" name="fname" id="fname" value="<?php echo $CurrentUser->getFName(); ?>" placeholder="Firstname"  >                                               

                        <p id="lname_error" class="error-text">please enter a valid lastname</p>
                        <label for="lname">Lastname</label>
                        <input class="center-align-bl" type="text" name="lname" id="lname" value="<?php echo $CurrentUser->getLName(); ?>" placeholder="Lastname"  >

                        <p id="email_error" class="error-text">please enter a valid email</p>
                        <label for="email">Email</label>
                        <input class="center-align-bl" type="email" name="email" id="email" value="<?php echo $CurrentUser->email; ?>" placeholder="Email"  >
                        <input  type="hidden" name="currentEmail"  value="<?php echo $CurrentUser->email; ?>"  >                                                

                        <input class="center-align-bl site-font-m " type="submit" name="saveDetails" id="saveDetails" value="Save"  >
                        
                        <script>
                            function onUnameChange(event){
                                var saveBtn = document.getElementById('saveUname');
                                var unamePrevious = document.getElementById('unameHidden').value;
                                var currentUname = event.currentTarget.value;
                                if(unamePrevious != currentUname){
                                    saveBtn.attributes.removeNamedItem('disabled');
                                }else if(unamePrevious == currentUname){
                                    saveBtn.setAttribute('disabled','disabled');
                                }
                            }
                        
                        </script>
                    </form>
                    </div>

                    <!-- username tab-->
                    <div class="tab-content">
                    <h2>Change username</h2>
                    <form action="<?php echo $header_paths['submit_forms'] . '/profile_submit.php'; ?>" method="POST" class="input-form center-align-bl" onsubmit="return validateUnameUpdateForm();"  >
                        <?php

                        $query_select_username = "SELECT `username` FROM `user` WHERE `user_reg_id`='". $CurrentUser->id ."'"; 
                        $result_select_username = mysqli_query($conn,$query_select_username);
                        $row_select_username = mysqli_fetch_assoc($result_select_username);
                        
                        
                        ?>
                            
                        <p id="uname_error" class="error-text">please enter a valid username</p>
                        <label for="uname">Username</label>
                        <input class="center-align-bl" type="text" name="uname" id="uname" value="<?php echo $row_select_username['username']; ?>" placeholder="Username" oninput="onUnameChange(event);" >                                               

                        <input type="hidden" name="unameHidden" id="unameHidden" value="<?php echo $row_select_username['username']; ?>"  >

                        <input class="center-align-bl site-font-m " type="submit" name="saveUname" id="saveUname" value="Save" disabled >
                        
                        <script>
                            function onUnameChange(event){
                                var saveBtn = document.getElementById('saveUname');
                                var unamePrevious = document.getElementById('unameHidden').value;
                                var currentUname = event.currentTarget.value;
                                if(unamePrevious != currentUname){
                                    saveBtn.attributes.removeNamedItem('disabled');
                                }else if(unamePrevious == currentUname){
                                    saveBtn.setAttribute('disabled','disabled');
                                }
                            }
                        
                        </script>
                    </form>
                    </div>

                    <!-- password tab-->
                    <div class="tab-content">
                        <h2>Change password</h2>
                        <form action="<?php echo $header_paths['submit_forms'] . '/profile_submit.php'; ?>" method="POST" class="input-form center-align-bl" onsubmit="return validatePwordUpdateForm();"  >
                                                        
                            <p id="pword_error" class="error-text">please enter a valid password</p>
                            <label for="pword">Password</label>
                            <input class="center-align-bl" type="password" name="pword" id="pword" placeholder="Password" >

                            <p id="new_pword_error" class="error-text">please enter a valid password</p>
                            <label for="newPword">New password</label>
                            <input class="center-align-bl" type="Password" name="newPword" id="newPword" placeholder="New password" >

                            <p id="new_pword_repeat_error" class="error-text">Passwords does not match</p>
                            <label for="newPwordRepeat">Re-type New password</label>
                            <input class="center-align-bl" type="Password" name="newPwordRepeat" id="newPwordRepeat" placeholder="Re-type new password" >

                            <input class="center-align-bl site-font-m " type="submit" name="savePword" id="savePword" value="Save" >
                            
                        </form>
                    </div>

                    <!-- more settings tab-->
                    <div class="tab-content">
                        <h2>More settings</h2>

                        <form action="<?php echo $header_paths['submit_forms'] . '/delete_account_submit.php'; ?>" id="deleteAccForm" method="POST"  onsubmit="return onClickDelete(event);"  class="input-form center-align-bl"   >
                            <div id="deleteAccTop">
                                <p style="text-align:center;">Warning: This action is not reversable!</p>
                                <input class="center-align-bl site-font-m" type="submit" name="deleteAcc" id="deleteAccBtn" value="Delete Account">
                            </div>

                            <div id="deleteAccBottom" style="display:none;">
                                <p id="delete_pword_error" class="error-text">please enter a valid password</p>
                                <label for="deletePword">Please enter your password</label>
                                <input class="center-align-bl" type="password" name="deletePword" id="deletePword" placeholder="Password" >
                                <input class="center-align-bl site-font-m" type="submit" name="deleteAccConfirm" id="deleteAccConfirm" value="Confirm Delete Account" >
                            </div>
                        </form>                        

                        <script>
                            function onClickDelete(event){
                                var topDiv = document.getElementById('deleteAccTop');
                                var bottomDiv = document.getElementById('deleteAccBottom');
                                var deleteForm = document.getElementById('deleteAccForm');

                                if(topDiv.style.display == 'none'){
                                    var delete_pword_error = document.getElementById('delete_pword_error');
                                    var deletePword = document.getElementById('deletePword');

                                    delete_pword_error.style.display = 'none';
                                    if(deletePword.value == ''){
                                        delete_pword_error.style.display = 'block';
                                        return false;
                                    }else{
                                        return true;
                                    }
                                }
                                event.preventDefault();                                 

                                topDiv.style.display = 'none';
                                bottomDiv.style.display = 'block';
                            }
                        </script>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <script src="<?php echo $header_paths['js'] . '/tabcontrol.js'; ?>"></script>
            
    <script>
            
            this.onload = function (){
                            tablinks = document.getElementsByClassName("tablink");
                            if(getGETTab() != false){
                                tablinks[getGETTab()].click();
                            }else{
                                tablinks[0].click();
                            }
                        }

            function getGETTab(){   
                var getPara =  this.window.location.search.replace("?"," ");

                if(getPara.length < 2){
                    return false;
                }

                var tabNum = getPara.split("=")[getPara.split("=").length-1];
                return tabNum;
            }
        </script>


    

    <!-- validation script-->
    <script src="<?php echo $header_paths['js'] . '/validations.js'; ?>"></script>
</div><!-- end of content container-->

<?php require_once($paths['include'] . '/logged_in_footer.php'); ?>
           