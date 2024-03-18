
<?php
if(isset($_SESSION['alert'])) {
    if($_SESSION['alert'] == 1) {
        ?>
        <div class="alert alert-success" role="alert">
            Thêm thành công!
        </div>
    <?php
    }

    if($_SESSION['alert'] == 2) {
        ?>
        <div class="alert alert-danger" role="alert">
            Xóa thành công!
        </div>
    <?php
    }
    if($_SESSION['alert'] == 3) {
        ?>
        <div class="alert alert-success" role="alert">
            Cập nhật thành công!
        </div>
    <?php
    }
unset($_SESSION['alert']);

}

if(isset($_SESSION['errors'])) {
    if($_SESSION['errors'] == 1) {
        ?>
        <div class="alert alert-danger" role="alert">
            Thêm thất bại!
        </div>
    <?php
    }
unset($_SESSION['errors']);

}

?>

