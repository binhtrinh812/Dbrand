<?php
include_once '../Controllers/ServerController.php';
include_once '../../helper/helper.php';

if(isset($_GET['action'])) {
    $method = $_GET['action'];
    switch($method) {
        case 'del_product':
            if(isset($_POST['id']) && isset($_POST['role']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $id = $_POST['id'];
                $role = $_POST['role'];
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                if($role == 10) {
                    $server = new ServerController();
                    $server->updateProductById($id);
                    // check nếu del thành công thì return ra đoạn html chèn vào body table
                    if($server) {
                        $products = $server->showProduct($startDate, $endDate);
                        foreach($products as $product) {
                            $store = $server->showStoreById($product['id']);
                            ?>
                            <tr class="tr-shadow">
                                <td>
                                    <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                        <img style="width: 150px;" src="../store_img/<?=$product['avatar']?>" alt="">
                                    </a>
                                    
                                </td>
                                <td class="desc">
                                    <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                    <?=$product['name']?></td>
                                    </a>
                                    
                                <td><?=$product['title']?></td>
                                <td> <span class="<?=addColorStatusProduct($store['total'], $product['active'])?>"><?= checkStatusProduct($store['total'], $product['active'])?></span></td>
                                <td><?=currency_format($product['price'])?></td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </button>
    
                                        <!-- del cách 2: sử dụng ajax -->
    
                                        <button value="<?=$product['id']?>" id="del_product" class="item"  data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
    
                                        <!-- show description -->
                                        
                                        <button value="<?=$product['id']?>"class="item detail_product"  data-toggle="modal" data-placement="top" title="More" data-target="#more_product">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                    }
                }
                else {
                    echo 1;
                }
                
            }
            break;
        case 'show_product':
            if(isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $server = new ServerController();
                $products = $server->showProduct($startDate, $endDate);
                foreach($products as $product) {
                    $store = $server->showStoreById($product['id']);
                    ?>
                    <tr class="tr-shadow">
                        <td>
                            <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                <img style="width: 150px;" src="../store_img/<?=$product['avatar']?>" alt="">
                            </a>
                            
                        </td>
                        <td class="desc">
                            <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                            <?=$product['name']?></td>
                            </a>
                            
                        <td><?=$product['title']?></td>
                        <td> <span class="<?=addColorStatusProduct($store['total'], $product['active'])?>"><?= checkStatusProduct($store['total'], $product['active'])?></span></td>
                        <td><?=currency_format($product['price'])?></td>
                        <td>
                            <div class="table-data-feature">
                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <a href="index.php?page=product&method=edit&id=<?=$product['id']?>">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                </button>

                                <!-- del cách 2: sử dụng ajax -->

                                <button value="<?=$product['id']?>" id="del_product" class="item"  data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>

                                <!-- show description -->
                                
                                <button value="<?=$product['id']?>"class="item detail_product"  data-toggle="modal" data-placement="top" title="More" data-target="#more_product">
                                    <i class="fa fa-eye"></i>
                                </button>
                                
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
            }
            break;
        case 'description':
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                $server = new ServerController();
                $server->showDescription($id);
            }
            break;
        case 'quantity':
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                $server = new ServerController();
                $quantitys = $server->showQtySizeProuduct($id);
                storeProduct($quantitys);
            }
            break;
        case 'modal':
            if(isset($_POST['id'])) {
                $id = $_POST['id'];
                echo true;
            }
            break;
        case 'del_order':
            if(isset($_POST['id']) && isset($_POST['role']) && isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $id = $_POST['id'];
                $role = $_POST['role'];
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $server = new ServerController();
                if($role == 10) {
                    $server->deleteOrder($id);
                    if($server) {
                        $orders = $server->showOrder($startDate, $endDate);
                        foreach($orders as $order) {
                        ?>
                            <tr class="tr-shadow">
                                <td><?=$order['id']?></td>
                                <td><?=$order['created_at']?></td>
                                <td class="desc"><?=$order['name']?></td>
                                <td><?=currency_format($order['check_out'])?></td>
                                <td><?=$order['status'] == 4 ? currency_format($order['check_out']) : ''?></td>
                                <td>
                                    <span class="<?=addColorStatus($order['status'])?>"><?= checkStatus($order['status'])?></span>
                                </td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <a href="index.php?page=order&method=update&id=<?=$order['id']?>">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                        </button>
                                        <button value="<?=$order['id']?>" id="del_order" class="item"  data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    }
                }
                else {
                    echo 1;
                }

            }
            break;
        case 'del_product_orders':
            if(isset($_POST['id']) && isset($_POST['status'])) {
                $id = $_POST['id'];
                $status = $_POST['status'];
                if($status < 4) {
                    $server = new ServerController();
                    $del = $server->deleteProductInDetail($id);
                    if($del) {
                        $orderDetail = $server->showOrderDetailByOrderId($id);
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
                        <?php
                    }
                }         
                else {
                    echo 1;
                }
            }
            break;
        case 'show_order':
            if(isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $server = new ServerController();
                $orders = $server->showOrder($startDate, $endDate);
                foreach($orders as $order) {
                    ?>
                        <tr class="tr-shadow">
                            <td><a href="index.php?page=order&method=update&id=<?=$order['id']?>">
                                    <?=$order['id']?>
                                </a></td>
                            <td><?=$order['created_at']?></td>
                            <td class="desc"><?=$order['name']?></td>
                            <td><?=currency_format($order['check_out'])?></td>
                            <td><?=currency_format(doneMoney($order['status'], $order['payment'], $order['check_out']))?></td>
                            <td>
                                <span class="<?=addColorStatus($order['status'])?>"><?= checkStatus($order['status'])?></span>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
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
                    <?php }
            }
            break;
        case 'show_bill':
            if(isset($_POST['startDate']) && isset($_POST['endDate'])) {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $server = new ServerController();
                $bills = $server->showAllBill($startDate, $endDate);
                foreach($bills as $bill) {
                    ?>
                    <tr class="tr-shadow">
                        <td class="desc"><?=$bill['id']?></td>
                        <td><?=$bill['created_at']?></td>
                        <td>
                            <a href="index.php?page=order&method=update&id=<?=$bill['order_id']?>">
                                <?=$bill['order_id']?>
                            </a></td>
                        <td><?=$bill['code']?></td>
                        <td class="desc"><?=$bill['name']?></td>
                        <td><?=currency_format($bill['total'])?></td>
                        <td><span class="<?=addColorStatus($bill['status'])?>"><?=updateStatusBill($bill['status'])?></span></td>
                    </tr>
                    <?php }
            }
            break;   
        
        }

    }


function descriptionProduct()
{
    if(isset($_POST['id'])) {
        $id = $_POST['id'];
        $server = new ServerController();
        $server->showDescription($id);
    }
}

function storeProduct($quantitys)
{
    ?>
    <table class="table table-data2 text-center">
<thead>
    <tr>
        <th>Size</th>
        <th>Số lượng</th>
    </tr>
</thead>
<tbody id="list_quantity">
    <?php
    if(!empty($quantitys)) {
    foreach($quantitys as $quantity) {
    ?>
    <tr class="tr-shadow">
        <?php
        if($quantity['total_qty'] == 0) {
            ?>
            <td> <b>HẾT HÀNG</b></td>
            <?php
        }
        else {
        ?>
        <td> <?=$quantity['size']?></td>
        <td class="desc"> <?=$quantity['total_qty']?></td>
        <?php
            }
        ?>
    </tr>
    <?php
    }}
    else {
        ?>
        <tr class="tr-shadow">
            <td> <b>CHƯA NHẬP HÀNG</b></td>
        </tr>
    <?php
    }
    ?>
</tbody>
</table>
<?php
}