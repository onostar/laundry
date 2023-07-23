
<?php
    include "receipt_style.php";
// session_start();
// instantiate class
include "../classes/dbh.php";
include "../classes/select.php";
    session_start();
    if(isset($_GET['receipt'])){
        $user = $_SESSION['user_id'];
        $invoice = $_GET['receipt'];
        //get store
        $get_store = new selects();
        $strs = $get_store->fetch_details_group('sales', 'store', 'invoice', $invoice);
        //get store name
        $get_store_name = new selects();
        $rows = $get_store_name->fetch_details_cond('stores', 'store_id', $strs->store);
        foreach($rows as $row){
            $store_name = $row->store;
            $address = $row->store_address;
            $phone = $row->phone_number;

        }

                
?>
<div class="displays allResults sales_receipt">
    <?php include "receipt_header.php"?>
    <p><strong>ORDER TICKET</strong></p>
    </div>
    <table id="postsales_table" class="searchTable" style="border-collapse:collapse;">
        <thead>
            <tr style="background:var(--moreColor)">
                <td style="text-align:center">Items</td>
                <td style="text-align:center">Amount</td>
            </tr>
        </thead>
        <tbody>
            <?php
                $n = 1;
                $get_items = new selects();
                $details = $get_items->fetch_count_cond('sales', 'invoice', $invoice);
            ?>
            <tr>
                <td style="text-align:center; color:red;"><?php echo $details?></td>
                
                <td>
                    <?php
                        $get_total = new selects(); 
                        $amounts = $get_total->fetch_sum_single('sales', 'total_amount', 'invoice', $invoice);
                        foreach($amounts as $amount){
                            echo "<p class='total_amount' style='color:green; text-align:center;'>Total Due: ₦".number_format($amount->total, 2)."</p>";
                        }
                    ?>
                </td>
                
                
            </tr>
            
        </tbody>
    </table>

    <?php
    
        //sold by
        $get_seller = new selects();
        $row = $get_seller->fetch_details_group('users', 'full_name', 'user_id', $user);
        echo ucwords("<p class='sold_by'>Sold by: <strong>$row->full_name</strong></p>");
    ?>
    
</div> 
   
<?php
    echo "<script>window.print();
    window.close();</script>";
                    // }
                }
            // }
        
    // }
?>