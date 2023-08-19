<?php
    session_start();
    $store = $_SESSION['store_id'];
    include "../classes/dbh.php";
    include "../classes/select.php";
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
?>

<div id="washed" class="displays" style="width:70%!important; margin:50px 20px!important">
    <?php
        //get invoice
        if(isset($_GET['invoice'])){
            $invoice = $_GET['invoice'];
            $_SESSION['invoice'] = $invoice;
            //get store
            $get_store = new selects();
            $strs = $get_store->fetch_details_group('sales', 'store', 'invoice', $invoice);
            $to_store = $strs->store;
            //get store name
            $get_store_name = new selects();
            $store_names = $get_store_name->fetch_details_group('stores', 'store', 'store_id', $to_store);

        }
    ?>
    
    <div class="info"></div>
    <div class="stocked_in">
        <div class="displays allResults" id="stocked_items">
            <h2>Items on invoice <?php echo $invoice?></h2>
            <table id="stock_items_table" class="searchTable">
                <thead>
                    <tr style="background:var(--moreColor)">
                        <td>S/N</td>
                        <td>Item name</td>
                        <td>Quantity</td>
                        <!-- <td>Unit cost</td> -->
                        <td>Unit Price</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $n = 1;
                        $get_items = new selects();
                        $details = $get_items->fetch_details_3cond1neg('sales', 'store', 'invoice', 'laundry_status', $store, $invoice, 'D');
                        if(gettype($details) === 'array'){
                        foreach($details as $detail):
                            $get_ind = new selects();
                            $alls = $get_ind->fetch_details_cond('items', 'item_id', $detail->item);
                            foreach($alls as $all){
                                // $cost_price = $all->cost_price;
                                // $sales_price = $all->sales_price;
                                $itemname = $all->item_name;
                            }
                    ?>
                    <tr>
                        <td style="text-align:center; color:red;"><?php echo $n?></td>
                        <td style="color:var(--moreClor);">
                            <?php
                                echo $itemname;
                            ?>
                        </td>
                        <td style="text-align:center"><?php echo $detail->quantity?></td>
                        <!-- <td>
                            <?php 
                                echo "₦".number_format($detail->cost_price, 2);
                            ?>
                        </td> -->
                        <td>
                            <?php 
                                echo "₦".number_format($detail->price, 2);
                            ?>
                        </td>
                        <td style="display:flex;align-items:center; gap:.5rem;">
                            <?php
                                if($detail->laundry_status == "W"){
                                    echo "<p style='color:var(--moreColor)'>Washed</p>";
                                
                            ?>
                                <a style="color:#fff; background:green; padding:5px; border-radius:5px; font-size:.9rem" href="javascript:void(0) "title="Iron item" onclick="changeStatus('<?php echo $detail->sales_id?>', '<?php echo $invoice?>', 'iron_item.php', 'due_items.php')">Iron <i class="fas fa-check-double"></i></a>
                            <?php 
                                }if($detail->laundry_status == "I"){
                                    echo "<p style='color:green'>Ironed</p>";
                            ?>
                                <a style="color:#fff; background:green; padding:5px; border-radius:5px; font-size:.9rem" href="javascript:void(0) "title="Issue to customer" onclick="changeStatus('<?php echo $detail->sales_id?>', '<?php echo $invoice?>', 'issue_item.php', 'due_items.php')">Issue <i class="fas fa-check-double"></i></a>
                            <?php }if($detail->laundry_status == "C"){
                                echo "<p style='color:red'>Not washed</p>";
                            ?>
                                <a style="color:#fff; background:var(--otherColor); padding:5px; border-radius:5px; font-size:.9rem" href="javascript:void(0) "title="Wash item" onclick="changeStatus('<?php echo $detail->sales_id?>', '<?php echo $invoice?>', 'wash_item.php', 'due_items.php')">Wash <i class="fas fa-check-double"></i></a>
                            <?php }?>
                        </td>
                        
                    </tr>
                    
                    <?php $n++; endforeach;}?>
                </tbody>
            </table>

            
            <?php
                if(gettype($details) == "string"){
                    echo "<p class='no_result'>'$details'</p>";
                
            ?>
                <button class="page_navs" id="back" onclick="showPage('due_collection.php')"><i class="fas fa-angle-double-left"></i> Return</button>
            
            <?php
                }
                // get sum
                if(gettype($details) === 'array'){
                    $get_total = new selects();
                    $amounts = $get_total->fetch_sum_2con('sales', 'price', 'quantity', 'store', 'invoice', $store, $invoice);
                    foreach($amounts as $amount){
                        $total_amount = $amount->total;
                    }
                    // $total_worth = $total_amount * $total_qty;
                    echo "<p class='total_amount' style='color:var(--primaryColor)'>Total Amount: ₦".number_format($total_amount, 2)."</p>";
                ?>
                <div class="close_stockin">
                    <!-- <button onclick="changeAllStatus('<?php echo $invoice?>', 'issue_all.php', 'completed_items.php')" style="background:green; padding:8px; border-radius:5px;">Issue all <i class="fas fa-check-double"></i></button> -->

                    <button class="page_navs" id="back" onclick="showPage('due_collection.php')"><i class="fas fa-angle-double-left"></i> Return</button>
                    
                </div>
            <?php }?>
        </div> 
    </div>
</div>
<?php
    }else{
        header("Location: ../index.php");
    }
?>