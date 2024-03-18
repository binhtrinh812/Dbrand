<div class="main-content">
    <?php
    ?>
    <div class="section__content section__content--p30">
            <div class="container-fluid">
                <?php
                include_once './views/notification/alert.php';
                if(isset($errors)) {
                    foreach($errors as $error) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                        <ul>
                            <li><?=$error?></li>
                        </ul>
                        </div>
                    <?php
                    }
                }
                ?>
                <a class="btn btn-primary btn-lg right" href="index.php?page=product&method=show" role="button">Danh sách sản phẩm</a>
                <div class="card m-t-30">        
                    <!-- <div class="card-header">
                        <strong>Chỉnh sửa sản phẩm</strong> Elements
                    </div> -->
                    <div class="card-body card-block">
                    <form action="index.php?page=product&method=edit&id=<?=$product['id']?>" method="POST" enctype="multipart/form-data" class="form-horizontal" name="frm_edit_product">
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="name" class=" form-control-label"> Tên sản phẩm</label>
                                </div>
                                <div class="col-12 col-md-5">
                                    <input type="text" id="name" name="name" placeholder=" Nhập tên sản phẩm" class="form-control" value="<?=$product['name']?>">
                                </div>

                                <!-- test -->
                                <div class="col col-md-1">
                                    <label for="text-input" class=" form-control-label">Giá</label>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="number" min='0' step="0.5" id="price" name="price" placeholder="Nhập giá" class="form-control" value="<?=$product['price']?>">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="select" class=" form-control-label">Danh mục</label>
                                </div>
                                <div class="col-12 col-md-5">
                                    <select name="title" id="select" class="form-control">
                                        <?php
                                        foreach($categories as $category) {
                                        ?>
                                        <option <?=$product['category_id'] == $category['id'] ? 'selected' : '' ?> value="<?=$category['id']?>"><?=$category['title']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <!-- test -->
                                <div class="col col-md-1">
                                    <label class=" form-control-label">Trạng thái</label>
                                </div>
                                <div class="col col-md-4">
                                    <div class="form-check-inline form-check">
                                        <div class="radio">
                                            <label for="hide" class="form-check-label" style="margin-right: 8px">
                                                <input <?=$product['active'] == 1 ? 'checked' : ''?> type="radio" id="hide" name="active" value="1" class="form-check-input">Đang hoạt động
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label for="unhide" class="form-check-label ">
                                                <input <?=$product['active'] == 0 ? 'checked' : ''?> type="radio" id="unhide" name="active" value="0" class="form-check-input">Dừng hoạt động
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="textarea-input" class=" form-control-label">Chi tiết sản phẩm</label>
                                </div>
                                <div class="col-12 col-md-10">
                                    <textarea name="description" id="description" rows="9" placeholder="Nhập chi tiết sản phẩm..." class="form-control" <?=$product['description']?>></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-2">
                                    <label for="avatar" class=" form-control-label">Ảnh đại diện</label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="file" id="avatar" name="avatar" class="form-control-file" accept="image/png, image/jpeg, image/jpg">
                                    <div id="avatar_<?=$product['id']?>" class="box-extra-photo-edit">
                                        <img class="m-t-10" style="width: 100px;" src="../store_img/<?=$product['avatar']?>" 
                                        alt="">
                                        <span class="avatar_remove" avatar-id="<?=$product['id']?>">
                                            <i class="fa-solid fa-xmark"></i>
                                        </span>
                                    </div>
                                    <img class="m-t-10 up_ava__success" style="width: 100px;" src="" alt="">

                                </div>
                            </div>

                            <!-- check box -->
                            <div class="row form-group ">
                                <div class="col col-md-2">
                                    <label class=" form-control-label">Size</label>
                                </div>
                                <div class="col col-md-4">
                                    <div class="form-check-inline form-check checkbox-size">
                                        <?php 
                                        foreach($sizes as $size) {

                                        ?>
                                        <label style="padding-right: 4px !important;" for="inline-<?=$size['id']?>" class="form-check-label ">
                                            <input type="checkbox" id="inline-<?=$size['id']?>" name="size[]" value="<?=$size['id']?>" class="form-check-input"><?=$size['size']?>
                                        </label>
                                        <?php }?>
                                    </div>
                                </div>
                                <!-- test -->
                                <div class="col col-md-2">
                                    <label for="text-input" class=" form-control-label">Số lượng</label>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input type="number" min='0' step="1" id="quantity" name="quantity" placeholder="Nhập số lượng" class="form-control" value="">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name="edit_product">
                                    <i class="fa fa-dot-circle-o"></i> Lưu
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Hoàn tác
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>