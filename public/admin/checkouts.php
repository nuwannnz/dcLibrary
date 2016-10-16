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
        <link href="<?php echo $header_paths['css'] . '/my-books-styles.css'; ?>" rel="stylesheet">   
        <style>
            input{
                display:inline-block;
                margin-right:10px;
            }
            td{
                padding:0px;                
            }
            th{
                text-align:left;
            }
            table{
                width:100%;
            }
        </style>
    </head>

    
<?php require_once($paths['include'] . '/admin_header.php') ?>

<!-- content -->
<div class="content center-align-bl" style="min-height:770px;background-color:#fff;" >

    <h2 style="margin-top:0px;padding-top:10px;">Checkouts</h2>

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
    <div style="height:110px;">
        <form action="<?php echo $header_paths['submit_forms'] .'/checkout_submit.php'; ?>" method="POST">
            <table>
                <tr>
                    <th><label for="userId">User id</label></th>
                    <th><label for="isbn">Isbn</label></th>
                    <th><label for="returnDate">Return date</label></th>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="userId" placeholder="User id" style="width:150px;" >
                    </td>
                    <td>
                        <input type="number" name="isbn" placeholder="Isbn" >
                    </td>
                    <td>
                        <input type="date" name="returnDate" placeholder="Return date" style="border: 0.5px solid #c7c7c7;height: 32px;" >
                    </td>
                    <td>
                        <input type="submit" name="addCheckout" value="Add checkout" style="width:150px;height:43px;margin-bottom:0px;">
                    </td>
                </tr>
            
            </table>
        </form>
       </div>
        <!-- Recent checkouts -->
        <div style="width:100%;min-height:300px;">
            <h3>Recent checkouts</h3>
            <!--filter -->
            <div style="width:550px;margin-left:auto;margin-bottom:20px;">
                <input type="text" name="filterText" id="filterText" placeholder="Filter checkouts" onkeyup="onFilter(this.value);" />

                <input type="radio" name="filterMode" value="isbn" checked="checked">Isbn
                <input type="radio" name="filterMode" value="userId">User id
                <input type="radio" name="filterMode" value="date">Date
            </div>
            <script src="<?php echo $header_paths['js'] .'/checkouts_filter.js'; ?>"></script>


            <div id="checkoutTable" style="min-height:500px;">
                <table class="book-shelf">
                    <tr>
                        <th>Checkout id</th>
                        <th>Admin</th>
                        <th>User id</th>
                        <th>Isbn</th>
                        <th>Date</th>
                        <th>Return date</th>
                        <th>Returned?</th>                    
                    </tr>

                    <?php 
                    $recentCheckouts = getRecentCheckouts($conn,10);
                    
                    if(count($recentCheckouts)>0){
                        foreach ($recentCheckouts as $checkout) {
                            
                            echo "<tr>";
                                //checkout id
                                echo "<td>";
                                    echo "<p>". $checkout->checkout_id."</p>";
                                echo "</td>";

                                //admin
                                echo "<td>";
                                    $admin = getAdmin($conn,$checkout->admin_id);
                                    echo "<p>".ucfirst($admin->name)."</p>";
                                echo "</td>";

                                //user id
                                echo "<td>";
                                    echo "<p>". $checkout->user_id."</p>";
                                echo "</td>";

                                //isbn
                                echo "<td>";
                                    echo "<p>". $checkout->isbn."</p>";
                                echo "</td>";

                                //date
                                echo "<td>";
                                    echo "<p>". $checkout->checkout_date."</p>";
                                echo "</td>";

                                //return date
                                echo "<td>";
                                    echo "<p>". $checkout->return_date."</p>";
                                echo "</td>";

                                //is returned
                                echo "<td>";
                                    if($checkout->is_returned){
                                        echo "<p>Yes</p>";
                                    }else{
                                        echo "<p>No</p>";
                                    }   
                                echo "</td>";

                            echo "</tr>";

                        }
                    }else{
                        echo "<p>No checkouts here</p>";
                    }                
                    
                    ?>
                </table>
            </div>
        </div>
       

        
       
    
</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php') ?>
           