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
        $responseText .= "<th>Checkout id</th>";
        $responseText .= "<th>Admin</th>";
        $responseText .= "<th>User id</th>";
        $responseText .= "<th>Isbn</th>";
        $responseText .= "<th>Date</th>";
        $responseText .= "<th>Return date</th>";
        $responseText .= "<th>Returned?</th>";
    $responseText .= "</tr>";

    //get ajax parameter
    if(isset($_REQUEST['isbn'])){
        $query_select_checkout = "SELECT * FROM `book_checkout` WHERE `isbn` LIKE '%".$_REQUEST['isbn']."%'"; 
        $result_select_checkout = mysqli_query($conn,$query_select_checkout);
        
        if(mysqli_num_rows($result_select_checkout) >0){
            while($row_select_checkout = mysqli_fetch_assoc($result_select_checkout)){
                buildUpTable($responseText,$row_select_checkout);
            };
                $responseText .= "</table>";
        }else{
            $responseText = "<p style=\"text-align:center\">No matching results</p>";
        }

        echo $responseText;
        exit();
    }else if(isset($_REQUEST['userId'])){
        $query_select_checkout = "SELECT * FROM `book_checkout` WHERE `user_reg_id` LIKE '".$_REQUEST['userId']."'"; 
        $result_select_checkout = mysqli_query($conn,$query_select_checkout);
        
        if(mysqli_num_rows($result_select_checkout) >0){
            while($row_select_checkout = mysqli_fetch_assoc($result_select_checkout)){
                buildUpTable($responseText,$row_select_checkout);
            };
                $responseText .= "</table>";
        }else{
            $responseText = "<p style=\"text-align:center\">No matching results</p>";
        }

        echo $responseText;
    }else if(isset($_REQUEST['date'])){
        $query_select_checkout = "SELECT * FROM `book_checkout` WHERE `date` LIKE '%".$_REQUEST['date']."%'"; 
        $result_select_checkout = mysqli_query($conn,$query_select_checkout);
        
        if(mysqli_num_rows($result_select_checkout) >0){
            while($row_select_checkout = mysqli_fetch_assoc($result_select_checkout)){
                buildUpTable($responseText,$row_select_checkout);
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
                    $responseText .= "<td><p>". $row['checkout_id']."</p></td>";

                    $admin = getAdmin($conn,$row['admin_id']);
                    $responseText .= "<td><p>". ucfirst($admin->name)."</p></td>";

                    $responseText .= "<td><p>". $row['user_reg_id']."</p></td>";

                    $responseText .= "<td><p>". $row['isbn']."</p></td>";

                    $responseText .= "<td><p>". $row['date']."</p></td>";

                    $responseText .= "<td><p>". $row['return_date']."</p></td>";

                    if($row['is_returned']){
                        $responseText .= "<td><p>Yes</p></td>";
                    }else{
                        $responseText .= "<td><p>No</p></td>";
                    }
                $responseText .= "</tr>";
    }

?>