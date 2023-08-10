<?php
    session_start();

    include "../classes/dbh.php";
    include "../classes/select.php";

    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
        // instantiate classes
        $fetch_user = new selects();
        $users = $fetch_user->fetch_details_cond('users', 'username', $username);
        foreach($users as $user){
            $fullname = $user->full_name;
            $role = $user->user_role;
            $user_id = $user->user_id;
            $store_id = $user->store;
        }
        $_SESSION['user_id'] = $user_id;

        /* get company */
        $fetch_comp = new selects();
        $comps = $fetch_comp->fetch_details('companies');
        foreach($comps as $com){
            $company = $com->company;
            $comp_id = $com->company_id;
        }
        $_SESSION['company_id'] = $comp_id;
        $_SESSION['company'] = $company;
    
        /* get store */
        $get_store = new selects();
        $strs = $get_store->fetch_details_cond('stores', 'store_id', $store_id);
        foreach($strs as $str){
            $store = $str->store;
            $store_address = $str->store_address;
            $phone = $str->phone_number;
        }
        $_SESSION['store_id'] = $store_id;
        $_SESSION['store'] = $store;
        $_SESSION['address'] = $store_address;
        $_SESSION['phone'] = $phone;
        // }
    // echo $menus;
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="keywords" content="laundry software, laundry application, laundry management, software">
    <meta name="description" content="A laundry management system developed for managing clients, and clothes brought in and out, as well as revenue">
    <title>Laundry management</title>
    <link rel="icon" type="image/png" size="32x32" href="../images/icon.png">
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" href="../fontawesome-free-5.15.1-web/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../select2.min.css">
</head>
<body>
    <main>
        <header>
            <div class="menu_icon" id="menu_icon">
                <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
            </div>
            <h1 class="logo">
                <a href="users.php" title="Logistics">
                    <img src="../images/logo.png" alt="Logo" class="img-fluid">
                </a>
            </h1>
            <h2 style="margin-left:50px!important"><?php echo $company?></h2>
            <!-- <div class="other_menu">
                <a href="#" title="Our Gallery"><?php echo ucwords($role);?></a>
            </div> -->
            <a href="#" title="my role" class="other_menu"><?php echo ucwords($store);?></a>

            <div class="login">
                
                <button id="loginDiv"><i class="far fa-user"></i> <?php echo ucwords($fullname);?> <i class="fas fa-chevron-down"></i><br><p><?php echo ucwords($role);?></p></button>
                
                <div class="login_option">
                    <div>
                        <a class="password_link page_navs" href="javascript:void(0)" data-page="update_password" onclick="showPage('update_password.php')">Change password <i class="fas fa-key"></i></a>
                        <button id="loginBtn"><a href="../controller/logout.php">Log out <i class="fas fa-power-off"></i></a></button>
                    </div>
                </div>
            </div>
            
        </header>
        <div class="admin_main">
            
            <!-- side menu -->
            
            <?php 
                    include "side_menu.php";

            
            ?>
            <!-- main contents -->
            <section id="contents">
                
                <!-- quick links -->
                <div id="quickLinks">
                    <div class="quick_links">
                        <!-- check if sales right exist -->
                        
                        <div class="links page_navs" onclick="showPage('wholesale.php')" title="Create new order">
                            <i class="fas fa-pen-alt"></i>
                            <!-- <p>Direct sales</p> -->
                        </div>
                        
                        <div class="links page_navs" onclick="showPage('wash_clothes.php')" title="Yet to be washed">
                            <i class="fas fa-chart-line" style="color:green"></i>
                            <p style="color:green;">
                                <?php
                                    $get_to_wash = new selects();
                                    $to_wash = $get_to_wash->fetch_count_2cond('sales', 'laundry_status', 'C', 'store', $store_id);
                                    echo $to_wash;
                                ?>
                            </p>
                        </div>
                        <div class="links page_navs" onclick="showPage('iron_clothes.php')" title="Due for ironing">
                            <i class="fas fa-hands-bubbles" style="color:red"></i>
                            <p style="color:red">
                                <?php
                                    $get_to_wash = new selects();
                                    $to_wash = $get_to_wash->fetch_count_2cond('sales', 'laundry_status', 'W', 'store', $store_id);
                                    echo $to_wash;
                                ?>
                            </p>
                        </div>
                        <div class="links page_navs" onclick="showPage('completed_job.php')" title="Completed jobs">
                            <i class="fas fa-tasks"></i>
                            <p>
                                <?php
                                    $get_to_wash = new selects();
                                    $to_wash = $get_to_wash->fetch_count_2cond('sales', 'laundry_status', 'I', 'store', $store_id);
                                    echo $to_wash;
                                ?>
                            </p>
                        </div>
                        <div class="links page_navs" onclick="showPage('due_collection.php')" title="Due for collection">
                            <i class="fas fa-drum" style="color:red"></i>
                            <p style="color:red">
                            <?php
                                $due = new selects();
                                $dues = $due->fetch_count_curDateGreat('sales', 'collection_date');
                                echo $dues;
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- <div class="quick_links">

                </div> -->

                <div class="contents">

                    <?php
                        if(isset($_SESSION['success'])){
                            echo "<div class='success'>".
                                $_SESSION['success'].
                            "</div>";
                            unset($_SESSION['success']);
                        }
                    ?>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo "<div class='error'>".
                                $_SESSION['error'].
                            "</div>";
                            unset($_SESSION['error']);
                        }
                    ?>
                    <!-- dashboard -->
                    <?php include "dashboard.php"?>
                </div>
            </section>
        </div>
    </main>
    
    <script src="../jquery.js"></script>
    <script src="../jquery.table2excel.js"></script>
    <script src="../select2.min.js"></script>
    <script src="../script.js"></script>
    <script>
        
            setTimeout(function(){
                $(".success").hide();
            }, 4000);
            setTimeout(function(){
                $(".error").hide();
            }, 4000);

            /* let today = new Date();
            alert(today.toLocaleDateString()); */
            //toggle mobile menu

            //search item with select drop down
            $("#customer").select2( {
                placeholder: "Select customer",
                allowClear: true
            } );
            
    </script>
</body>
</html>


<?php
    }else{
        header("Location: ../index.php");
    }

?>