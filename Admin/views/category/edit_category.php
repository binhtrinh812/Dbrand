<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <?php
            include_once './views/notification/alert.php';
            ?>
            <div class="row">
                <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <strong>Cập nhật thông tin</strong>
                    </div>
                    <div class="card-body card-block">
                        <form action="index.php?page=member&method=edit&id=<?=$user['id']?>" name="frm_edit" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label">Họ tên</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Nhập họ tên..." value="<?=$user['name']?>" class="form-control">
                                    <span style="color: #dc3545; font-size: 16px;" class="help-block"><?= isset($error['name']) ? $error['name'] : '' ?></span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email" class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="email" id="email" name="email" placeholder="Nhập Email..." value="<?=$user['email']?>"class="form-control">
                                    <span style="color: #dc3545; font-size: 16px;" class="help-block"><?= isset($error['email']) ? $error['email'] : '' ?></span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="oldpassword" class=" form-control-label">Mật khẩu hiện tại</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="oldpassword" name="oldpassword" placeholder="Nhập mật khẩu hiện tại..."  value="" class="form-control">
                                    <span style="color: #dc3545; font-size: 16px;" class="help-block"><?= isset($error['oldpassword']) ? $error['oldpassword'] : '' ?></span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="password" class=" form-control-label">Mật khẩu mới</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu mới..."  value="" class="form-control">
                                    <span style="color: #dc3545; font-size: 16px;" class="help-block"><?= isset($error['password']) ? $error['password'] : '' ?></span>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="check_pass" class=" form-control-label">Xác nhận mật khẩu</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="password" id="check_pass" name="check_pass" placeholder="Nhập lại mật khẩu mới... " value=""  class="form-control">
                                    <span style="color: #dc3545; font-size: 16px;" class="help-block"><?= isset($error['check_pass']) ? $error['check_pass'] : '' ?></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="submit_edit">
                                <i class="fa fa-dot-circle-o"></i> Cập nhật
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Hoàn tác
                            </button>
                        </form>
                    </div>
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
