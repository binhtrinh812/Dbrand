<?php
include_once './Models/Vnpay.php';
include_once './Models/Cart.php';
require_once './Core/Mailer.php';

if(isset($_SESSION['info']) && $_SESSION['order_id']) {
    $name = $_SESSION['info'][0];
    $address = $_SESSION['info'][1];
    $phone = $_SESSION['info'][2];
    $email = $_SESSION['info'][3];
    $note = $_SESSION['info'][4];
    $payment = $_SESSION['info'][5];
    $idOrder = $_SESSION['order_id'];
    if($payment == 'vnpay') {
        // Thanh toán VNPAY
        $vnp_SecureHash = isset($_GET['vnp_SecureHash']) ? $_GET['vnp_SecureHash'] : '';
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') { //thanh toán thành công! hiện thị màn hình thành công, cảm ơn, ...
                $vnp_Amount= $_GET['vnp_Amount'];
                $vnp_BankCode = $_GET['vnp_BankCode'];
                $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
                $vnp_CardType = $_GET['vnp_CardType'];
                $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
                $vnp_PayDate = $_GET['vnp_PayDate'];
                $vnp_ResponseCode = $_GET['vnp_ResponseCode'];
                $vnp_TmnCode = $_GET['vnp_TmnCode'];
                $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
                $vnp_TransactionStatus = $_GET['vnp_TransactionStatus'];
                $vnpay = new Vnpay();
                $add = $vnpay->insertVnpay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $idOrder);

                $cartModel = new Cart();
                $createCustomer = $cartModel->insertCustomer($name, $email, $phone, $address);
                $idCustomer = $cartModel->returnLastId(); //Dùng để insert vào bảng order
                $createOrder = $cartModel->insertOrder($idOrder, $idCustomer, $note, $payment); //Thêm thông tin vào bảng Order
                if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
                    foreach($_SESSION['cart'] as $id) {
                        foreach($id as $product) {
                            $total = $product['qty'] * $product['price']; //Tổng tiền
                            $createOrderDetail = $cartModel->insertOrderDetail($idOrder, $product['id'], $product['name'], $product['size'], $product['price'], $product['qty'], $total);
                        }
                    }
                    $content = contentMailForMany($idOrder, $name, $email, $phone, $address, $payment);
                    $title = "Bạn đã mua hàng thành công tại Dbrand";
                }
                if($createOrderDetail && $add && $createCustomer && $createOrder) {
                    // Gửi mail
                        include_once './Views/send_mails.php';
                    ?>
                    <div class="container">
                        <?=$content?>
                    </div>
                    <div class="link-container">
                        <a target="_blank" href="./index.php" class="more-link">Về trang chủ</a>
                    </div>
                    <?php
                    unset($_SESSION['order_id']);
                    unset($_SESSION['info']);
                    unset($_SESSION['cart']);
                        // Nội dung gửi mail là một table bao gồm các trường thông tin như dưới
                        // $content = "<h3 style='font-size: 0.9em; font-family: sans-serif; padding: 12px 15px;'> Cảm ơn quý khách đã đặt hàng tại Dbrand </h3>";
                }
            } else {
                unset($_SESSION['order_id']);
                unset($_SESSION['info']);
                include_once './Views/failtransaction.php';
            }
        } else {
            unset($_SESSION['order_id']);
            unset($_SESSION['info']);
            // echo "<span style='color:red'>Chu ky khong hop le</span>";
            include_once './Views/404page.php';
        }
    }
    if($payment == 'code') {
        $cartModel = new Cart();
        $createCustomer = $cartModel->insertCustomer($name, $email, $phone, $address);
        $idCustomer = $cartModel->returnLastId(); //Dùng để insert vào bảng order
        $createOrder = $cartModel->insertOrder($idOrder, $idCustomer, $note, $payment); //Thêm thông tin vào bảng Order
        if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $id) {
                foreach($id as $product) {
                    $total = $product['qty'] * $product['price']; //Tổng tiền
                    $createOrderDetail = $cartModel->insertOrderDetail($idOrder, $product['id'], $product['name'], $product['size'], $product['price'], $product['qty'], $total);
                }
            }
            $content = contentMailForMany($idOrder, $name, $email, $phone, $address, $payment);
            $title = "Bạn đã mua hàng thành công tại Dbrand";
        }
        if($createOrderDetail && $createCustomer && $createOrder) {
            // Gửi mail
                include_once './Views/send_mails.php';
            ?>
            <div class="container">
                <?=$content?>
            </div>
            <div class="link-container">
                <a target="" href="./index.php" class="more-link">Về trang chủ</a>
            </div>
            <?php
            unset($_SESSION['order_id']);
            unset($_SESSION['info']);
            unset($_SESSION['cart']);
        }
    }
}


// Thanh toán code
