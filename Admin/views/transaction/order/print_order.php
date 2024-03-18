<?php

require_once '../../../tfpdf/tfpdf.php';
require_once '../../../../configs/Connect.php';
session_start();
class printOrder extends Connect 
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */

    public function showOrderById($id)
    {
        $sql = "SELECT orders.id, customers.name, customers.email, customers.phone, customers.address, orders.note, orders.status, orders.created_at, orders.payment FROM customers JOIN orders ON customers.id = orders.customer_id WHERE orders.id = :id ORDER BY orders.created_at DESC;";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id',$id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function showOrderDetailByOrderId($orderId)
    {
        $sql = "SELECT order_detail.product_id, order_detail.product_name, order_detail.product_size, order_detail.price, order_detail.quantity, order_detail.total, products.active FROM order_detail JOIN products ON order_detail.product_id = products.id WHERE order_detail.order_id = :orderId";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':orderId',$orderId);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}

$id = $_GET['id'];
$pdf = new tFPDF();
$pdf->AddPage();

$print = new printOrder();
$order = $print->showOrderById($id);
$orderDetail = $print->showOrderDetailByOrderId($id);

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',11);
$pdf->Image('../../../images/icon/logo1.png');
$pdf->Ln(10);
$pdf->Write(10,'Mã đơn hàng: '.$order['id']);
$pdf->Ln(10);
$pdf->Write(10,'Khách hàng: '.$order['name']);
$pdf->Ln(10);
$pdf->Write(10,'Địa chỉ giao hàng: '.$order['address']);
$pdf->Ln(10);
$pdf->Write(10,'Số điện thoại: '.$order['phone']);
$pdf->Ln(10);
$pdf->Write(10,'Email: '.$order['email']);

$pdf->Ln(20);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);
$pdf->SetLineWidth(.3);

// Header
$width_cell=array(12,70,15,15,40,40);
$pdf->Cell($width_cell[0],10,'STT',1,0,'C', true);
$pdf->Cell($width_cell[1],10,'Tên sản phẩm',1,0,'C', true);
$pdf->Cell($width_cell[2],10,'Size',1,0,'C', true);
$pdf->Cell($width_cell[3],10,'SL',1,0,'C', true); 
$pdf->Cell($width_cell[4],10,'Giá',1,0,'C', true);
$pdf->Cell($width_cell[5],10,'Tổng tiền',1,0,'C', true); 
$pdf->Ln(10);

$pdf->SetFillColor(224,235,255); 

// Data
$i = 1;
$total = 0;
$fill = false;
foreach($orderDetail as $product) {
    $total += $product['quantity']*$product['price'];
    $pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
    $pdf->Cell($width_cell[1],10,$product['product_name'],1,0,'C',$fill);
    $pdf->Cell($width_cell[2],10,$product['product_size'],1,0,'C',$fill);
    $pdf->Cell($width_cell[3],10,$product['quantity'],1,0,'C',$fill);
    $pdf->Cell($width_cell[4],10,number_format($product['price']),1,0,'C',$fill);
    $pdf->Cell($width_cell[5],10,number_format($product['quantity']*$product['price']),1,1,'C',$fill);
    $fill = !$fill;
}
$pdf->Ln(10);
$pdf->Write(10,'Tổng tiền thanh toán: '.number_format($total));
$pdf->Ln(10);
$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại website của chúng tôi!');
$pdf->Ln(10);
$pdf->Output();
?>