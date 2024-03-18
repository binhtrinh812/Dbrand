<?php
include_once '../configs/Connect.php';
class Order extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showAllOrder($firstOfMonth, $toDay)
    {
        $sql = "SELECT orders.id, customers.name, customers.email, customers.phone, customers.address, orders.note, orders.status, orders.created_at, orders.payment, SUM(order_detail.total) as check_out FROM customers JOIN orders ON customers.id = orders.customer_id JOIN order_detail ON orders.id = order_detail.order_id WHERE orders.created_at BETWEEN :firstOfMonth AND :toDay GROUP BY orders.id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':firstOfMonth', $firstOfMonth);
        $pre->bindParam(':toDay', $toDay);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showOrderById($id)
    {
        $sql = "SELECT orders.id, customers.name, customers.email, customers.phone, customers.address, orders.note, orders.status, orders.created_at, orders.payment FROM customers JOIN orders ON customers.id = orders.customer_id WHERE orders.id = :id ORDER BY orders.created_at DESC;";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id',$id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

        /**
     * @param $id
     * @param $status
     * @return bool
     */
    public function updateStatus($id, $status)
    {
        $sql = "UPDATE `orders` SET orders.status = :status WHERE orders.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':status', $status);
        return $pre->execute();
    }

    public function deleteOrderById($id)
    {
        $sql = "DELETE FROM orders WHERE orders.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }

    // Hàm tính tổng số đơn hàng
    public function countOrder()
    {
        $sql = "SELECT COUNT(*) as 'count' FROM `orders` WHERE orders.status = 4";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    // Hàm show doanh thu
    public function showTurnover()
    {
        $sql = "SELECT SUM(order_detail.total) as check_out FROM customers JOIN orders ON customers.id = orders.customer_id JOIN order_detail ON orders.id = order_detail.order_id WHERE orders.status = 4 GROUP BY orders.id";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}