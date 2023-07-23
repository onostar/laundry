<?php

    include "../classes/dbh.php";
    include "../classes/select.php";


?>
<div id="checkReport" class="displays management" style="margin:auto;">
<h2 style="text-transform:capitalize">Check item history</h2>
<hr>
    <div class="select_date">
        <!-- <form method="POST"> -->
        <section style="align-items:flex-end">    
            <div class="from_to_date">
                <label>Select From Date</label><br>
                <input type="date" name="from_date" id="from_date"><br>
            </div>
            <div class="from_to_date">
                <label>Select to Date</label><br>
                <input type="date" name="to_date" id="to_date"><br>
            </div>
            <div class="data">
                <label for="history_item">Select item</label>
                <select name="history_item" id="history_item">
                    <option value="" selected>Select an item</option>
                    <?php
                        $get_item = new selects();
                        $rows = $get_item->fetch_details('items');
                        foreach($rows as $row){
                    ?>
                    <option value="<?php echo $row->item_id?>"><?php echo $row->item_name?></option>
                    <?php }?>
                </select>
            </div>
            <button type="submit" name="search_date" id="search_date" onclick="getItemHistory()">Search <i class="fas fa-search"></i></button>
</section>
    </div>
<div class="displays allResults new_data" style="width:100%!important">
    
</div>

<script src="../jquery.js"></script>
<script src="../script.js"></script>