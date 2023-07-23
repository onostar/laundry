<aside class="main_menu" id="mobile_log">
    
    <nav>
        <h3><a href="users.php" title="Home"><i class="fas fa-home"></i> Main menus</a></h3>
        <ul>
            <?php 
                
                $get_rights = new selects();
                $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'menu', "1");
                if($row > 0 || $role == "Admin"){
            
            ?>
            <li><a href="javascript:void(0);" onclick="toggleMenu('adminMenus')"class="allMenus" title="Administrator Setup menu" id="adminMenu"><span><i class="fas fa-gem"></i> Admin menu</span> <span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu adminMenu" id="adminMenus">
                    <!-- <?php 
                        
                        if($role == "Admin"){
                    ?>   
                    <li><a href="javascript:void(0);" title="Manage company details" class="page_navs" onclick="showPage('manage_profile.php')"><i class="fas fa-building"></i> Manage profile</a></li>
                    <?php }?> -->
                    <?php 
                        
                        if($fullname == "Administrator"){
                    ?>   
                    <li><a href="javascript:void(0);" title="Add store" class="page_navs" onclick="showPage('add_store.php')"><i class="fas fa-store"></i> Add store</a></li>
                    <?php }?>
                    <?php 
                        
                        if($role == "Admin"){
                    ?>   
                    <li><a href="javascript:void(0);" title="Update store" class="page_navs" onclick="showPage('update_store.php')"><i class="fas fa-store"></i> Update Store details</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "1");
                        if($row > 0 || $role == "Admin"){
                    ?>   
                    <li><a href="javascript:void(0);" title="Add users" class="page_navs" onclick="showPage('add_user.php')"><i class="fas fa-user-plus"></i> Add Users</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "2");
                        if($row > 0 || $role == "Admin"){
                    ?>   
                    <li><a href="javascript:void(0);" title="Disable users" class="page_navs" onclick="showPage('disable_user.php')"><i class="fas fa-user-slash"></i> Disable user</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "3");
                        if($row > 0 || $role == "Admin"){
                    ?>   
                    <li><a href="javascript:void(0);" title="Activate users" class="page_navs" onclick="showPage('activate_user.php')"><i class="fas fa-user-check"></i> Activate user</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "4");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Reset user password" class="page_navs" onclick="showPage('reset_password.php')"><i class="fas fa-eye"></i> Reset password</a></li>
                    <?php }?>
                    <?php if($role == "Admin"){?>
                    <li><a href="javascript:void(0);" title="Add rights to user" class="page_navs" onclick="showPage('add_rights.php')"><i class="fas fa-key"></i> Add user rights</a></li>
                    <?php }?>
                    <?php if($role == "Admin"){?>
                    <li><a href="javascript:void(0);" title="Add rights to user" class="page_navs" onclick="showPage('delete_right.php')"><i class="fas fa-key"></i> Delete rights</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "5");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Add departments" class="page_navs" onclick="showPage('add_department.php')"><i class="fas fa-layer-group"></i> Add Category</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "6");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Add categories" class="page_navs" onclick="showPage('add_category.php')"><i class="fas fa-layer-group"></i> Add Sub-category</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "51");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Add categories" class="page_navs" onclick="showPage('change_category.php')"><i class="fas fa-layer-group"></i>Change category</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "7");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Create items" class="page_navs" onclick="showPage('add_item.php')"><i class="fas fa-gift"></i> Add Items</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "8");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="modify item names" class="page_navs" onclick="showPage('modify_item.php')"><i class="fas fa-folder"></i> Modify Item name</a></li>
                    <?php }?>
                    <!-- <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "52");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="modify item names" class="page_navs" onclick="showPage('update_barcode.php')"><i class="fas fa-barcode"></i> Update item barcode</a></li>
                    <?php }?> -->
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "9");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Add banks" class="page_navs" onclick="showPage('add_bank.php')"><i class="fas fa-bank"></i> Add Bank</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "62");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Add customer" class="page_navs" onclick="showPage('add_customer.php')"><i class="fas fa-user-tie"></i> Add Customer</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "10");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="manage other item prices" class="page_navs" onclick="showPage('item_price.php')"><i class="fas fa-tags"></i> Manage item prices</a></li>
                    <?php }?>
                    <!-- <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "11");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Add item remove reasons" class="page_navs" onclick="showPage('add_remove_reasons.php')"><i class="fas fa-tags"></i> Add remove reasons</a></li>
                    <?php }?> -->
                    <li><a href="javascript:void(0);" title="Help and Faqs" class="page_navs" onclick="showPage('admin_help.php')"><i class="fas fa-question-circle"></i> Help</a></li>
                </ul>
            </li>
        
            <?php }?>
            <?php 
                $get_rights = new selects();
                $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'menu', "2");
                if($row > 0 || $role == "Admin"){
            
            ?>
            <li><a href="javascript:void(0);" onclick="toggleMenu('salesMenu')"class="allMenus" title="payment menu" data-menu="payments" id="payments"><span><i class="fas fa-gem"></i> </span><span>Sales management</span><span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu" id="salesMenu">
                    <!-- <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "12");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="direct sales" class="page_navs" onclick="showPage('direct_sales.php')"><i class="fas fa-clipboard"></i> Direct sales</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "13");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Raise sales order" class="page_navs" onclick="showPage('sales_order.php')"><i class="fas fa-clipboard"></i> Sales order</a></li>
                    <?php }?> -->
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "60");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Collect clothe from customer" class="page_navs" onclick="showPage('wholesale.php')"><i class="fas fa-luggage-cart"></i> Collect clothes</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "15");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Return sales" class="page_navs" onclick="showPage('sales_return.php')"><i class="fas fa-hand-holding-dollar"></i> Sales return</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "16");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Reprint sales receipt" class="page_navs" onclick="showPage('print_receipt.php')"><i class="fas fa-print"></i> Reprint receipt</a></li>
                    <?php }?>
                    <!-- <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "14");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="Post sales order" class="page_navs" onclick="showPage('post_sales_order.php')"><i class="fas fa-hand-holding-dollar"></i> Post sales order</a></li>
                    <?php }?> -->
                    <li><a href="javascript:void(0);" title="Help and Faqs" class="page_navs" onclick="showPage('sales_help.php')"><i class="fas fa-question-circle"></i> Help</a></li>
                </ul>
            </li>
            <?php }?>
            <?php 
                $get_rights = new selects();
                $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'menu', "3");
                if($row > 0 || $role == "Admin"){
            ?> 
            <li><a href="javascript:void(0);" onclick="toggleMenu('inventoryMenu')"  class="allMenus" title="Inventory menu" data-menu="inventory" id="inventory"><span><i class="fas fa-gem"></i> Inventory </span><span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu inventory" id="inventoryMenu">
                    <!-- <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "17");
                        if($row > 0 || $role == "Admin"){
                    ?> 
                    <li><a href="javascript:void(0);" title="set reorder level" class="page_navs" onclick="showPage('reorder_level.php')"><i class="fas fa-sort-numeric-down"></i> Set reorder level</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "18");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Stock balance" class="page_navs" onclick="showPage('stock_balance.php')"><i class="fas fa-drum"></i> Stock balance</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "59");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="All store Stock balance" class="page_navs" onclick="showPage('all_store_balance.php')"><i class="fas fa-database"></i> All Store balance</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "19");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Stockin items purchased" class="page_navs" onclick="showPage('stockin_purchase.php')"><i class="fas fa-cart-plus"></i> Stockin purchases</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "20");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Add a supplier purchased" class="page_navs" onclick="showPage('add_vendor.php')"><i class="fas fa-user-tie"></i> Add supplier</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "21");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Adjust item quantity" class="page_navs" onclick="showPage('stock_adjustment.php')"><i class="fas fa-sliders"></i> Adjust Quantity</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "22");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Remove item quantity" class="page_navs" onclick="showPage('remove_item.php')"><i class="fas fa-eject"></i> Remove item</a></li>
                    <?php }?> -->
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "71");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Post clothes for washing" class="page_navs" onclick="showPage('wash_clothes.php')"><i class="fas fa-t-shirt"></i> Wash clothes</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "72");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Post clothes for ironing" class="page_navs" onclick="showPage('iron_clothes.php')"><i class="fas fa-hands-bubbles"></i> Iron clothes</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "73");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="All items completed" class="page_navs" onclick="showPage('completed_job.php')"><i class="fas fa-hands-bubbles"></i> Completed job</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "74");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Items due for collection" class="page_navs" onclick="showPage('due_collection.php')"><i class="fas fa-hands-bubbles"></i> Due for collection</a></li>
                    <?php }?>
                    <!-- <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "23");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Adjust item expiry date" class="page_navs" onclick="showPage('adjust_expiration.php')"><i class="fas fa-eject"></i> Adjust expiration</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "53");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Transfer items to store" class="page_navs" onclick="showPage('transfer_item.php')"><i class="fas fa-exchange"></i> Transfer items</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "54");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Transfer items to store" class="page_navs" onclick="showPage('pending_transfer.php')"><i class="fas fa-random"></i> Pending Transfer</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "55");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Accept transferred item to store" class="page_navs" onclick="showPage('accept_items.php')"><i class="fas fa-vote-yea"></i> Accept items</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "56");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="View returned transferred item to store" class="page_navs" onclick="showPage('returned_transfer.php')"><i class="fas fa-undo-alt"></i> Returned transfer</a></li>
                    <?php }?> -->
                    <li><a href="javascript:void(0);" title="Help and Faqs" class="page_navs" onclick="showPage('inventory_help.php')"><i class="fas fa-question-circle"></i> Help</a></li>
                </ul>
            </li>
            <?php }?>
            <?php 
                $get_rights = new selects();
                $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'menu', "4");
                if($row > 0 || $role == "Admin"){
            ?>
            <li><a href="javascript:void(0);" onclick="toggleMenu('accountMenu')" class="allMenus" title="Accouunt menu" data-menu="accounts" id="account"><span><i class="fas fa-gem"></i> </span><span> Financial Management </span><span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu accounts" id="accountMenu">
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "24");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Add expense titles" class="page_navs" onclick="showPage('add_exp_head.php')"><i class="fas fa-money-check-alt"></i> Add Expense Head</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "25");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Post daily expenses" class="page_navs" onclick="showPage('post_expense.php')"><i class="fas fa-money-check-alt"></i> Post Expense</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "69");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Pay customers debt" class="page_navs" onclick="showPage('pay_debt.php')"><i class="fas fa-hand-holding-usd"></i> Pay debt</a></li>
                    <?php }?>
                    <li><a href="javascript:void(0);" title="Help and Faqs" class="page_navs" onclick="showPage('expense_help.php')"><i class="fas fa-question-circle"></i> Help</a></li>
                </ul>
            </li>
            <?php }?>
            <?php 
                $get_rights = new selects();
                $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'menu', "5");
                if($row > 0 || $role == "Admin"){
            ?>
            <li><a href="javascript:void(0);" onclick="toggleMenu('reportsMenu')" class="allMenus" title="General Reports" data-menu="reports" id="reports"><span><i class="fas fa-gem"></i> Reports </span><span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu reports" id="reportsMenu">
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "26");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="List of bar items" class="page_navs" onclick="showPage('item_list.php')"><i class="fas fa-list-check"></i> Item List</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "27");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="List of banks" class="page_navs" onclick="showPage('Bank_list.php')"><i class="fas fa-bank"></i> Bank List</a></li>
                    <?php }?>
                    <!-- <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "28");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="List of suppliers" class="page_navs" onclick="showPage('vendor_list.php')"><i class="fas fa-users"></i> List of suppliers</a></li>
                    <?php }?> -->
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "29");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Check in report" class="page_navs" onclick="showPage('sales_return_report.php')"><i class="fas fa-gauge"></i> Sales return report</a></li>
                    <?php }?>
                    <!-- <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "30");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Stock adjusmnet report" class="page_navs" onclick="showPage('stock_adjustment_report.php')"><i class="fas fa-door-open"></i> stock adjustment report</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "31");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Item quantity removed report" class="page_navs" onclick="showPage('item_removed_report.php')"><i class="fas fa-door-open"></i> Item removed report</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "33");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Purchase reports" class="page_navs" onclick="showPage('purchase_reports.php')"><i class="fas fa-shopping-cart"></i> Purchase reports</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "34");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Items with zero quantity" class="page_navs" onclick="showPage('out_of_stock.php')"><i class="fas fa-database"></i> Out of stock</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "35");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Items soon to expire" class="page_navs" onclick="showPage('expire_soon.php')"><i class="fas fa-database"></i> Soon to expire</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "36");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="ALl expired items" class="page_navs" onclick="showPage('expired_items.php')"><i class="fas fa-power-off"></i> Expired items</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "37");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Items reached reaorder level" class="page_navs" onclick="showPage('reached_reorder.php')"><i class="fas fa-ban"></i> Reached reorder level</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "38");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Check item history" class="page_navs" onclick="showPage('item_history.php')"><i class="fas fa-chart-line"></i> Item History</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "39");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Item purchase history" class="page_navs" onclick="showPage('purchase_by_item.php')"><i class="fas fa-shopping-cart"></i> Purchase by item</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "40");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Vendor purchase history" class="page_navs" onclick="showPage('purchase_per_vendor.php')"><i class="fas fa-users"></i> Purchase per vendor</a></li>
                    <?php }?> -->
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "49");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Highest Selling item" class="page_navs" onclick="showPage('highest_selling.php')"><i class="fas fa-chart-line"></i> Highest Washed items</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "50");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Fast Selling items" class="page_navs" onclick="showPage('fast_selling.php')"><i class="fas fa-chart-line"></i> Fast Washed items</a></li>
                    <?php }?>
                    <!-- <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "57");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Transferred items report" class="page_navs" onclick="showPage('transfer_report.php')"><i class="fas fa-exchange"></i> Transfer report</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "57");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Accepted items report" class="page_navs" onclick="showPage('accept_report.php')"><i class="fas fa-exchange"></i> Accept report</a></li>
                    <?php }?> -->
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "63");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="List of customers" class="page_navs" onclick="showPage('customer_list.php')"><i class="fas fa-user-nurse"></i> Customer List</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "75");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Items issued to customers" class="page_navs" onclick="showPage('issued_items.php')"><i class="fas fa-user-nurse"></i> Item issued report</a></li>
                    <?php }?>
                    <li><a href="javascript:void(0);" title="Help and Faqs" class="page_navs" onclick="showPage('reports_help.php')"><i class="fas fa-question-circle"></i> Help</a></li>
                </ul>
            </li>
            <?php }?>
            <?php 
                $get_rights = new selects();
                $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'menu', "6");
                if($row > 0 || $role == "Admin"){
            ?>
            <li><a href="javascript:void(0);" onclick="toggleMenu('financeReports')" class="allMenus" title="Financial Reports" data-menu="financial_reports" id="financial_reports"><span><i class="fas fa-gem"></i> </span><span>Financial Reports </span><span class="second_icon"><i class="fas fa-chevron-down more_option"></i></span></a>
                <ul class="subMenu financial_reports" id="financeReports">
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "41");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Revenue report" class="page_navs" onclick="showPage('revenue_report.php')"><i class="fas fa-coins"></i> Sales report</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "64");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="All retail transactions" class="page_navs" onclick="showPage('retail_sales.php')"><i class="fas fa-coins"></i> Retail Sales</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "65");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="All wholesale transactions" class="page_navs" onclick="showPage('wholesale_report.php')"><i class="fas fa-coins"></i> Wholesale report</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "42");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Cash list report" class="page_navs" onclick="showPage('cash_list.php')"><i class="fas fa-money-check"></i> Cash Sales list</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "43");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Transfer list report" class="page_navs" onclick="showPage('pos_list.php')"><i class="fas fa-money-check"></i> Pos Sales list</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "44");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Transfer list report" class="page_navs" onclick="showPage('transfer_list.php')"><i class="fas fa-wifi"></i> Transfer Sales list</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "67");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Credit sales list report" class="page_navs" onclick="showPage('credit_sales_list.php')"><i class="fas fa-coins"></i> Credit Sales list</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "45");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Money collected by cashier" class="page_navs" onclick="showPage('cashier_report.php')"><i class="fas fa-user"></i> Cashier Report</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "46");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Check revenue by category" class="page_navs" onclick="showPage('revenue_by_category.php')"><i class="fas fa-layer-group"></i> Revenue by category</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "47");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Profit and loss statements" class="page_navs" onclick="showPage('profit_and_loss.php')"><i class="fas fa-layer-group"></i> Profit & Loss Statement</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "48");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Check daily expenses" class="page_navs" onclick="showPage('expense_report.php')"><i class="fas fa-money-check"></i> Expense Report</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "66");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Check customers statement of account" class="page_navs" onclick="showPage('customer_statement.php')"><i class="fas fa-users"></i> Customer statement</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "68");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Check list of debtors" class="page_navs" onclick="showPage('debtors_list.php')"><i class="fas fa-users"></i> Debtors report</a></li>
                    <?php }?>
                    <?php 
                        $get_rights = new selects();
                        $row = $get_rights->fetch_count_2cond('rights', 'user', $user_id, 'sub_menu', "68");
                        if($row > 0 || $role == "Admin"){
                    ?>
                    <li><a href="javascript:void(0);" title="Check debt payments" class="page_navs" onclick="showPage('debt_payment_report.php')"><i class="fas fa-hand-holding-usd"></i> Debt payment report</a></li>
                    <?php }?>
                    <li><a href="javascript:void(0);" title="Help and Faqs" class="page_navs" onclick="showPage('financial_help.php')"><i class="fas fa-question-circle"></i> Help</a></li>
                </ul>
            </li>
            <?php }?>
            
        </ul>
    </nav>
</aside>