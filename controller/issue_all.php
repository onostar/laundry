<?php

    session_start();
    include "../classes/dbh.php";
    include "../classes/update.php";
    if(isset($_SESSION['user_id'])){
        $issued_by = $_SESSION['user_id'];
    }

    if(isset($_GET['invoice'])){
        $invoice = $_GET['invoice'];
        $issue_date = date("Y-m-d H:i:s");      
        //update item washed status
        $update = new Update_table();
        $update->update_tripple('sales', 'laundry_status', 'D', 'issued_date', $issue_date, 'issued_by', $issued_by, 'invoice', $invoice);

        if($update){
?>
            <div class="notify"><p><i class="fas fa-thumbs-up"></i> All Items Issued to customer!</p></div>
<?php
        }
        
    }
    