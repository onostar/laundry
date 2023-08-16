<?php
    session_start();
    $store = $_SESSION['store_id'];
    $detail = "Debt payment";
    
    $posted_by = htmlspecialchars(stripslashes($_POST['posted']));
    $customer = htmlspecialchars(stripslashes($_POST['customer']));
    $mode = htmlspecialchars(stripslashes($_POST['mode']));
    $invoice = ucwords(htmlspecialchars(stripslashes($_POST['invoice'])));
    $amount = htmlspecialchars(stripslashes($_POST['amount']));
    //generate invoice


    //instantiate classes
    include "../classes/dbh.php";
    include "../classes/inserts.php";
    include "../classes/select.php";
    include "../classes/update.php";

    $data = array(
        'amount' => $amount,
        'payment_mode' => $mode,
        'posted_by' => $posted_by,
        'invoice' => $invoice,
        'customer' => $customer,
        'store' => $store
    );
    /* $post_payment = new other_payments($posted_by, $mode, $amount, $invoice, $customer);

    $post_payment->other_payment(); */
    $add_data = new add_data('other_payments', $data);
    $add_data->create_data();
    if($add_data){
        //insert into customer trails
        $insert_trail = new customer_trail($customer, $store, $detail, $amount, $posted_by);
        $insert_trail->add_trail();
        //update debtor
        $update_debt = new Update_table();
        $update_debt->update('debtors', 'debt_status', 'invoice', 1, $invoice);
        echo "<div class='success'><p>Payment posted successfully! <i class='fas fa-thumbs-up'></i></p></div>";
    }
    