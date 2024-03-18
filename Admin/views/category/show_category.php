<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <?php
            include_once './views/notification/alert.php';
            ?>
        <div id="noti"></div>
        <!-- <a href="#"><button class="au-btn au-btn-icon au-btn--green au-btn--small"><i class="zmdi zmdi-plus"></i>Xuất báo cáo</button></a> -->
        <a href="index.php?page=member&method=add"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>Thêm thành viên</button></a>
            <div class="row m-t-30">
                <div class="col-md-12">
                    <!-- DATA TABLE-->
                    <div class="table-responsive table-responsive-data2 ">
                        <table class="table table-data2 text-center list_user">
                            <thead>
                                <tr>
                                    <th>Mã thành viên</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Thành viên</th>
                                    <th>Ngày tạo</th>
                                    <th>Trạng thái</th>
                                    <th>Vai trò</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody id="list_user">
                                <?php 
                                    foreach($users as $user) {
                                ?>
                                <tr class="tr-shadow">
                                    <td>
                                        <a href="index.php?page=member&method=update&id=<?=$user['id']?>">
                                            <?=$user['id']?>
                                        </a></td>
                                    <td><?=$user['avatar']?></td>
                                    <td class="desc"><?=$user['name']?></td>
                                    <td><?=$user['created_at']?></td>
                                    <td>
                                        <span class="<?=classStatusUser($user['status'])?>"><?=statusUser($user['status'])?></span>
                                    </td>
                                    <td> <span class="<?=roleUser($user['role_id'])?>"><?=titleUser($user['role_id'])?></span></td>

                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit">
                                                <a href="index.php?page=member&method=update&id=<?=$user['id']?>">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </button>
                                            <button value="<?=$order['id']?>" id="del_order" class="item"  data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
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