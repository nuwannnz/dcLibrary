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
        <form action="<?php echo $header_paths['submit_forms'] .'/checkin_submit.php'; ?>" method="POST">
            <table>
                <tr>
                    <th><label for="checkoutId">Checkout id</label></th>                    
                </tr>
                <tr>
                    <td>
                        <input type="number" name="checkoutId" placeholder="Checkout id" style="width:150px;" >
                    </td>                    
                    <td>
                        <input type="submit" name="addCheckin" value="Add checkin" style="width:150px;height:43px;margin-bottom:0px;">
                    </td>
                </tr>
            
            </table>
        </form>
       </div>
        <!-- Recent checkouts -->
        <div style="width:100%;min-height:300px;">
            <h3>Recent checkins</h3>
            <!--filter -->
            <div class="float-right" style="margin-bottom:20px;">
                <input type="text" name="filterText" id="filterText" placeholder="Filter checkins by checkout id" onkeyup="onFilterCheckin(this.value);" />                
            </div>
            <div class="clearfix"></div>
            <script src="<?php echo $header_paths['js'] .'/checkouts_filter.js'; ?>"></script>


            <div id="checkinTable" style="min-height:500px;">
                <table class="book-shelf">
                    <tr>
                        <th>Checkin id</th>
                        <th>Checkout id</th>
                        <th>Admin</th>                        
                        <th>Date</th>                                            
                    </tr>

                    <?php 
                    $recentCheckins = getRecentCheckins($conn,10);
                    
                    if(count($recentCheckins)>0){
                        foreach ($recentCheckins as $checkin) {
                            
                            echo "<tr>";
                                //checkin id
                                echo "<td>";
                                    echo "<p>". $checkin->id."</p>";
                                echo "</td>";

                                //checkout id
                                echo "<td>";
                                    echo "<p>". $checkin->checkout_id."</p>";
                                echo "</td>";

                                //admin
                                echo "<td>";
                                    $admin = getAdmin($conn,$checkin->admin_id);
                                    echo "<p>".ucfirst($admin->name)."</p>";
                                echo "</td>";                                

                                //date
                                echo "<td>";
                                    echo "<p>". $checkin->checkin_date."</p>";
                                echo "</td>";
                                

                            echo "</tr>";

                        }
                    }else{
                        echo "<p>No checkins here</p>";
                    }                
                    
                    ?>
                </table>
            </div>
        </div>
       

        
       
    
</div><!-- end of content container-->

<?php require_once($paths['include'] . '/home_footer.php') ?>
           