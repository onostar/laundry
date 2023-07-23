
<?php
    include "../classes/dbh.php";
    include "../classes/select.php";
    include "../classes/update.php";
    
?>
<button class="page_navs" id="back" onclick="showPage('pay_debt.php')"><i class="fas fa-angle-double-left"></i> Back</button>

<?php
    if(isset($_GET['customer'])){
        $customer = $_GET['customer'];
       
        //get customer details
        $get_customer = new selects();
        $clients = $get_customer->fetch_details_group('customers', 'customer', 'customer_id', $customer);
        $client = $clients->customer;

?>

<div id="debt_payment" class="displays all_details" style="width:70%!important;margin:0 20px!important">
    <!-- <div class="info"></div> -->
        <div class="displays allResults" id="payment_det">
        
            <div class="payment_details">
                <h3 style="width:100%; background:var(--otherColor); color:#fff;padding:5px;font-size:1rem">Showing all unpaid invoices for <?php echo $client?></h3>
                <table id="data_table" class="searchTable">
                <thead>
                <tr style="background:var(--primaryColor)">
                        <td>S/N</td>
                        <td>Invoice</td>
                        <td>Items</td>
                        <td>Amount</td>
                        <td>Date</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        //get transaction history
                        $get_transactions = new selects();
                        $details = $get_transactions->fetch_details_cond('debtors', 'customer', $customer);
                        $n = 1;
                        if(gettype($details) === 'array'){
                        foreach($details as $detail){

                    ?>
                    <tr>
                        <td style="text-align:center; color:red;"><?php echo $n?></td>
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
                        <td style="color:var(--moreColor)"><?php echo date("d-m-Y", strtotime($detail->post_date));?></td>
                        <td>
                            <a style="color:#fff;background:var(--primaryColor); padding:5px; border-radius:5px" href="javascript:void(0)" title="View invoice details" onclick="addPayment('<?php echo $detail->invoice?>')">Pay <i class="fas fa-hand-holding-usd"></i></a>
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
                $amounts = $get_total->fetch_sum_single('debtors', 'amount', 'customer', $customer);
                foreach($amounts as $amount){
                    echo "<p class='total_amount' style='color:red; font-size:1rem;'>Total: ₦".number_format($amount->total, 2)."</p>";
                }
            ?>
            </div>
            
    <div id="customer_invoices">

    </div>
</div>
<?php
            }
        
   
?>