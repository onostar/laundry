
    <h2><?php echo $_SESSION['company'];?></h2>
    <p><?php echo $address?></p>
    <p>Tel: <?php echo $phone?></p>
    <!-- get sales type -->
    <?php 
        if($type == "Wholesale"){
            //get wholesale customer
            $get_customer = new selects();
            $clients = $get_customer->fetch_details_group('customers', 'customer', 'customer_id', $customer);
            echo "<p style='border:1px solid #000'><strong>Customer:</strong>$clients->customer</p>";
        }
    ?>
    <div class="receipt_head">
        <p><?php echo $invoice?></p>
        
