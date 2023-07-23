<?php

    include "../classes/dbh.php";
    include "../classes/select.php";


?>
    <div class="info"></div>
<div class="displays allResults" id="staff_list" style="width:80%!important;margin:50px!important">
    <h2>Customer list</h2>
    <hr>
    <div class="search">
        <input type="search" id="searchStaff" placeholder="Enter keyword" onkeyup="searchData(this.value)">
    </div>
    <table id="room_list_table" class="searchTable">
        <thead>
            <tr style="background:var(--moreColor)">
                <td>S/N</td>
                <td>Customer name</td>
                <td>Phone number</td>
                <td>Address</td>
                <td>Email</td>
                <td>Date reg</td>
            </tr>
        </thead>
        <tbody>
            <?php
                $n = 1;
                $get_details = new selects();
                $details = $get_details->fetch_details('customers');
                if(gettype($details) === 'array'){
                foreach($details as $detail):
            ?>
            <tr>
                <td style="text-align:center; color:red;"><?php echo $n?></td>
                <td><?php echo $detail->customer?></td>
                <td><?php echo $detail->phone_numbers?></td>
                <td><?php echo $detail->customer_address?></td>
                <td><?php echo $detail->customer_email?></td>
                <td><?php echo date("jS M, Y", strtotime($detail->reg_date))?></td>
                
                
            </tr>
            
            <?php $n++; endforeach;}?>
        </tbody>
    </table>
    
    <?php
        if(gettype($details) == "string"){
            echo "<p class='no_result'>'$details'</p>";
        }
    ?>
</div>