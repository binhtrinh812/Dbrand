<?php
    session_start();
    ob_start();
    include_once('../helper/helper.php');
?>

<?php
    if (!isset($_SESSION['id_account'])) {
        header('Location: ../Auth');
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php  
        include_once './public/head.php';
    ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include_once './public/header_mobile.php'; ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php include_once './public/sidebar.php'; ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once './public/header_desktop.php'; ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <?php
                $page = 'dashboard';
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                }
                switch($page) {
                    case 'dashboard':
                        include_once './Controllers/DashboardController.php';
                        $dashboard = new Dashboard();
                        break;
                    case 'product':
                        include_once './Controllers/ProductController.php';
                        $product = new ProductController();
                        break;
                    case 'order':
                        include_once './Controllers/OrderController.php';
                        $order = new OrderController();
                        break;
                    case 'bill':
                        include_once './Controllers/BillController.php';
                        $bill = new BillsController();
                        break;
                    case 'member':
                        include_once './Controllers/UserController.php';
                        $user = new UserController();
                        break;
                }
            ?>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Script
    <?php include_once './public/script.php'; ?>
    -->
    

</body>

</html>
<!-- end document-->
