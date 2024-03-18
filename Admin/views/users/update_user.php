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
                        <form action="index.php?page=member&method=update&id=<?=$user['id']?>" name="frm_update" method="post" class="form-horizontal">
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
                                    <label for="role" class=" form-control-label">Vai trò</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="role" id="role" class="form-control">
                                        <?php
                                            foreach($roles as $role) {
                                                ?>
                                                <option value="<?=$role['id']?>" <?=$user['role_id'] == $role['id'] ? 'selected' : ''?> ><?=ucfirst($role['title'])?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm" name="submit_update">
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
