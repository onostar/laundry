<?php
    include "../classes/dbh.php";
    include "../classes/select.php";
?>
<div id="addUser" class="displays">
    <div class="info"></div>
    <div class="add_user_form">
        <h3>Add Users</h3>
        <!-- <form method="POST" id="addUserForm"> -->
        <form class="addUserForm">
            <div class="inputs">
                <input type="text" name="full_name" id="full_name" placeholder="Enter full name" required>
                <input type="text" name="username" id="username" placeholder="Enter username" required>
                <select name="user_role" id="user_role" required style="padding:10px;border-radius:10px">
                    <option value="" selected>Select role</option>
                    <option value="Admin">Admin</option>
                    <option value="cashier">Cashier</option>
                    <option value="sales rep">Sales Rep</option>
                </select>
                <select name="store" id="store" style="padding:10px; border-radius:10px">
                    <option value=""selected>Select Store</option>
                    <!-- get stores -->
                    <?php
                        $get_stores = new selects();
                        $rows = $get_stores->fetch_details('stores');
                        foreach($rows as $row){

                    ?>
                    <option value="<?php echo $row->store_id?>"><?php echo $row->store?></option>
                    <?php }?>
                </select>
                <button type="submit" id="add_user" name="add_user" title="add user" onclick="addUser()"><i class="fas fa-plus"></i></button>
            </div>
        </form>    
        <!-- </form> -->
    </div>
</div>
