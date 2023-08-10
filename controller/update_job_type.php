<?php
    session_start();
        $sales = $_GET['sales_id'];
        $item = $_GET['item_id'];
        $type = $_GET['type'];
        $store = $_SESSION['store_id'];
        // instantiate classess
        include "../classes/dbh.php";
        include "../classes/select.php";
        include "../classes/update.php";
        // check item current quantity in inventory
        /* $check_qty = new selects();
        $qtys = $check_qty->fetch_details_2cond('inventory', 'store', 'item', $store, $item);
        foreach($qtys as $qty){
            $current_qty = $qty->quantity;

        } */
        // get item price base on job type
        $get_price = new selects();
        //washing & ironing price
        $cw = $get_price->fetch_details_group('items', 'sales_price', 'item_id', $item);
        $wash_iron_price = $cw->sales_price;
        //ironing only price
        $ironing = $get_price->fetch_details_group('items', 'wholesale', 'item_id', $item);
        $iron_price = $ironing->wholesale;

        if($type == "wash"){
            $price = $wash_iron_price;
            $status = "C";
        }else{
            $price = $iron_price;
            $status = "W";
        }
        //get invoice
        $get_invoice = new selects();
        $rows = $get_invoice->fetch_details_group('sales', 'invoice', 'sales_id', $sales);
        $invoice = $rows->invoice;

        //update item price and job type
        $update = new Update_table();
        $update->update_quadruple('sales', 'price', $price, 'total_amount', $price, 'job_type', $type, 'laundry_status', $status, 'sales_id', $sales);
        if($update){
        
    // display items with same invoice number

    include "wholesale_details.php";           
                        
        
    }
?>