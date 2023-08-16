<?php
// instantiate class
include "../classes/dbh.php";
include "../classes/select.php";
include "../classes/inserts.php";
    session_start();
    $store = $_SESSION['store_id'];
    $sales_type = "Laundry";
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        if(isset($_SESSION['invoice'])){
            $invoice = $_SESSION['invoice'];
        }
        if(isset($_GET['sales_item'])){
            $item = $_GET['sales_item'];
            $customer_name = $_GET['customer'];

            //get customer id
            $get_customer = new selects();
            $client = $get_customer->fetch_details_group('customers', 'customer_id', 'customer', $customer_name);
            $customer = $client->customer_id;
            
        }
    $_SESSION['customer'] = $customer;
    $quantity = 1;
    
    //get selling price
    $get_item = new selects();
    $rows = $get_item->fetch_details_cond('items', 'item_id', $item);
     if(gettype($rows) == 'array'){
        foreach($rows as $row){
            $price = $row->sales_price;
            $name = $row->item_name;
            // $cost = $row->cost_price;
            // $department = $row->department;
        }
        //data to add
        $data = array(
            'item' => $item,
            'invoice' => $invoice,
            'price' => $price,
            'total_amount' => $price,
            'quantity' => $quantity,
            'posted_by' => $user_id,
            'laundry_status' => 'C',
            'job_type' => 'Regular',
            'store' => $store,
            'sales_type' => $sales_type,
            'customer' => $customer
        );
        //get quantity from inventory
        /* $get_qty = new selects();
        $qtyss = $get_qty->fetch_details_2cond('inventory', 'store', 'item', $store, $item);
        if(gettype($qtyss) == 'array'){
            foreach($qtyss as $qtys){
                $qty = $qtys->quantity;
            }
        }
        if(gettype($qtyss) == 'string'){
            $qty = 0;
        }
        $sales_cost = $quantity * $cost;
            if($qty == 0){
                echo "<div class='notify'><p><span>$name</span> has zero quantity! Cannot proceed</p>";
            }else*/ if($price == 0){
                echo "<div class='notify'><p><span>$name</span> does not have selling price! Cannot proceed</p></div>";
            }else{

                //check if already exist in sales order
                // check if item already exist
            /* $check = new selects();
            $sales = $check->fetch_count_2cond('sales', 'invoice', $invoice, 'item', $item);
            if($sales > 0){
                echo "<div class='notify'><p>Item already exists in sales order</p></div>";
                include "wholesale_details.php";
            }else{ */
                //insert into sales order
                $sell_item = new add_data('sales', $data);
                $sell_item->create_data();
                if($sell_item){

        ?>
<!-- display sales for this invoice number -->
<div class="notify"><p><span><?php echo $name?></span> added to order</p></div>
<?php
    include "wholesale_details.php";
                }
            // }
        }
?>
   
    
<?php
         }
    }else{
        header("Location: ../index.php");
    } 
?>