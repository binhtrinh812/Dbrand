<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <?php
            include_once './views/notification/alert.php';
            ?>
            <div id="noti"></div>


            <div class="row m-t-30">
                <div class="col-md-12">
                    <input type="text" name="daterange" class="daterange" value="<?= $firstOfMonthSub . ' - ' . $toDaySub ?>" />
                    <input type="hidden" id="start_date" value="<?= $firstOfMonth ?>">
                    <input type="hidden" id="end_date" value="<?= $toDay ?>">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_bill">
                            <thead>
                                <tr>
                                    <th>Mã hóa đơn</th>
                                    <th>Ngày tạo</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Mã trả hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody id="list_bill">
                                <?php
                                foreach ($bills as $bill) {
                                ?>
                                    <tr class="tr-shadow">
                                        <td class="desc"><?= $bill['id'] ?></td>
                                        <td><?= $bill['created_at'] ?></td>
                                        <td>
                                            <a href="index.php?page=order&method=update&id=<?= $bill['order_id'] ?>">
                                                <?= $bill['order_id'] ?>
                                            </a>
                                        </td>
                                        <td><?= $bill['code'] ?></td>
                                        <td class="desc"><?= $bill['name'] ?></td>
                                        <td><?= currency_format($bill['total']) ?></td>
                                        <td><span class="<?= addColorStatus($bill['status']) ?>"><?= updateStatusBill($bill['status']) ?></span></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->


                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="more_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-description">
                ...
            </div>
        </div>
    </div>
</div>