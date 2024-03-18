<?php

session_start();
include_once '../Controllers/ServerController.php';
include_once '../helper/helper.php';

if(isset($_GET['action'])) {
    $action = $_GET['action'];
    switch($action) {
        case 'add': // Thêm sản phẩm
            addCart();
            break;

        case 'del': // Xóa sản phẩm
            delCart();
            break;

        case 'view': // Xem chi tiết sản phẩm 'description'
            viewInfor();
            break;

        case 'render': // Cập nhật html
            getOrderCart();
            break;

        case 'update': // Cập nhật html
            updateCart();
            break;
        
        case 'edit':
            editCart();
            break;
        
        case 'search':
            searchProduct();
            break;
        
        case 'feedback';
            break;
    }
}



function addCart()
{
    if(isset($_POST['id']) && isset($_POST['size']) && isset($_POST['qty'])) {
        $id = $_POST['id'];
        $idSize = $_POST['size'];
        $qty = $_POST['qty'];
        $server = new ServerController();
        $cart = $server->addCartController($id, $idSize, $qty);
        if($cart) {
            updateCart();
        }
        else {
            echo false;
        }
    }
}

function viewInfor()
{
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $server = new ServerController();
        $description = $server->viewInfoController($id);
        echo json_encode($description);
    }
}



function delCart()
{
    if(isset($_POST['id']) && isset($_POST['size'])) {
        $id = $_POST['id'];
        $size = $_POST['size'];
        $server = new ServerController();
        $del = $server->delCartController($id, $size);
        if($del) {
            echo true;
        }
        else {
            echo false;
        }
    }
}

function editCart()
{
    if(isset($_POST['id']) && isset($_POST['size']) & isset($_POST['qty'])) {
        $id = $_POST['id'];
        $size = $_POST['size'];
        $qty = $_POST['qty'];
        $server = new ServerController();
        if ($qty > 0 && $qty <= 10) {
            $edit = $server->editCartController($id, $size, $qty);
            if($edit) {
                echo true;
            }
            else {
                echo false;
            }
        }
    }
}

function updateCart()
{
    ?>
    <div class="icon-cart">
        <a href="index.php?page=cart">
            <span>
                <span>
                    <i class="fa-solid fa-bag-shopping"></i>
                </span>
                <?php
                $qty = 0;
                if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
                    foreach($_SESSION['cart'] as $id) {
                        foreach($id as $product) {
                            $qty += $product['qty'];
                        }
                    }
                }
                ?>
                <span class="count count-order"><?=$qty?></span>
            </span>
            
        </a>
    </div>
    <div class="list-cart">
        <!-- title -->
        <?php
        if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
            $total = 0;
        ?>
        <div class="title-cart">
            <span>Đơn hàng (<?= $qty?> sản phẩm)</span>
        </div>
        <!-- list-product-cart -->
        <ul class="custom-nav box-mini-cart">
            <?php
                foreach($_SESSION['cart'] as $id) {
                    foreach($id as $product) {
            ?>
            <li class="d-flex alg-center mb-15">
                <!-- img -->
                <div class="img-product-in-cart">
                    <a href="san-pham/<?=$product['id']?>/<?=converSlugUrl($product['name'])?>">
                        <img src="./store_img/<?=$product['avatar']?>" alt="">
                    </a>
                </div>
                <!-- text -->
                <div class="text-product-in-cart mr-30">
                    <a href="san-pham/<?=$product['id']?>/<?=converSlugUrl($product['name'])?>">
                        <span class="name-product-in-cart"><?=$product['name']?> (<?=$product['size']?>)</span>
                    </a>
                    <div class="price-product-in-cart mr-30">
                        <?=$product['qty']?>x<span> <?=currency_format($product['price'])?>  </span>
                    </div>
                </div>
                <!-- icon-close -->
                <div class="icon-product-remove-pay">
                    <span class="del_order" id-product = "<?=$product['id']?>" size-product = "<?=$product['size']?>">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                </div>
            </li>
            <?php 
            
            $total += $product['price']*$product['qty'];
            }
        }
            
            ?>
        </ul>
        <!-- total money -->
        <div class="total-money-cart d-flex alg-center jtf-between mb-15">
            <div class="text-total-money">
                <span>Tổng số tiền cần thanh toán:</span>
            </div>
            <div class="price-product-in-cart">
                <span> <?=currency_format($total)?> </span>
            </div>
        </div>
        <!-- pay-cart -->
        <div class="btn-pay-cart">
            <a href="gio-hang">
                <button>
                    <span>Thanh toán</span>
                </button>
            </a>
            <div class="continue-shopping">
                <a href="san-pham/giay-tay/1">Tiếp tục mua hàng</a>
            </div>
        </div>
        <?php }
        else {
                ?>
                <li class="d-flex alg-center mb-15">
                    Không có sản phẩm nào!
                </li>
            <?php
            }
            ?>
        
    </div>
    <?php
}

function getOrderCart() 
{
    ?>
    <div class="quantity-product">
        <?php
            $qty = 0;
            if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
                foreach($_SESSION['cart'] as $id) {
                    foreach($id as $product) {
                        $qty += $product['qty'];
                    }
                }
            }
        ?>
        <p>Đơn hàng (<?= $qty?> sản phẩm)</span> </p>
    </div>
    <div class="infor-product">
        <div class="tb-infor-product">
            <?php
            if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
                $total = 0;
            ?>
            <table class="content-tb-infor-product">
                <?php
                foreach($_SESSION['cart'] as $id) {
                    foreach($id as $product) {
                        $total += $product['price'] * $product['qty'];
                ?>
                <!-- 1 -->
                <tr>
                    <td class="product-name-pay d-flex">
                        <div class="img-infor-product-pay">
                            <a href="san-pham/<?=$product['id']?>/<?=converSlugUrl($product['name'])?>">
                                <img src="./store_img/<?=$product['avatar']?>" alt="">
                            </a>
                        </div>
                        <!-- text -->
                        <div class="text-product-in-cart">
                            <a href="san-pham/<?=$product['id']?>/<?=converSlugUrl($product['name'])?>">
                                <span class="name-product-in-cart"><?=$product['name']?> </span>
                            </a>
                            <div class="price-product-in-cart">
                            <?=$product['qty']?> x <span> <?=currency_format($product['price'])?></span>
                                <p class="text-size-pay">Size: <span><?=$product['size']?></span></p>
                            </div>
                        </div>
                    </td>
                    <td class="product-quantity-remove">
                        <div class="icon-product-remove-pay">
                            <span class="del_order" id-product = "<?=$product['id']?>" size-product = "<?=$product['size']?>">
                                <i class="fa-solid fa-xmark"></i>
                            </span>
                        </div>
                        <div class="quantity-custom d-flex mb-30">
                            <input aria-label="quantity" class="product_<?=$product['id']?>" min="1" max="10" name="" type="number" value="<?=$product['qty']?>">
                            <div class="btn-up-down">
                                <input class="plus is-form change_qty" type="button" value="+" id-product = "<?=$product['id']?>" size-product = "<?=$product['size']?>">
                                <input class="minus is-form change_qty" type="button" value="-" id-product = "<?=$product['id']?>" size-product = "<?=$product['size']?>">
                            </div>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <div class="total-money">
        <ul class="list-total-money">
            <li>
                <p>Giá trị sản phẩm: </p>
                <p>
                    <span><?=currency_format($total)?></span>
                    <span>Miễn phí vận chuyển </span> 
                </p>
            </li>
            <li>
                <p class="txt-total-money">Tổng tiền thanh toán:</p>
                <p>
                    <span class="txt-total-money"><?=currency_format($total)?></span>
                </p>
            </li>
        </ul>
    </div>
    <?php
        }
}

function searchProduct()
{
    if(isset($_POST['data'])) {
        $text= $_POST['data'];
        $server = new ServerController();
        $products = $server->searchLikeName($text);
        foreach($products as $product) {
            ?>
            <li>
                <a href="san-pham/<?=$product['id']?>/<?=converSlugUrl($product['name'])?>">
                <img src="./store_img/<?=$product['avatar']?>" alt="">
                    <div class="box-search-suggestions">
                        <p><?=$product['name']?> </p>
                        <div class="box-price-suggestions">
                            <del style="opacity: 0.5;"><?=currency_format($product['price'] * 110 / 100) ?> đ</del>
                            <span><?=currency_format($product['price'])?></span>
                        </div>
                    </div>
                </a>
            </li>
            <?php
        }
    }
}