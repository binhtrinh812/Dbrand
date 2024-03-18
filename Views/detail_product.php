 
    
    <!-- mini-menu -->
    <section class="mini-menu-header">
        <div class="box-mini-menu">
            <ul class="custom-nav menu-header-product-detail d-flex jtf-center alg-center">
                <li>
                    <a href="trang-chu">Trang chủ</a>
                </li>
                <li>/</li>
                <li>
                    <a href="san-pham/<?=convertMethodUrl($product['category_id'])?>/1"><?=$product['title']?></a>
                </li>
                <li>/</li>
                <li>
                    <a href="san-pham/<?=$product['id']?>/<?=converSlugUrl($product['name'])?>"><?=$product['name']?></a>
                </li>
            </ul>
        </div>
    </section>

    <!-- product-detail -->
    <section class="product-detail">
        <div class="container">
            <div class="row">
                <!-- img-product -->
                <div class="col-md-7">
                    <div class="box-img-product d-flex alg-center">
                        <div class="thumbnails">
                            <div class="thumb">
                                <a class="zoom" href="javascript:void(0)">
                                    <img src="./store_img/<?=$product['avatar']?>" alt="" onmouseover="changeImage('six')" id="six">
                                </a>
                            </div>
                        </div>
                        <div class="big-slide-img">
                            <img src="./store_img/<?=$product['avatar']?>" id="img-main" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="content-product-detail">
                        <h1 class="title-product-detail"><?=$product['name']?></h1>
                        <div class="price-product">
                        <!-- <div class="text-price">
                            <span class="text-price-gray"><?=currency_format($product['price'] * 110 / 100) ?></span>
                            <span><?=currency_format($product['price']) ?></span>
                        </div> -->
                            <del style="opacity: 0.5;"><?=currency_format($product['price'] * 110 / 100) ?></del>
                            <span><?= currency_format($product['price']) ?></span>
                        </div>
                        <div class="choose-size">
                            <p>Size</p>
                            <div class="box-border-choose-size d-flex mb-15 ">
                                <?php
                                foreach($sizes[$product['id']] as $size) {
                                ?>
                                <div class="border-choose-size" product-size = "<?=$size['id']?>">
                                    <span><?=$size['size']?></span>
                                </div>
                                <?php }?>
                            </div>
                            <input type="hidden" min = "1" max ="6" class="product-size" name="size" value="1">
                        <!-- <input type="hidden" class="qty-quick" min="1" max="10" name="quantity" value="1"> -->
                        </div>
                        <div class="choose-quantity d-flex alg-center">
                            <p>Chọn số lượng</p>
                            <div class="quantity-custom d-flex">
                                <input aria-label="quantity" class="input-qty" min="1" max="10" name="quantity" type="number" value="1">
                                <div class="btn-up-down">
                                    <input class="plus is-form" type="button" value="+">
                                    <input class="minus is-form" type="button" value="-">
                                </div>
                            </div>
                        </div>
                        <div class="tutorial-choose-size mt-30">
                            <div class="btn-tutorial-choose-size">
                                <img src="./image/icon/ruler.png" alt="">
                                <span>Hướng dẫn chọn size</span>
                            </div>
                        </div>
                        <div class="btn-product-detail">
                            <a href="gio-hang"  >
                                <button class="btn-submit-product-detail txt-center pay_now" value="<?=$product['id']?>">
                                    <span>Thêm vào giỏ hàng</span>
                                </button>
                            </a>
                            <!-- <button class="btn-cart-product-detail add_to_cart" value="<?=$product['id']?>">
                                <span>
                                    <i class="fa-solid fa-cart-plus"></i>
                                </span>
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="detail-info">
        <div class="container">
            <!-- Đánh giá sản phẩm -->
            <div class="col-md-6">
                <div class="content-assess-customer">
                    <div class="title-assess-customer">
                        <span>Đánh giá</span>
                        <span><?=$product['name']?></span>
                        <div class="rating-statistics">
                            <div class="rating-star">
                                <div class="icon-star" style="position: relavtive;">
                                    <!-- <span style="font-size: 60px; text-align:center; margin: 0 auto;"><i class="fa-solid fa-star"></i></span> -->
                                    <div class="icon-star">
                                            <?php
                                            
                                            if(count($feedbacks) > 0) {
                                                $arrFeedback = ceil($arrange/count($feedbacks));
                                                for ($i=1; $i <= $arrFeedback; $i++) { 
                                                    echo '<span><i class="fa-solid fa-star"></i></span>';
                                                }
                                                for ($i=1; $i <= 5 - $arrFeedback; $i++) { 
                                                    echo '<span><i class="fa-regular fa-star"></i></span>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    <!-- <b style="font-weight: 700;position: absolute;top: 77px;left: 59px;font-size: 20px; color: white;"><?=count($feedbacks) > 0 ? $arrange/count($feedbacks) : ''?></b> -->
                                </div>
                                <div class="total-number">
                                    <span><?=count($feedbacks)?> đánh giá</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-feedback">
                        <!-- 1 -->
                        <?php
                        foreach($feedbacks as $feedback) {
                        ?>
                        <div class="txt-assess-customer mt-30">
                            <div class="box-name-user">
                                <div class="ava-user">
                                    <span>
                                        <i class="fa-solid fa-user"></i>
                                    </span>
                                </div>
                                <div class="name-user">
                                    <div class="txt-name-user">
                                        <span><?=$feedback['name']?></span>
                                        <span><i><?=$feedback['created_at']?></i></span>
                                    </div>
                                    <div class="d-flex alg-center">
                                        <div class="icon-star">
                                            <?php
                                            for ($i=1; $i <= $feedback['rate']; $i++) { 
                                                echo '<span><i class="fa-solid fa-star"></i></span>';
                                            }
                                            for ($i=1; $i <= 5 - $feedback['rate']; $i++) { 
                                                echo '<span><i class="fa-regular fa-star"></i></span>';
                                            }
                                            ?>
                                        </div>
                                        <div class="tickbuy">
                                            <span>
                                                <i class="fa-sharp fa-solid fa-badge-check"></i>
                                            </span>
                                            <span>Đã mua hàng tại Laforce</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="txt-content-assess-customer">
                                <span><?=$feedback['comment']?></span>
                            </div>
                            <div>
                                <?php
                                $imgFeedback = $this->productModel->showImgFeedback($feedback['id']);
                                foreach($imgFeedback as $img) {
                                ?>
                                <img width="20%" src="./store_img/feedback/<?=$img['path']?>" alt="">
                            <?php    
                            }
                            ?>
                            </div>
                        </div>
                        <?php }
                        ?>
                    </div>
                </div>
                <div class="write-review">
                    <div class="ava-user">
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>
                    </div>
                        <button class="inp-write-review" type="button">
                            <span>
                                <i class="fa-solid fa-star"></i>
                            </span>
                            Viết đánh giá
                        </button>
                </div>
            </div>
            <!-- Thông tin chi tiết sản phẩm -->
            <div class="col-md-6">
                <div class="info-detail-product">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <!-- 1 -->
                        <div class="panel panel-default border-product-detail">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Thông tin chi tiết
                                        <span>+</span>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <?=$product['description']?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="popup-choose-size">
    <div class="img-choose-size">
        <img src="./image/produc-detail/size_vest.jpg" alt="">
        <div class="btn-close">
            <span>
                <i class="fa-solid fa-xmark"></i>
            </span>
        </div>
    </div>
</section>

<!-- assess-customer -->
<section class="assess-customer mt-30">
    <div class="check-user">
        <div class="form-check-user">
                <div class="title-form-check">
                    <span>Đánh giá</span>
                </div>
                <form action="index.php?page=product&id=<?=$product['id']?>" name="feed_back" method="POST" enctype="multipart/form-data">
                    <div class="inp-check-user text-center">
                        <ul class="ul-star">
                            <li data-val = 1><i class="fa-regular fa-star"></i><p>Rất tệ</p></li>
                            <li data-val = 2><i class="fa-regular fa-star"></i><p>Tệ</p></li>
                            <li data-val = 3><i class="fa-regular fa-star"></i><p>Bình Thường</p></li>
                            <li data-val = 4><i class="fa-regular fa-star"></i><p>Tốt</p></li>
                            <li data-val = 5><i class="fa-regular fa-star"></i><p>Rất tốt</p></li>
                        </ul>
                    <input type="hidden" value="" class="rate_score" name="rate">
                    </div>
                    <div class="inp-check-user">
                        <input type="text" name="name" placeholder="Họ tên..." required>
                    </div>
                    <div class="inp-check-user">
                        <input type="tel" name="phone"  placeholder="Số điện thoại..." required>
                    </div>
                    <div class="inp-check-user">
                        <textarea name="comment" cols="30" rows="3" placeholder="Mời bạn chia sẻ cảm nhận vê sản phẩm..." required></textarea>
                        
                    </div>

                    <div class="btn-check-user d-flex jtf-center">
                        <button type="submit" name="btn-feedback" onclick="return confirm('Gửi đánh giá?')">
                            <span>Đánh giá</span>
                            <span><i class="fa-solid fa-arrow-right"></i></span>
                        </button>
                    </div>
                    <span> <?=!empty($error['noti']) ? $error['noti'] : '' ?>  </span>
                </form>
                
            <div class="close-check-user">
                <span>
                    <i class="fa-solid fa-xmark"></i>
                </span>
            </div>
        </div>
    </div>
</section>