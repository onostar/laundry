<?php

    $exp_head = ucwords(htmlspecialchars(stripslashes($_POST['exp_head'])));

    //instantiate class
    
    include "../classes/dbh.php";
    include "../classes/inserts.php";

    $add_item = new add_single_item('expense_heads', 'expense_head', $exp_head);
    $add_item->create_single_item();