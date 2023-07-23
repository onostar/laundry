<?php

    include "../classes/dbh.php";
    include "../classes/update.php";

    if(isset($_GET['invoice'])){
        $invoice = $_GET['invoice'];
        
        //update item washed status
        $update = new Update_table();
        $update->update('sales', 'laundry_status', 'invoice', 'W', $invoice);

        if($update){
?>
            <div class="notify"><p><i class="fas fa-thumbs-up"></i> All Items Washed successfully!</p></div>
<?php
        }
        
    }
    