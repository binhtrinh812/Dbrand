<div class="main-content">
    <div class="section__content section__content--p30">
            <div class="container-fluid">
                <?php
                include_once './views/notification/alert.php';  
                ?>
                <a href="index.php?page=product&method=show"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="fa fa-list-ul"></i>Danh sách sản phẩm</button></a>
                <div class="card m-t-30">
                    <div class="card-body card-block">
                        <form action="index.php?page=product&method=add" method="POST" enctype="multipart/form-data" class="form-horizontal" name="frm_add_product">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" class=" form-control-label"> Tên sản phẩm</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input required type="text" id="name" name="name" placeholder=" Nhập tên sản phẩm" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label">Danh mục</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select required name="title" id="select" class="form-control">
                                        <?php
                                        foreach($categories as $category) {
                                        ?>
                                        <option value="<?=$category['id']?>"><?=$category['title']?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="price" class=" form-control-label">Giá</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" required min='0' step="0.5" id="price" name="price" placeholder="Nhập giá" class="form-control" value="">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">Chi tiết sản phẩm</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" id="description" rows="9" placeholder="Nhập chi tiết sản phẩm..." class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="avatar" class=" form-control-label">Ảnh đại diện</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" required id="avatar" name="avatar" class="form-control-file" accept="image/png, image/jpeg, image/jpg" class="up_avatar">
                                    <img class="m-t-10 up_ava__success" style="width: 100px;" src="" alt="">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name="add_product">
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