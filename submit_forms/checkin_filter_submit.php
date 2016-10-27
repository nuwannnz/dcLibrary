<?php include_once('../config.php') ?>

<?php 

include_once($paths['functions'] . '/session_helpers.php');
include_once($paths['functions'] . '/navigation_helpers.php');
checkSession();

if(isset($_SESSION['admin_detail'])) {
                
        include_once($paths['functions'] . '/db_helper.php');
        include_once($paths['include'] . '/connection.php');
        include_once($paths['models'] . '/book.php');

    $responseText = "<table class=\"book-shelf\">";
    $responseText .= "<tr>";
        $responseText .= "<th>Checkin id</th>";
        $responseText .= "<th>Checkout id</th>";
        $responseText .= "<th>Admin</th>";        
        $responseText .= "<th>Date</th>";        
    $responseText .= "</tr>";

    //get ajax parameter
    if(isset($_REQUEST['checkoutId'])){
        $query_select_checkin = "SELECT * FROM `book_checkin` WHERE `checkout_id` LIKE '%".$_REQUEST['checkoutId']."%'"; 
        $result_select_checkin = mysqli_query($conn,$query_select_checkin);
        
        if(mysqli_num_rows($result_select_checkin) >0){
            while($row_select_checkin = mysqli_fetch_assoc($result_select_checkin)){
                buildUpTable($responseText,$row_select_checkin);
            };
                $responseText .= "</table>";
        }else{
            $responseText = "<p style=\"text-align:center\">No matching results</p>";
        }

        echo $responseText;
        exit();
    
    }
}else{
    goToErrorPage("Unauthorized Access!");
    exit();
}

function buildUpTable(&$responseText,$row){
    global $conn;
        $responseText .= "<tr>";
                    $responseText .= "<td><p>". $row['checkin_id']."</p></td>";
                    $responseText .= "<td><p>". $row['checkout_id']."</p></td>";

                    $admin = getAdmin($conn,$row['admin_id']);
                    $responseText .= "<td><p>". ucfirst($admin->name)."</p></td>";
                
                    $responseText .= "<td><p>". $row['date']."</p></td>";

                
                $responseText .= "</tr>";
    }

?>