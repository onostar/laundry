<?php
    session_start();
    $store = $_SESSION['store_id'];
    include "../classes/dbh.php";
    include "../classes/select.php";


?>
<div id="washClothes" class="displays management" style="width:90%!important;margin:10px 20px!important">
<div class="displays allResults new_data" id="revenue_report">
    <h2>List of completed items</h2>
    <hr>
    <div class="search">
        <input type="search" id="searchCheckout" placeholder="Enter keyword" onkeyup="searchData(this.value)">
        <a class="download_excel" href="javascript:void(0)" onclick="convertToExcel('data_table', 'completed items')"title="Download to excel"><i class="fas fa-file-excel"></i></a>
    </div>
    <table id="data_table" class="searchTable">
        <thead>
            <tr style="background:var(--primaryColor)">
                <td>S/N</td>
                <td>Customer</td>
                <td>Invoice</td>
                <td>Total items</td>
                <td>AMount due</td>
                <td>Post Date</td>
                <td>Due Date</td>
                <td>Posted by</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
                $n = 1;
                $get_users = new selects();
                $details = $get_users->fetch_details_2condGroup('sales', 'store', 'laundry_status', $store, 'I', 'invoice');
                if(gettype($details) === 'array'){
                foreach($details as $detail):
            ?>
            <tr>
                <td style="text-align:center; color:red;"><?php echo $n?></td>
                <td>
                    <?php
                        //get customer
                        $get_customer = new selects();
                        $client = $get_customer->fetch_details_group('customers', 'customer', 'customer_id', $detail->customer);
                        echo $client->customer;
                    ?>
                </td>
                <td style="color:var(--otherColor)"><?php echo $detail->invoice?></td>
                <td style="color:green; text-align:Center">
                    <?php 
                        //get total items with that invoice
                        $get_sum = new selects();
                        $sums = $get_sum->fetch_count_cond('sales', 'invoice', $detail->invoice);
                        echo $sums;
                    ?>
                </td>
                <td style="color:red">
                    <?php
                        //get amount due
                        $get_amount_due = new selects();
                        $rows = $get_amount_due->fetch_details_cond('payments', 'invoice', $detail->invoice);
                        foreach($rows as $row){
                            $due = $row->amount_due - $row->amount_paid;
                        }
                        echo "₦".number_format($due, 2);
                    ?>
                </td>
                <td style="color:var(--moreColor)"><?php echo date("d-m-Y", strtotime($detail->post_date));?></td>
                <td style="color:var(--otherColor)"><?php echo date("d-m-Y", strtotime($detail->collection_date));?></td>
                <td>
                    <?php
                        //get posted by
                        $get_posted_by = new selects();
                        $checkedin_by = $get_posted_by->fetch_details_group('users', 'full_name', 'user_id', $detail->posted_by);
                        echo $checkedin_by->full_name;
                    ?>
                </td>
                <td>
                    <a style="color:green; background:var(--otherColor); padding:5px; border-radius:5px; color:#fff" href="javascript:void(0)" title="View invoice details" onclick="showPage('completed_items.php?invoice=<?php echo $detail->invoice?>')"> <i class="fas fa-eye"></i> View</a>
                </td>
                
            </tr>
            <?php $n++; endforeach;}?>
        </tbody>
    </table>
    <?php
        if(gettype($details) == "string"){
            echo "<p class='no_result'>'$details'</p>";
        }
    ?>
    

</div>

<script src="../jquery.js"></script>
<script src="../script.js"></script>