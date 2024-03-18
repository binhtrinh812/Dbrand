<?php
include_once './Core/Controller.php';
require_once './vendor/autoload.php';
// require_once './tfpdf/tfpdf.php';

use Carbon\Carbon;
class OrderController extends Controller
{
    public $orderModel;
    public $orderDetailModel;
    public $storeModel;
    public $billModel;
    public function __construct()
    {
        $this->orderModel = parent::model('Order');
        $this->orderDetailModel = parent::model('OrderDetail');
        $this->storeModel = parent::model("Store");
        $this->billModel = parent::model("Bill");
        $this->index();
    }

    public function index ()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : 'show';
        switch($method) {
            case 'show':
                $now = Carbon::now();
                $toDay = $now->format('Y-m-d');
                $firstOfMonth = $now->firstOfMonth()->format('Y-m-d');
                ##format cho cái input daterange
                $nowSub = Carbon::now();
                $toDaySub = $nowSub->format('m-d-Y');
                $firstOfMonthSub = $nowSub->firstOfMonth()->format('m-d-Y');
                $orders = $this->orderModel->showAllOrder($firstOfMonth, $toDay);
                include_once './views/transaction/order/show_order.php';
                break;
            case 'update':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $order = $this->orderModel->showOrderById($id);
                    $orderDetail = $this->orderDetailModel->showOrderDetailByOrderId($id);
                    if(empty($orderDetail)) {   
                        $order['status'] = 5;
                    }
                    $totalCheckOut = 0;
                    foreach($orderDetail as $product) {
                        $totalCheckOut += $product['total'];
                    }
                    if(isset($_POST['update_status'])) {
                        $status = $_POST['status'];
                        $updateStatus = $this->orderModel->updateStatus($id, $status); //Cập nhật trạng thái
                        // gọi đến hàm update qty ở store
                    }
                    if($updateStatus) {
                        $order = $this->orderModel->showOrderById($id); //Hiện thị thông tin order
                        if($order['status'] >= 3 && $order['status'] < 5) {
                            // Nếu status là đang giao hàng thì update số lượng sản phẩm trong kho

                            if($order['status'] == 3) {
                                foreach($orderDetail as $product)
                                {
                                    // chuyển đổi từ size :38 --> idsize :1
                                    $size = $this->storeModel->getSize($product['product_size']);
                                    // Cập nhật số lượng ở trong kho
                                    $updateStore = $this->storeModel->updateQtyProduct($product['product_id'], $size['id'], $product['quantity']);
                                }
                                // Tạo hóa đơn cho khách hàng
                                $billId = rand(1, 9999);
                                $addBill = $this->billModel->addBill($billId, $order['id'], $order['name'], $totalCheckOut);
                            }
                            // Nếu trạng thái là đã hoàn thành status = 4
                            else {
                                // Update bill
                                // Sinh ra mã code trả hàng
                                $code = rand(1, 9999);

                                $updateBill = $this->billModel->updateBill($order['id'], $code, 2); //status = 2 là hóa đơn thành công
                            }
                        }
                        if($updateStatus) {
                            $_SESSION['alert'] = 3;
                            // header('location: index.php?page=order&method=update&id='.$id);
                            header('location: index.php?page=order');
                        }
                    }
                    
                }
                include_once './views/transaction/order/update_order.php';
                break;
            case 'delete':
                if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $deleteOrder = $this->orderModel->deleteOrderById($id);
                    if($deleteOrder) {
                        $_SESSION['alert'] = 3;
                        header('location: index.php?page=order');
                    }
                }
                break;
            
            case 'print':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    include_once './views/transaction/order/print_order.php';
                    // $this->printOrder($id);
                }
                break;
        }
    }

    public function printOrder($id)
    {
        require_once './tfpdf/tfpdf.php';
        $pdf = new tFPDF();
        $pdf->AddPage();
        $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $pdf->SetFont('DejaVu','',14);
        $pdf->Cell(40, 10, $id);
        $pdf->Output();
    }
}