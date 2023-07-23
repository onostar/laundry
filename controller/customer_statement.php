<?php
    session_start();
    $store = $_SESSION['store_id'];
    if(isset($_GET['customer'])){
        $customer = $_GET['customer'];
    }
    $from = $_SESSION['fromDate'];
    $to = $_SESSION['toDate'];
    // instantiate classes
    include "../classes/dbh.php";
    include "../classes/select.php";
    //get customer details
    $get_customer = new selects();
    $rows = $get_customer->fetch_details_cond('customers', 'customer_id', $customer);
    foreach($rows as $row){
        $name = $row->customer;
        $phone = $row->phone_numbers;
        $address = $row->customer_address;
        $email = $row->customer_email;
        $joined = $row->reg_date;
    }
    
?>
<!-- customer info -->

<div class="customer_info" class="allResults">
    <h3>Statment for <?php echo $name?> between '<?php echo date("jS M, Y", strtotime($from)) . "' and '" . date("jS M, Y", strtotime($to))?>'</h3>
    <div class="demography">
        <div class="demo_block">
            <h4><i class="fas fa-id-card"></i> Name:</h4>
            <p><?php echo $name?></p>
        </div>
        <div class="demo_block">
            <h4><i class="fas fa-map"></i> Address:</h4>
            <p><?php echo $address?></p>
        </div>
        <div class="demo_block">
            <h4><i class="fas fa-phone-square"></i> Phone numbers:</h4>
            <p><?php echo $phone?></p>
        </div>
        <div class="demo_block">
            <h4><i class="fas fa-envelope"></i> Email:</h4>
            <p><?php echo $email?></p>
        </div>
        <div class="demo_block">
            <h4>Registered:</h4>
            <p><?php echo date("jS M, Y", strtotime($joined))?></p>
        </div>
    </div>
    <h3 style="background:red; text-align:center; color:#fff; padding:10px;margin:0;">Transactions</h3>
    <div class="transactions">
        <div class="all_credit allResults">
            <h3 style="background:var(--otherColor); color:#fff">All sales transaction</h3>
            <table id="data_table" class="searchTable">
                <thead>
                <tr style="background:var(--primaryColor)">
                        <td>S/N</td>
                        <td>Date</td>
                        <td>Invoice</td>
                        <td>Items</td>
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //get transaction history
                        $get_transactions = new selects();
                        $details = $get_transactions->fetch_details_dateGro1con('payments', 'date(post_date)', $from, $to, 'customer', $customer, 'invoice');
                        $n = 1;
                        if(gettype($details) === 'array'){
                        foreach($details as $detail){

                    ?>
                    <tr>
                        <td style="text-align:center; color:red;"><?php echo $n?></td>
                        <td style="color:var(--moreColor)"><?php echo date("d-m-Y", strtotime($detail->post_date));?></td>
                        <td><a style="color:green" href="javascript:void(0)" title="View invoice details" onclick="viewCustomerInvoice('<?php echo $detail->invoice?>')"><?php echo $detail->invoice?></a></td>  
                        <td style="text-align:center">
                            <?php
                                //get items in invoice;
                                $get_items = new selects();
                                $items = $get_items->fetch_count_cond('sales', 'invoice', $detail->invoice);
                                echo $items;
                            ?>
                        </td>   
                        <td>
                            <?php 
                                //get sum of invoice
                                $get_sum = new selects();
                                $sums = $get_sum->fetch_sum_single('payments', 'amount_paid', 'invoice', $detail->invoice);
                                foreach($sums as $sum){
                                    echo "₦".number_format($sum->total, 2);

                                }
                            ?>
                        </td>
                        
                    </tr>
                    <?php $n++; }}?>
                </tbody>
            </table>
            <?php
                if(gettype($details) == "string"){
                    echo "<p class='no_result'>'$details'</p>";
                }
                // get sum
                $get_total = new selects();
                $amounts = $get_total->fetch_sum_2dateCond('payments', 'amount_paid', 'customer', 'date(post_date)', $from, $to, $customer);
                foreach($amounts as $amount){
                    echo "<p class='total_amount' style='color:red; font-size:1rem;'>Total: ₦".number_format($amount->total, 2)."</p>";
                }
            ?>
        </div>
        <div class="all_credit allResults">
            <h3 style="background:var(--primaryColor); color:#fff">Other transactions</h3>
            <table id="data_table" class="searchTable">
                <thead>
                <tr style="background:var(--primaryColor)">
                        <td>S/N</td>
                        <td>Date</td>
                        <td>Description</td>
                        <!-- <td>Items</td> -->
                        <td>Amount</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //get transaction history
                        $get_transactions = new selects();
                        $details = $get_transactions->fetch_details_cond('customer_trail', 'customer', $customer);
                        $n = 1;
                        if(gettype($details) === 'array'){
                        foreach($details as $detail){

                    ?>
                    <tr>
                        <td style="text-align:center; color:red;"><?php echo $n?></td>
                        <td style="color:var(--moreColor)"><?php echo date("d-m-Y", strtotime($detail->post_date));?></td>
                        <td><?php echo $detail->description?></td>  
                        <td>
                            <?php echo "₦".number_format($detail->amount, 2);

                            ?>
                        </td>
                        
                    </tr>
                    <?php $n++; }}?>
                </tbody>
            </table>
            <?php
                if(gettype($details) == "string"){
                    echo "<p class='no_result'>'$details'</p>";
                }
                // get sum of credit
                $get_credits = new selects();
                $credits = $get_credits->fetch_sum_2date2Cond('customer_trail', 'amount', 'date(post_date)', 'customer', 'description', $from, $to, $customer, 'credit sales');
                foreach($credits as $credit){
                    $debt = $credit->total;
                }
                // get sum of deposit
                $get_deposits = new selects();
                $debits = $get_total->fetch_sum_2date2Cond('customer_trail', 'amount', 'date(post_date)', 'customer', 'description', $from, $to, $customer, 'deposit');
                foreach($debits as $debit){
                    $deposits = $debit->total;
                }
                $total_due = $deposits - $debt;
                    if($total_due >= 0){
                        echo "<p class='total_amount' style='color:green;font-size:1rem;'>Customer balance: ₦".number_format($total_due, 2)."</p>";    
                    }else{
                        echo "<p class='total_amount' style='color:red;font-size:1rem;'>Customer balance: ₦".number_format($total_due, 2)."</p>";

                    }
                
            ?>
        </div>
    </div>
    <div id="customer_invoices">
        
    </div>
</div>