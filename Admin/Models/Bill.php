<?php
include_once '../configs/Connect.php';
class Bill extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    // Tạo hóa đơn
    public function addBill($id, $orderId, $name, $total, $code='')
    {
        $sql = "INSERT INTO `bills` (`id`, `order_id`, `name`, `total`, `code`) VALUES (:id, :order_id, :name, :total, :code)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':order_id', $orderId);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':total', $total);
        $pre->bindParam(':code', $code);
        return $pre->execute();
    }

    // Cập nhật hóa đơn
    public function updateBill($orderId , $code, $status)
    {
        $sql = "UPDATE `bills` SET bills.code = :code, bills.status = :status WHERE bills.order_id = :order_id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':order_id', $orderId);
        $pre->bindParam(':code', $code);
        $pre->bindParam(':status', $status);
        return $pre->execute();
    }

    /**
     * @return array
     */
    public function showAllBill2($firstOfMonth, $toDay)
    {
        $sql = "SELECT bills.id, bills.order_id, bills.name, bills.total, bills.code, bills.created_at, bills.status, orders.status AS order_status, orders.payment FROM bills JOIN orders ON bills.order_id = orders.id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':firstOfMonth', $firstOfMonth);
        $pre->bindParam(':toDay', $toDay);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    // Hàm tính tổng số hóa đơn
    public function countBill()
    {
        $sql = "SELECT COUNT(*) as 'count' FROM `bills` WHERE bills.status = 2";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    // Hàm show doanh thu
    public function showTurnover()
    {
        $sql = "SELECT SUM(bills.total) as total FROM bills WHERE bills.status = 2";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }
}