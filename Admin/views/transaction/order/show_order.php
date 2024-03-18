<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <?php
            include_once './views/notification/alert.php';
            ?>
        <div id="noti"></div>
        <!-- <a href="#"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>Xuất báo cáo</button></a> -->
        
            <div class="row m-t-30">
                <div class="col-md-12">
                <input type="text" name="daterange" class="daterange" value="<?= $firstOfMonthSub.' - '.$toDaySub ?>" />
                <input type="hidden" id="start_date" value="<?=$firstOfMonth?>">
                <input type="hidden" id="end_date" value="<?=$toDay?>">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_order">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Khách cần trả</th>
                                    <th>Khách đã trả</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_order">
                                <?php 
                                    foreach($orders as $order) {
                                ?>
                                <tr class="tr-shadow">
                                    <td>
                                        <a href="index.php?page=order&method=update&id=<?=$order['id']?>">
                                            <?=$order['id']?>
                                        </a></td>
                                    <td><?=$order['created_at']?></td>
                                    <td class="desc"><?=$order['name']?></td>
                                    <td><?=currency_format($order['check_out'])?></td>
                                    <td><?=currency_format(doneMoney($order['status'], $order['payment'],$order['check_out']))?></td>
                                    <td>
                                        <span class="<?=addColorStatus($order['status'])?>"><?= checkStatus($order['status'])?></span>
                                    </td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit">
                                                <a href="index.php?page=order&method=update&id=<?=$order['id']?>">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </button>
                                            <button value="<?=$order['id']?>" id="del_order" class="item"  data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Print" data-original-title="Print">
                                                <a href="./views/transaction/order/print_order.php?id=<?=$order['id']?>">
                                                    <i class="zmdi zmdi-print"></i>
                                                </a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
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