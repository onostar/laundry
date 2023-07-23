<?php
    session_start();
    include "../classes/dbh.php";
    include "../classes/update.php";
    if(isset($_SESSION['user_id'])){
        $issued_by = $_SESSION['user_id'];
    }
    if(isset($_GET['item'])){
        $item = $_GET['item'];
        $issue_date = date("Y-m-d H:i:s");      
        //update item washed status
        $update = new Update_table();
        $update->update_tripple('sales', 'laundry_status', 'D', 'issued_date', $issue_date, 'issued_by', $issued_by, 'sales_id', $item);

        if($update){
?>
            <div class="notify"><p><i class="fas fa-thumbs-up"></i> Item Issued to Customer !</p></div>
<?php
        }
    }
?>
    