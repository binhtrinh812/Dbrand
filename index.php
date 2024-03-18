<?php
session_start();
ob_start();
include_once './helper/helper.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once './public/head.php';
    ?>
</head>
<body>
    <!-- header -->
    <?php
        include_once './public/header.php';
    ?>
    
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    switch($page) {
        case 'home':
            include_once './Views/home.php';
            break;
        case 'category':
            include_once './Controllers/CategoryController.php';
            $category = new CategoryController();
            break;
        case 'product':
            $page = 'sản phẩm';
            include_once './Controllers/ProductController.php';
            $product = new ProductController();
            break;
        case 'cart':
            include_once './Controllers/CartController.php';
            $cart = new CartController();
            break;
        case 'news':
            include_once './Views/news.php';
            break;
        case 'detail_news':
            include_once './Views/detail_news.php';
            break;
        case 'detail_news_t1':
            include_once './Views/detail_news_t1.php';
            break;
        case 'introduce':
            include_once './Views/introduce.php';
            break;
        case 'contact':
            include_once './Views/contact.php';
            break;
        case 'success';
            include_once './Views/success.php';
            break;
        default:
            include_once './Views/404page.php';
            break;
    }

    ?>    

    <!-- mini-footer -->
    <!-- footer -->
    <?php
        include_once './public/footer.php'; 
    ?>



    <a title="back to top" id="back-top"></a>

    <a title="back to top" id="back-top"></a>

    <!-- js -->
    <?php
    include_once './public/script.php'; 
    ?>
</body>
</html>