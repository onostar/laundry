<?php
    session_start();
    $item = htmlspecialchars(stripslashes($_POST['item']));
    // instantiate class
    include "../classes/dbh.php";
    include "../classes/select.php";
    $vendor = htmlspecialchars(stripslashes($_POST['vendor']));
    $invoice = htmlspecialchars(stripslashes($_POST['invoice']));
    $_SESSION['vendor'] = $vendor;
    $_SESSION['invoice'] = $invoice;
    $get_item = new selects();
    $rows = $get_item->fetch_details_like2Cond('items', 'item_name', 'barcode', $item);
     if(gettype($rows) == 'array'){
        foreach($rows as $row):
        
    ?>

    <option onclick="displayStockinForm('<?php echo $row->item_id?>')">
        <?php echo $row->item_name?>
    </option>
    
<?php
    endforeach;
     }else{
        echo "No resullt found";
     }
?>