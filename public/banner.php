<section class="banner">
        <div class="img-banner">
            <img src="./image/banner/banner-list-detail-product.png" alt="">
        </div>
        <div class="mini-list-banner">
            <ul class="custom-nav d-flex jtf-center alg-center">
                <li>
                    <a href="trang-chu">Trang chủ</a>
                </li>
                <li>/</li>
                <li>
                    <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : '';
                    switch($page) {
                        case 'product':
                            $pageTitle = "Sản phẩm";
                            break;
                        case 'category':
                            $pageTitle = "Danh mục";
                            break;
                        case 'cart':
                            $pageTitle = "Giỏ hàng";
                            break;
                        case 'news':
                            $pageTitle = "Tin tức";
                            break;
                        case 'detail_news':
                            $pageTitle = "Tin tức";
                            break;
                        case 'introduce':
                            $pageTitle = "Giới thiệu";
                            break;
                        case 'contact':
                            $pageTitle = "Liên hệ";
                            break;
                    }
                    ?>
                    <a href="<?=converSlugUrl($pageTitle)?>">
                        <?php
                        
                            echo $pageTitle;
                        ?>
                    </a>
                </li>
            </ul>
            <div class="name-page">
                <span><?=$pageTitle?></span>
            </div>
        </div>
    </section>