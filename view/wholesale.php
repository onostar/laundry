<?php
    session_start();
    $store = $_SESSION['store_id'];
    include "../classes/dbh.php";
    include "../classes/select.php";
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        // echo $user_id;

?>
<div id="direct_sales">
<div id="sales_form" class="displays all_details">
    <?php
        //generate receipt invoice
        //get current date
        $todays_date = date("dmyh");
        $ran_num ="";
        for($i = 0; $i < 4; $i++){
            $random_num = random_int(0, 9);
            $ran_num .= $random_num;
        }
        ;
        $invoice = "KL".$user_id.$ran_num.$store.$todays_date;
        $_SESSION['invoice'] = $invoice;
    ?>
    
    <div class="add_user_form" style="width:50%; margin:10px 0;">
        <h3 style="background:var(--primaryColor); color:#ff; text-align:left!important;" >Laundry order <?php echo $invoice?></h3>
        
            <!-- search forms -->
        <!-- <form method="POST" id="addUserForm"> -->
            <section class="addUserForm">
                <div class="inputs">
                    <!-- bar items form -->
                    <div class="data" style="width:60%">
                    <label for="customer">customer</label>
                        <input type="text" name="customer" id="customer" oninput="getCustomers(this.value)" placeholder="Enter customer name or phone number">
                        <div class="search_results" id="search_results">

                        </div>
                    </div>
                    <div class="data" style="width:35%">
                        <button onclick="showPage('add_customer.php')">Add customer <i class="fas fa-user-plus"></i></button>
                    </div>
                    <div class="data" id="bar_items" style="width:100%; margin:10px 0">
                        <label for="item"> Search Items</label>
                        <input type="hidden" name="sales_invoice" id="sales_invoice" value="<?php echo $invoice?>">
                        <input type="text" name="item" id="item" required placeholder="Input item name or barcode" onkeyup="getWholesaleItems(this.value)">
                        <div id="sales_item">
                            
                        </div>
                    </div>
                    
                </div>
            </section>
            
        </div>
    </div>

</div>
<!-- for editing item quantitiy and price -->
<div class="show_more"></div>
<!-- showing all items in the sales order -->
<div class="sales_order"></div>
<?php
    }else{
        header("Location: ../index.php");
    }
?>
</div>