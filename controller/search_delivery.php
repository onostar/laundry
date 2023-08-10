<?php
    session_start();
    $store = $_SESSION['store_id'];
    $from = htmlspecialchars(stripslashes($_POST['from_date']));
    $to = htmlspecialchars(stripslashes($_POST['to_date']));

    // instantiate classes
    include "../classes/dbh.php";
    include "../classes/select.php";

    $get_purchase = new selects();
    $details = $get_purchase->fetch_details_2date2Con('sales', 'date(issued_date)', $from, $to, 'store', $store, 'laundry_status', 'D');
    $n = 1;  
?>
<h2>Issued items Register between '<?php echo date("jS M, Y", strtotime($from)) . "' and '" . date("jS M, Y", strtotime($to))?>'</h2>
    <hr>
    <div class="search">
        <input type="search" id="searchPurchase" placeholder="Enter keyword" onkeyup="searchData(this.value)">
        <a class="download_excel" href="javascript:void(0)" onclick="convertToExcel('data_table', 'Issued items report')"title="Download to excel"><i class="fas fa-file-excel"></i></a>
    </div>
    <table id="data_table" class="searchTable">
        <thead>
            <tr style="background:var(--primaryColor)">
                <td>S/N</td>
                <td>Invoice</td>
                <td>Customer</td>
                <td>Item</td>
                <td>Quantity</td>
                <td>Job type</td>
                <td>Post time</td>
                <td>Post date</td>
                <td>Issued by</td>
                
            </tr>
        </thead>
        <tbody>
<?php
    if(gettype($details) === 'array'){
    foreach($details as $detail){

?>
            <tr>
                <td style="text-align:center; color:red;"><?php echo $n?></td>
                <td style="color:var(--moreColor)"><?php echo $detail->invoice?></td>
                <td>
                    <?php
                        $get_guest = new selects();
                        $rows = $get_guest->fetch_details_group('customers', 'customer', 'customer_id', $detail->customer);
                        echo $rows->customer;
                    ?>
                </td>
                <td>
                    <?php
                        $get_guest = new selects();
                        $rows = $get_guest->fetch_details_group('items', 'item_name', 'item_id', $detail->item);
                        echo $rows->item_name;
                    ?>
                </td>
                <td style="text-align:center; color:green;"><?php echo $detail->quantity;?></td>
                <td><?php echo $detail->job_type;?></td>
                <td style="color:var(--moreColor)"><?php echo date("jS M, Y", strtotime($detail->issued_date));?></td>
                <td style="color:var(--moreColor)"><?php echo date("H:i:sa", strtotime($detail->issued_date));?></td>
                <td>
                    <?php
                        //get posted by
                        $get_posted_by = new selects();
                        $posted_by = $get_posted_by->fetch_details_group('users', 'full_name', 'user_id', $detail->issued_by);
                        echo $posted_by->full_name;
                    ?>
                </td>
                
            </tr>
            <?php $n++; }?>
        </tbody>
    </table>
<?php
    }else{
        echo "<p class='no_result'>'$details'</p>";
    }
    // get sum
    /* $get_total = new selects();
    $amounts = $get_total->fetch_sum_2col2date1con('purchases', 'cost_price', 'quantity', 'date(post_date)', $from, $to, 'store', $store);
    foreach($amounts as $amount){
        echo "<p class='total_amount' style='color:green; text-align:center'>Total: ₦".number_format($amount->total, 2)."</p>";
    } */
?>
