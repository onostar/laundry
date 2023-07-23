<?php

    include "../classes/dbh.php";
    include "../classes/update.php";

    if(isset($_GET['item'])){
        $item = $_GET['item'];
        
        //update item washed status
        $update = new Update_table();
        $update->update('sales', 'laundry_status', 'sales_id', 'W', $item);

        if($update){
?>
            <div class="notify"><p><i class="fas fa-thumbs-up"></i> Item Washed successfully!</p></div>
<?php
        }
    }
    