
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            
            <?php
            include_once './views/notification/alert.php';
            ?>
            <div id="noti"></div>
            <div class="col-lg-12">
                    <a href="index.php?page=order&method=show"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>Danh sách đơn hàng</button></a>
                <div class="card m-t-30">
                    <div class="card-header">
                        <strong>Thông tin đơn hàng</strong>
                    </div>
                    <div class="card-body card-block text-left">
                        
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="col-12 col-md-12">
                                        <p class="form-control-static">Mã đơn hàng: <b><?=$order['id']?></b></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12 col-md-12">
                                        <p class="form-control-static">Khách hàng: <?=$order['name']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="col-12 col-md-12">
                                        <div class="input-group">
                                            <p class="form-control-static">Ngày đặt hàng: <?=$order['created_at']?></p>
                                            <!-- <div class="input-group-addon">
                                                <i class="far fa-calculator"></i>
                                                <i class="far fa-envelope"></i>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12 col-md-12">
                                        <p class="form-control-static">Số điện thoại: <?=$order['phone']?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="col-12 col-md-12">
                                        <p class="form-control-static ">Trạng thái: <b class="<?=addColorStatus($order['status'])?>"><?=checkStatus($order['status']);?></b></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12 col-md-12">
                                        <p class="form-control-static">Email: <?=$order['email']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="col-12 col-md-12">
                                        <p class="form-control-static"> Thanh toán: <?=payment($order['payment'])?></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12 col-md-12">
                                        <p class="form-control-static">Địa chỉ giao hàng: <?=$order['address']?></p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row form-group">
                                <div class="col-12 col-md-3">
                                    <label for="textarea-input" class=" form-control-label col-6">Ghi chú</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="textarea-input" id="textarea-input" rows="9" placeholder="Content..." class="form-control"> <?=$order['note']?></textarea>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Chi tiết đơn hàng</strong>
                    </div>
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive table-responsive-data2 ">
                                <table class="table table-data2 text-center list_order_detail" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Size</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_order_detail">
                                        <?php
                                            $count = 0; 
                                            foreach($orderDetail as $product) {
                                            $quantity = $this->storeModel->getQtyByIdAndSize($product['product_id'], $product['product_size']);
                                                $count ++;
                                        ?>
                                        <tr class="tr-shadow">
                                            <td><?=$count?></td>
                                            <td>
                                                <a href="index.php?page=product&method=edit&id=<?=$product['product_id']?>"><?=$product['product_id']?></a>
                                                <p class="<?=alertColorStatusOrder($quantity['quantity'], $product['quantity'],$product['active'])?>"><?=alertStatusOrder($quantity['quantity'], $product['quantity'],$product['active'])?></p>
                                            </td>

                                            <td class="desc">
                                                <?=$product['product_name']?>
                                            </td>
                                            <td><?=$product['product_size']?></td>
                                            <td><?=currency_format($product['price'])?></td>
                                            <td><?=$product['quantity']?></td>
                                            <td><?=currency_format($product['total'])?></td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item del_order_detail" value="<?=$product['product_id']?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
                                        <tr class="tr-shadow">
                                            <td colspan="6" class="text-right bold"> Tổng tiền thanh toán: </td>
                                            <!-- <td>Tổng tiền thanh toán</td> -->
                                            <td><?=currency_format($totalCheckOut)?></td>
                                            <td></td>
                                        </tr>
                                        <tr class="tr-shadow">
                                            <td colspan="6" class="text-right bold"> Cập nhật trạng thái: </td>
                                            <td colspan="2">
                                                <form action="index.php?page=order&method=update&id=<?=$order['id']?>" method="post"  class="form-horizontal">
                                                    <select name="status" class="form-control ">
                                                            <!-- Trạng thái hiện tại -->
                                                            <option value="<?=$order['status']?>"><?=listStatus($order['status'])?></option>
                                                            <!-- Trạng thái tiếp theo kể từ trạng thái hiện tại -->
                                                            
                                                            <?php
                                                            if($order['status'] < 4) {
                                                                ?>
                                                                <option value="<?=nextStatusOrder($order['status'])?>"><?=listStatus(nextStatusOrder($order['status']))?></option>
                                                                <option value="5"><?=listStatus(5)?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                            
                                                    </select>
                                                    <input type="hidden" value="<?=$order['status']?>" class="order_status">
                                            </td>
                                        </tr>
                                        <tr class="tr-shadow">
                                            <td colspan="5">
                                            </td>
                                            <td colspan="3">
                                                <button type="submit" name="update_status" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Lưu
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-ban"></i> Hoàn tác
                                                </button>
                                                </form>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
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
