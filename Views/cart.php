<?php
    include_once './public/banner.php';
?> 

<!-- infor-pay -->
<section class="infor-pay">
    <div class="container">
        <div class="row">
            <!-- form-infor-customer -->
            <div class="col-md-6">
                <div class="form-infor-customer">
                    <div class="title-form">
                        <span>Thông tin cá nhân</span>
                    </div>
                    <form action="index.php?page=cart&method=checkout" method="POST" name="frm_checkout">
                        <div class="box-inp-infor">
                            <input type="text" name="name" id="name" placeholder="Họ và tên" required value="<?=isset($_POST['name']) ? $_POST['name'] : '' ?>">
                            <span style="color: #dc3545;"><?= isset($error['name']) ? $error['name'] : '' ?></span>
                        </div>
                        <div class="box-inp-infor">
                            <input type="email" name="email" id="email" placeholder="Địa chỉ email" require value="<?=isset($_POST['email']) ? $_POST['email'] : '' ?>">
                            <span style="color: #dc3545;"><?= isset($error['email']) ? $error['email'] : '' ?></span>
                        </div>
                        <div class="box-inp-infor">
                            <input type="tel" name="phone" id="phone" placeholder="Số điện thoại" required value="<?=isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                            <span style="color: #dc3545;"><?= isset($error['phone']) ? $error['phone'] : '' ?></span>
                        </div>
                        <div class="box-input-short-cart">
                            <!-- address-city -->
                            <div class="box-inp-infor"> 
                                <select required id="province" onchange="getText('province','text_province')">
                                    <option  value="">chọn thành phố</option>
                                </select>
                                <span style="color: #dc3545;"><?= isset($error['province']) ? $error['province'] : '' ?></span>
                            </div>
                            <!-- address-city -->
                            <div class="box-inp-infor">
                                <select required id="district" onchange="getText('district', 'text_district')">
                                    <option  value=""> chọn quận</option>
                                </select>
                                <span style="color: #dc3545;"><?= isset($error['district']) ? $error['district'] : '' ?></span>
                            </div>
                            <!-- address-city -->
                            <div class="box-inp-infor">
                                <select required id="ward" onchange="getText('ward', 'text_ward')">
                                    <option value=""> chọn phường</option>
                                </select>
                                <span style="color: #dc3545;"><?= isset($error['ward']) ? $error['ward'] : '' ?></span>
                            </div>
                            <!-- address-city -->
                            <input type="hidden" name="province" id="text_province" value="" />
                            <input type="hidden" name="district" id="text_district" value="" />
                            <input type="hidden" name="ward" id="text_ward" value="" />
                            <div class="box-inp-infor">
                                <input type="text" name="address" id="address" placeholder="Địa chỉ của bạn" required value="<?=isset($_POST['address']) ? $_POST['address'] : '' ?>">
                                <span style="color: #dc3545;"><?= isset($error['address']) ? $error['address'] : '' ?></span>
                            </div>
                        </div>
                        <div class="box-inp-infor ">
                            <textarea name="note" id="note" cols="30" rows="5" placeholder="Yêu cầu thêm của bạn về giao hàng..."></textarea>
                        </div>
                        <div class="box-radio-infor">
                            <div class="radio-infor d-flex">
                                <input type="radio" class="input-radio" name="payment" id="checkout_live" <?=isset($_POST['payment']) && $_POST['payment'] == 'code' ? 'checked' : ''?> value="code" >
                                <label for="checkout_live">Thanh toán khi nhận hàng</label>
                            </div>
                            <span style="color: #dc3545;"><?= isset($error['payment']) ? $error['payment'] : '' ?></span>

                        </div>
                        <div class="btn-pay">
                            <button type="submit" name="redirect">
                                <span class="order-product">Đặt hàng</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- infor-product-pay -->
            <div class="col-md-6">
                <div class="infor-product-pay">
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
                                        $total += $product['price']*$product['qty'];
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
                                $_SESSION['total'] = $total;
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
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
