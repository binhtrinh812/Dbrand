<?php
include_once './Core/Controller.php';
include_once './Core/Mailer.php';
class CartController extends Controller
{
    public $cartModel;

    public function __construct()
    {
        $this->cartModel = parent::model('Cart');
        $this->index();
    }

    public function index()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : 'show';
        switch($method) {
            case 'show':
                include_once './Views/cart.php';
                break;          
            case 'checkout';
                $regexName = '/^[^\d+]*[\d+]{0}[^\d+]*$/';
                $regexPhone = '/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/';
                $regexEmail = '/(?![[:alnum:]]|@|-|_|\.)./';
                if(isset($_POST['redirect'])) {
                    $error['email'] = '';
                    $error['phone'] = '';
                    $error['password'] = '';
                    $flag = 1;
                    // Validate name
                    if(empty($_POST['name'])) {
                        $error['name'] = '(Vui lòng nhập họ tên)';
                        $flag = 0;
                    }
                    else if (!preg_match($regexName, $_POST['name'])){
                        $error['name'] = '(Họ tên không hợp lệ)';
                        $flag = 0;
                    }
                    else
                        $name = trim($_POST['name']);

                    // Validate email
                    if(empty($_POST['email'])) {
                        $error['email'] = '(Vui lòng nhập email)';
                        $flag = 0;
                    }
                    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $error['email'] = '(Email không hợp lệ)';
                        $flag = 0;
                    }
                    else {
                        $email = trim($_POST['email']);
                    }

                    // Validate số điện thoại
                    if(empty($_POST['phone'])) {
                        $error['phone'] = '(Vui lòng nhập số điện thoại)';
                        $flag = 0;
                    }
                    else if (!preg_match($regexPhone, $_POST['phone'])) {
                        $error['phone'] = '(Số điện thoại không hợp lệ)';
                        $flag = 0;
                    }
                    else
                        $phone = trim($_POST['phone']);

                    if(empty($_POST['province'])) {
                        $error['province'] = '(Vui lòng chọn tỉnh thành)';
                        $flag = 0;
                    }
                    else
                        $province = trim($_POST['province']);
                    if(empty($_POST['district'])) {
                        $error['district'] = '(Vui lòng chọn quận huyện)';
                        $flag = 0;
                    }
                    else
                        $district = trim($_POST['district']);
                    if(empty($_POST['ward'])) {
                        $error['ward'] = '(Vui lòng chọn xã phường)';
                        $flag = 0;
                    }
                    else
                        $ward = trim($_POST['ward']);
                    if(empty($_POST['address'])) {
                        $error['address'] = '(Vui lòng nhập địa chỉ)';
                        $flag = 0;
                    }
                    else
                        $address = trim($_POST['address']);

                    if(empty($_POST['payment'])) {
                        $error['payment'] = '(Vui lòng chọn phương thức thanh toán)';
                        $flag = 0;
                    }
                    else
                        $payment = trim($_POST['payment']);
                    $note = $_POST['note'];
                    include_once './Views/cart.php';
                    if($flag == 1) {
                        // Nối chuỗi các địa chỉ
                        $address = $address.', '.$ward.', '.$district.', '.$province;
                        $_SESSION['order_id'] = rand(0, 10000);
                        $_SESSION['info'] = [$name, $address, $phone, $email, $note, $payment];
                        if($payment == 'code') {
                            header('location: http://localhost/dbrand/thanh-cong');
                        }
                    }
                }
                break;
        }


    }
}