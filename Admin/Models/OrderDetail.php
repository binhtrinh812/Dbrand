<?php
include_once '../configs/Connect.php';
class OrderDetail extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showOrderDetailByOrderId($orderId)
    {
        $sql = "SELECT order_detail.product_id, order_detail.product_name, order_detail.product_size, order_detail.price, order_detail.quantity, order_detail.total, products.active FROM order_detail JOIN products ON order_detail.product_id = products.id WHERE order_detail.order_id = :orderId";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':orderId',$orderId);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}