<?php
// session_start();
// instantiate class
include "../classes/dbh.php";
include "../classes/update.php";
include "../classes/select.php";
include "../classes/inserts.php";
    session_start();
    if(isset($_SESSION['user_id'])){
        $trans_type = "sales";
            $user = $_SESSION['user_id'];
            $invoice = $_POST['sales_invoice'];
            $payment_type = htmlspecialchars(stripslashes($_POST['payment_type']));
            $bank = htmlspecialchars(stripslashes($_POST['bank']));
            $cash = htmlspecialchars(stripslashes($_POST['multi_cash']));
            $pos = htmlspecialchars(stripslashes($_POST['multi_pos']));
            $transfer = htmlspecialchars(stripslashes($_POST['multi_transfer']));
            $wallet = htmlspecialchars(stripslashes($_POST['wallet']));
            $deposit = htmlspecialchars(stripslashes($_POST['deposit']));
            $discount = htmlspecialchars(stripslashes($_POST['discount']));
            $store = htmlspecialchars(stripslashes($_POST['store']));
            $type = "Wholesale";
            $customer = htmlspecialchars(stripslashes($_POST['customer_id']));
            $collection_date = htmlspecialchars(stripslashes($_POST['collection_date']));
            
            //insert into audit trail
            //get items and quantity sold in the invoice
            /* $get_item = new selects();
            $items = $get_item->fetch_details_cond('sales', 'invoice', $invoice);
            foreach($items as $item){
                $all_item = $item->item;
                $sold_qty = $item->quantity;
                //get item previous quantity in inventory
                
                   $prev_qty = 0;
                    //insert into audit trail
                    $inser_trail = new audit_trail($all_item, $trans_type, $prev_qty, $sold_qty, $user, $store);
                    $inser_trail->audit_trail();
                
                
            } */
            
        //check if mode is multiple payment
        /* $get_mode = new selects();
        $mode = $get_mode->fetch_details_group('payments', 'payment_mode', 'invoice', $invoice);
        $paymode = $mode->payment_mode; */

        //update all items with this invoice (sales_status, laundry_status and collection_date)
        $update_invoice = new Update_table();
        $update_invoice->update_double('sales', 'sales_status', 2, 'collection_date', $collection_date, 'invoice', $invoice);
            if($update_invoice){
                //insert payment details into payment table
                //get invoice total amount
                $get_inv_total = new selects();
                $results = $get_inv_total->fetch_sum_single('sales', 'total_amount', 'invoice', $invoice);
                foreach($results as $result){
                    $inv_amount = $result->total;
                }
                //get amount paid
                if($payment_type == "Credit"){
                    $amount_paid = 0;
                    $invoice_status = 0;
                }elseif($payment_type == "Deposit"){
                    $amount_paid = $deposit;
                    $invoice_status = 0;
                }else{
                    $amount_paid = $inv_amount - $discount;
                    $invoice_status = 1;
                }
                //insert payments
                if($payment_type == "Multiple"){
                    //insert into payments
                    if($cash !== '0'){
                        $insert_payment = new payments($user, 'Cash', $bank, $inv_amount, $cash, $discount, $invoice, $store, $type, $customer, $invoice_status);
                        $insert_payment->payment();
                    }
                    if($pos !== '0'){
                        $insert_payment = new payments($user, 'POS', $bank, $inv_amount, $pos, $discount, $invoice, $store, $type, $customer, $invoice_status);
                        $insert_payment->payment();
                    }
                    if($transfer !== '0'){
                        $insert_payment = new payments($user, 'Transfer', $bank, $inv_amount, $transfer, $discount, $invoice, $store, $type, $customer, $invoice_status);
                        $insert_payment->payment();
                    }
                    //
                    $insert_multi = new multiple_payment($user, $invoice, $cash, $pos, $transfer, $bank, $store);
                    $insert_multi->multi_pay();
                }else{
                    $insert_payment = new payments($user, $payment_type, $bank, $inv_amount, $amount_paid, $discount, $invoice, $store, $type, $customer, $invoice_status);
                    $insert_payment->payment();
                }

                if($payment_type == "Wallet"){
                    //update wallet balance
                    $new_balance = $wallet - $amount_paid;
                    $update_wallet = new Update_table();
                    $update_wallet->update('customers', 'wallet_balance', 'customer_id', $new_balance, $customer);
                }
                if($insert_payment){
                
                //update quantity of the items in inventory
                //get all items first in the invoice
                /* $get_items = new selects();
                $rows = $get_items->fetch_details_cond('sales', 'invoice', $invoice);
                
                foreach($rows as $row){
                    //update individual quantity in inventory
                    $update_qty = new Update_table();
                    $update_qty->update_inv_qty($row->quantity, $row->item, $store);
                    
                } */
                //check if payment is credit and insert into customer trail and debtors list
                if($payment_type == "Credit"){
                    //insert to customer_trail
                    $insert_credit = new customer_trail($customer, $store, 'Credit sales', $inv_amount, $user);
                    $insert_credit->add_trail();
                    //insert to debtors list
                    $debt_data = array(
                        'customer' => $customer,
                        'invoice' => $invoice,
                        'amount' => $inv_amount,
                        'posted_by' => $user,
                        'store' => $store
                    );
                    $add_debt = new add_data('debtors', $debt_data);
                    $add_debt->create_data();
                }
                //check if payment is deposit and insert into customer trail and debtors list
                if($payment_type == "Deposit"){
                    //insert to customer_trail
                    $insert_credit = new customer_trail($customer, $store, 'Credit sales', $inv_amount, $user);
                    $insert_credit->add_trail();
                    //insert to debtors list
                    $balance_payment = $inv_amount - $deposit;
                    $debt_data = array(
                        'customer' => $customer,
                        'invoice' => $invoice,
                        'amount' => $balance_payment,
                        'posted_by' => $user,
                        'store' => $store
                    );
                    $add_debt = new add_data('debtors', $debt_data);
                    $add_debt->create_data();
                }
                
?>
<div id="printBtn">
    <button onclick="printSalesReceipt('<?php echo $invoice?>')">Print Receipt <i class="fas fa-print"></i></button>
</div>
<!--  -->
   
<?php
    // echo "<script>window.print();</script>";
                    // }
                }
            }
        
    }else{
        header("Location: ../index.php");
    } 
?>