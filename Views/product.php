<!-- banner -->
<?php
include_once './public/banner.php';

?>

<!-- list-detail-product -->
<section class="list-detail-product">
    <div class="container">
        <div class="row">
            <!-- filter -->
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="filter-list-product">
                    <!-- filter-name-product -->
                    <div class="filter-product">
                        <div class="title-filter">
                            <span>Sản phẩm</span>
                        </div>
                        <div class="box-list-filter">
                            <ul class="list-filter">
                                <li>
                                    <a href="san-pham/giay-tay/1">Áo Polo Nam<span>(<?= $countWestern ?>)</span></a>
                                </li>
                                <li>
                                    <a href="san-pham/giay-luoi/1">Áo Vest Nam <span>(<?= $countLazy ?>)</span></a>
                            </ul>
                        </div>
                    </div>
                    <!-- filter-price -->
                    <div class="filter-price mt-60">
                        <select name="arrange_price" id="" class="inp-choose-size">
                            <option value="">Sắp sắp theo giá</option>
                            <option value="">Từ cao đến thấp</option>
                            <option value="">Từ thấp đến cao</option>
                        </select>
                    </div>

                    <!-- filter-size -->

                </div>
            </div>
            <!-- content-list-detail-product -->
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="content-list-detail-product">
                    <div class="row">
                        <?php
                        // echo $method;
                        foreach ($products as $product) {
                        ?>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <a href="san-pham/<?= $product['id'] ?>/<?= converSlugUrl($product['name']) ?>">
                                    <div class="box-list-detail">
                                        <div class="img-list-detail">
                                            <img src="./store_img/<?= $product['avatar'] ?>" alt="">
                                        </div>
                                        <div class="box-text-list-detail">
                                            <div class="name-product">
                                                <span><?= $product['name'] ?> </span>
                                            </div>
                                            <!-- <div class="box-text-list-detail"> -->
                                            <!-- <div class="name-product">
                                                <span><?= $product['name'] ?> </span>
                                            </div> -->
                                            <div class="text-price">
                                                <span class="text-price-gray"><?= currency_format($product['price'] * 110 / 100) ?></span>
                                                <span><?= currency_format($product['price']) ?></span>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                        <div class="sale-off">
                                            <span>-10%</span>
                                        </div>
                                </a>

                                <div class="btn-add">
                                    <button class="icon-add add_to_cart" value="<?= $product['id'] ?>">
                                        <span>
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </span>
                                    </button>
                                    <span class="icon-add icon-view-infor view-infor" product-id="<?= $product['id'] ?>">
                                        <i class="fa-solid fa-eye"></i>
                                    </span>
                                </div>
                                <div class="inp-choose-size">
                                    <select name="size" class="product_size_<?= $product['id'] ?>">
                                        <?php
                                        foreach ($sizes[$product['id']] as $size) {
                                        ?>
                                            <option class="product_size_op" value="<?= $size['id'] ?>"><?= $size['size'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="final"></div>
                                </div>
                            </div>
                    </div>
                <?php } ?>
                </div>

                <div class="box-pagination">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php
                            if ($countPage == 1) {
                            ?>
                                <li class="<?= addActive($nav) ?>"><a href="san-pham/<?= convertMethodUrl($categoryId) . '/' . $nav ?>"><?= $countPage ?></a></li>
                            <?php
                            } else {
                            ?>
                                <li>
                                    <a href="san-pham/<?= convertMethodUrl($categoryId) . '/' ?><?= $nav > 1 ? $nav - 1 : 1 ?>" aria-label="Previous">
                                        <span aria-hidden="true">&#60;</span>
                                    </a>
                                </li>
                                <?php
                                for ($i = 1; $i <= $countPage; $i++) {
                                ?>
                                    <li class="<?= addActive($i) ?>"><a href="san-pham/giay-tay/<?= $i ?>"><?= $i ?></a></li>
                                <?php
                                }
                                ?>
                                <li>
                                    <a href="san-pham/<?= convertMethodUrl($categoryId) . '/' ?><?= $nav < $countPage ? $nav + 1 : $countPage ?>" aria-label="Next">
                                        <span aria-hidden="true">&#62;</span>
                                    </a>
                                </li>
                            <?php
                            }
                            ?>
                            <!-- <li><a href="">trang cuối</a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="post-product">
                    <h1>Áo Polo nam cao cấp Dbrand</h1>
                    <p>Quần áo thời trang mùa đông dành cho các bạn nam cũng rất đa dạng từ áo khoác chần bông ấm áp và thời trang, áo hoodie - sweater thoải mái và cá tính, cho đến áo sơ mi flannel khoác ngoài mang vẻ đẹp vintage nhưng không kém phần sành điệu.</p>
                    <h2>I – Áo Polo Dbrand hợp với phong cách nào?</h2>
                    <p>Hãy cùng Dbrand khám phá qua bộ sưu tập những mẫu áo Polo nam đa dạng và phong cách, không chỉ giúp các bạn giữ ấm mà còn là biểu tượng của thời trang cá nhân, tạo nên phong cách riêng của bạn với những thiết kế độc đáo, mới lạ.</p>
                    <p>Với thế mạnh hơn 10 năm phát triển, quy tụ hàng triệu tín đồ mua sắm, Dbrand đã khẳng định được vị thế số 1 trên thị trường.</p>
                    <p>
                        <img src="./image/produc-detail/post-product-detail (1).png" alt="">
                    </p>
                    <p>
                        <i>Áo Polo là một sản phẩm thời trang độc đáo cho các bạn nam được thiết kế dành riêng cho mùa đông, phong cách đậm chất điện ảnh. Chiếc áo khoác này sẽ phù hợp với các bạn theo đuổi phong cách Hàn Quốc, hoặc nhưng bộ outfit cá tính, thể thao.</i>
                    </p>
                </div>
                <div class="btn-readmore">
                    <span>đọc thêm</span>
                    <div class="btn-readmore-post">
                        <span>thu gọn</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- popup-infor-product -->
<section class="popup-infor-product">
    <div class="box-list-popup-infor">
        <!-- 1 -->
        <div class="content-popup-infor">
            <div class="name-list-popup">
                <span>Thông tin chi tiết</span>
            </div>
            <div class="content-list-popup">
            </div>
        </div>
        <!-- close-popup -->
        <div class="close-popup">
            <span>
                <i class="fa-solid fa-xmark"></i>
            </span>
        </div>
    </div>
</section>

<!-- look-book -->
<section class="look-book">
    <div class="title-lookbook">
        <a href="#">
            <span>LOOKBOOK</span>
        </a>
    </div>
    <div class="slider-look-book">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- 1 -->
                <div class="swiper-slide">
                    <div class="img-lookbook">
                        <a href="#">
                            <img src="./image/produc-detail/lookbook-product (1).png" alt="">
                            <div class="text-img-lookbook">
                                <span>All Bags Collection for Men in 2022</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- 2 -->
                <div class="swiper-slide">
                    <div class="img-lookbook">
                        <a href="#">
                            <img src="./image/produc-detail/lookbook-product (2).png" alt="">
                            <div class="text-img-lookbook">
                                <span>All Bags Collection for Men in 2022</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- 3 -->
                <div class="swiper-slide">
                    <div class="img-lookbook">
                        <a href="#">
                            <img src="./image/produc-detail/lookbook-product (3).png" alt="">
                            <div class="text-img-lookbook">
                                <span>All Bags Collection for Men in 2022</span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- 4 -->
                <div class="swiper-slide">
                    <div class="img-lookbook">
                        <a href="#">
                            <img src="./image/produc-detail/lookbook-product (4).png" alt="">
                            <div class="text-img-lookbook">
                                <span>All Bags Collection for Men in 2022</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<!-- feedback -->
<section class="feedback">
    <div class="box-feedback d-flex jtf-between ">
        <!-- left -->
        <div class="box-feedback-left">
            <div class="title-feedback">
                <span>Đánh giá từ</span>
                <h3>Khách hàng</h3>
            </div>
            <div class="text-feedback">
                <p>+ 35,243</p>
                <span>Hàng nghìn khách hàng đã tin tưởng và ủng hộ sản phẩm của Dbrand</span>
            </div>
        </div>
        <!-- right -->
        <div class="box-feedback-right">
            <div class="slider-feedback">
                <div class="swiper mySwiper-feedback">
                    <div class="swiper-wrapper">
                        <!-- 1 -->
                        <div class="swiper-slide">
                            <div class="box-customer-comment">
                                <div class="ava-customer">
                                    <img src="./image/produc-detail/ava-customer (1).png" alt="">
                                </div>
                                <div class="comment-customer">
                                    <div class="author">
                                        <span class="name-author">DV Tiến Lộc</span>
                                        <span class="assess"> đã đánh giá </span>
                                    </div>
                                    <div class="content-comment">
                                        <p>"Dbrand đáp ứng đủ các tiêu chí của mình như chất liệu da nhập khẩu, thiết kế theo chuẩn Châu Âu, … nên những năm qua mình sử dụng sản phẩm của Dbrand khá thường xuyên"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 2 -->
                        <div class="swiper-slide">
                            <div class="box-customer-comment">
                                <div class="ava-customer">
                                    <img src="./image/produc-detail/ava-customer (2).png" alt="">
                                </div>
                                <div class="comment-customer">
                                    <div class="author">
                                        <span class="name-author">DV Tiến Lộc</span>
                                        <span class="assess"> đã đánh giá </span>
                                    </div>
                                    <div class="content-comment">
                                        <p>"Dbrand đáp ứng đủ các tiêu chí của mình như chất liệu da nhập khẩu, thiết kế theo chuẩn Châu Âu, … nên những năm qua mình sử dụng sản phẩm của Dbrand khá thường xuyên"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 3 -->
                        <div class="swiper-slide">
                            <div class="box-customer-comment">
                                <div class="ava-customer">
                                    <img src="./image/produc-detail/ava-customer (1).png" alt="">
                                </div>
                                <div class="comment-customer">
                                    <div class="author">
                                        <span class="name-author">DV Tiến Lộc</span>
                                        <span class="assess"> đã đánh giá </span>
                                    </div>
                                    <div class="content-comment">
                                        <p>"Dbrand đáp ứng đủ các tiêu chí của mình như chất liệu da nhập khẩu, thiết kế theo chuẩn Châu Âu, … nên những năm qua mình sử dụng sản phẩm của Dbrand khá thường xuyên"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 4 -->
                        <div class="swiper-slide">
                            <div class="box-customer-comment">
                                <div class="ava-customer">
                                    <img src="./image/produc-detail/ava-customer (2).png" alt="">
                                </div>
                                <div class="comment-customer">
                                    <div class="author">
                                        <span class="name-author">DV Tiến Lộc</span>
                                        <span class="assess"> đã đánh giá </span>
                                    </div>
                                    <div class="content-comment">
                                        <p>"Dbrand đáp ứng đủ các tiêu chí của mình như chất liệu da nhập khẩu, thiết kế theo chuẩn Châu Âu, … nên những năm qua mình sử dụng sản phẩm của Dbrand khá thường xuyên"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next next-feedback"></div>
                <div class="swiper-button-prev prev-feedback"></div>
            </div>
        </div>
    </div>
</section>

<!-- news -->
<section class="news">
    <div class="container">
        <div class="title-box-news">
            <a href="">
                <span>BÁO CHÍ NÓI VỀ Dbrand</span>
            </a>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="box-content-news">
                    <a href="index.php?page=detail_news">
                        <div class="img-content-news">
                            <img src="./image/news/news (1).png" alt="">
                        </div>
                        <div class="name-content-new">
                            <span>Sao nam Việt bật mí địa chỉ thời trang yêu thích</span>
                        </div>
                        <div class="seen-more">
                            <span>Xem thêm</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="box-content-news">
                    <a href="index.php?page=detail_news">
                        <div class="img-content-news">
                            <img src="./image/news/news (2).png" alt="">
                        </div>
                        <div class="name-content-new">
                            <span>Sao nam Việt bật mí địa chỉ thời trang yêu thích</span>
                        </div>
                        <div class="seen-more">
                            <span>Xem thêm</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="box-content-news">
                    <a href="index.php?page=detail_news">
                        <div class="img-content-news">
                            <img src="./image/news/news (3).png" alt="">
                        </div>
                        <div class="name-content-new">
                            <span>Sao nam Việt bật mí địa chỉ thời trang yêu thích</span>
                        </div>
                        <div class="seen-more">
                            <span>Xem thêm</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="box-content-news">
                    <a href="index.php?page=detail_news">
                        <div class="img-content-news">
                            <img src="./image/news/news (4).png" alt="">
                        </div>
                        <div class="name-content-new">
                            <span>Sao nam Việt bật mí địa chỉ thời trang yêu thích</span>
                        </div>
                        <div class="seen-more">
                            <span>Xem thêm</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>