<?php
session_start();
ob_start();
include_once '../helper/helper.php';
// Upload file ảnh feedback

if(isset($_FILES['img_feedback'])) {
    $res = [];
    $fileSubAva = $_FILES['img_feedback'];
    $temp = isset($_SESSION['name_img_fb']) ? count($_SESSION['name_img_fb']) : 0; //do dai cua session
    if(!empty($fileSubAva['name']) && count($fileSubAva['name']) < 4 && $temp < 3) { //Check không tải quá 3 file
        for ($i = 0; $i < count($fileSubAva['name']); $i++) {
            if(checkFile($fileSubAva['name'][$i], $fileSubAva['size'][$i])) {
                $len = isset($_SESSION['name_img_fb']) ? count($_SESSION['name_img_fb']) : 0;
                $nameFileSub = time().rand().$fileSubAva['name'][$i]; //noi chuoi 
                $nameFileSub = converSlugUrl($nameFileSub);
                $tmpFileSub = $fileSubAva['tmp_name'][$i];
                if(move_uploaded_file($tmpFileSub, './upload/'.$nameFileSub)){
                    $_SESSION['name_img_fb'][$len+1] = $nameFileSub;
                    array_push($res, $nameFileSub);
                }
            }
        }
        if(count($res) < 4) {
            for ($i = 0; $i < count($res); $i++) {
            ?>
                <img class="" style="width: 100px;" src="./Servers/upload/<?=$res[$i]?>" alt="">
            <?php
            }
        }
        else {
            echo 'qty';
        }
    }
    else {
        echo 0;
    }
}
