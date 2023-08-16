<?php
    include "../classes/dbh.php";
    include "../classes/select.php";
?>
<div id="addUser" class="displays">
    <div class="info"></div>
    <div class="add_user_form">
        <h3>Add Users</h3>
        <!-- <form method="POST" id="addUserForm"> -->
        <section class="addUserForm">
            <div class="inputs" style="gap:1rem;">
                <div class="data">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="full_name" id="full_name" placeholder="Enter full name" required>
                </div>
                <div class="data">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter username" required>
                </div>
                <div class="data">
                    <label for="Phone_number">Phone number</label>
                    <input type="text" name="phone_number" id="phone_number" placeholder="07012345678" required>
                </div>
                <div class="data">
                    <label for="email_address">Email</label>
                    <input type="text" name="email_address" id="email_address" placeholder="Mail@example.com">
                </div>
                <div class="data">
                    <label for="home_address">Home Address</label>
                    <input type="text" name="home_address" id="home_address" placeholder="Your residential address">
                </div>
                <div class="data">
                    <label for="user_role">User role</label>
                    <select name="user_role" id="user_role" required style="padding:10px;border-radius:10px">
                        <option value="" selected>Select role</option>
                        <option value="Admin">Admin</option>
                        <option value="Cashier">Cashier</option>
                        <option value="Sales rep">Sales Rep</option>
                    </select>
                </div>
                <div class="data">
                    <label for="store">Branch</label>
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
                </div>
                <div class="data">
                    <button type="submit" id="add_user" name="add_user" title="add user" onclick="addUser()"><i class="fas fa-user-plus"></i> Add user</button>
                        
                </div>
            </div>
        </section>    
        <!-- </form> -->
    </div>
</div>
