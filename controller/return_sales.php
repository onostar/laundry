<?php
    
    // if(isset($_POST['change_prize'])){
        $trans_type = "sales_return";
        $item = htmlspecialchars(stripslashes($_POST['item']));
        $user = htmlspecialchars(stripslashes($_POST['user_id']));
        $sales = htmlspecialchars(stripslashes($_POST['sales_id']));
        $quantity = htmlspecialchars(stripslashes($_POST['quantity']));
        $store = htmlspecialchars(stripslashes($_POST['store']));
        $reason = ucwords(htmlspecialchars(stripslashes($_POST['reason'])));
        
        // instantiate classes
        include "../classes/dbh.php";
        include "../classes/select.php";
        include "../classes/update.php";
        include "../classes/inserts.php";
        include "../classes/delete.php";
        
        
        //get item name
        $get_name = new selects();
        $row = $get_name->fetch_details_group('items', 'item_name', 'item_id', $item);
        $item_name = $row->item_name;
        //get sales details
        $get_sales = new selects();
        $rows = $get_sales->fetch_details_cond('sales', 'sales_id', $sales);
        foreach($rows as $row){
            $sales_qty = $row->quantity;
            $invoice = $row->invoice;
            $unit_price = $row->price;
            $amount = $row->total_amount;
        }
        $new_qty = $sales_qty - $quantity;
        $new_amount = $new_qty * $unit_price;
        $removed_amount = $quantity * $unit_price;
        //update sales quantity and amount

        $update_sales = new Update_table();
        $update_sales->update_double('sales', 'quantity', $new_qty, 'total_amount', $new_amount, 'sales_id', $sales);

        //update item quantity in inventory
        //get item current quantity in inventory;
        $get_qty = new selects();
        $qtys = $get_qty->fetch_details_2cond('inventory', 'store', 'item', $store, $item);
        foreach($qtys as $qty){
            $inv_qty = $qty->quantity;
        }
        $new_inv_qty = $inv_qty + $quantity;
        $update_inventory = new Update_table();
        $update_inventory->update2cond('inventory', 'quantity', 'store', 'item', $new_inv_qty, $store, $item);

        //insert into audit trail
        $inser_trail = new audit_trail($item, $trans_type, $inv_qty, $quantity, $user, $store);
        $inser_trail->audit_trail();
        //update invoice amount in payment table
        //get total invoice amount from payment table
        $get_amount = new selects();
        $amounts = $get_amount->fetch_details_cond('payments', 'invoice', $invoice);
        foreach($amounts as $amount){
            $invoice_amount = $amount->amount_paid;
            $invoice_due = $amount->amount_due;
        }
       
        $new_inv_amount = $invoice_amount - $removed_amount;
        $new_inv_due = $invoice_due - $removed_amount;
        $update_payment = new Update_table();
        $update_payment->update_double('payments', 'amount_paid', $new_inv_amount, 'amount_due', $new_inv_due, 'invoice', $invoice);
        // if($update_payment){
            //insert into sales return table
            $sales_return = new sales_return($item, $quantity, $removed_amount, $reason, $user, $invoice, $store);
            $sales_return->return_sales();
            if($sales_return){
            //remove invoice from payments and sales if amount is = 0
            //get new payment amount for the invoice
            $get_new_amount = new selects();
            $new_pay_amount = $get_new_amount->fetch_details_group('payments', 'amount_paid', 'invoice', $invoice);
                if($new_pay_amount->amount_paid == 0){
                    //delete from sales
                    $delete_sales = new deletes();
                    $delete_sales->delete_item('sales', 'invoice', $invoice);
                    //delete from payments
                    $delete_payment = new deletes();
                    $delete_payment->delete_item('payments', 'invoice', $invoice);

                    
                }
                echo "<div class='success'><p>$item_name sales returned successfully! <i class='fas fa-thumbs-up'></i></p></div>";
            }else{
                echo "<p style='background:red; color:#fff; padding:5px'>Failed to insert sales return <i class='fas fa-thumbs-down'></i></p>";
            }
        /* }else{
            echo "<p style='background:red; color:#fff; padding:5px'>Failed to update  payment <i class='fas fa-thumbs-down'></i></p>";

        } */
    // }