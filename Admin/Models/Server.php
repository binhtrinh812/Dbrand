<?php
include_once '../../configs/Connect.php';
class Server extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param $id
     * @return bool
     */
    public function deleteProductByID($id)
    {
        // $sql = "DELETE FROM products WHERE products.id = :id";
        $sql = "DELETE FROM products WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id',$id);
        $pre->execute();
    }


    public function updateProductById($id)
    {
        $sql = "UPDATE `products` SET products.active = -1 WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }

    public function showDescriptionByID($id)
    {
        $sql = "SELECT products.description FROM products WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id',$id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function showQtySizeProuduct($id)
    {
        $sql = "SELECT sizes.size, SUM(store.quantity) as 'total_qty' FROM `store` JOIN sizes ON store.size_id = sizes.id WHERE store.product_id = :id GROUP BY sizes.id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id',$id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function showStoreById($id)
    {
        $sql = "SELECT SUM(store.quantity) as total FROM `store` JOIN products on products.id = store.product_id WHERE products.id = :id";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    
    /**
     * @return array
     */
    public function showProduct($firstOfMonth, $toDay)
    {
        $sql = "SELECT products.id, products.name, category.title, products.price, products.avatar, products.active  FROM products JOIN category ON products.category_id = category.id WHERE products.active != -1 AND products.created_at BETWEEN :firstOfMonth AND :toDay ORDER BY created_at DESC";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':firstOfMonth', $firstOfMonth);
        $pre->bindParam(':toDay', $toDay);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }


    // Xử lý quản lý giao dịch

    /**
     * @param $id
     * @return bool
     */
    public function deleteOrderById($id)
    {
        $sql = "DELETE FROM orders WHERE orders.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }

    public function deleteProductInDetail($id)
    {
        $sql = "DELETE FROM order_detail WHERE order_detail.product_id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
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

    /**
     * @return array
     */
    public function showAllBill($firstOfMonth, $toDay)
    {
        $sql = "SELECT bills.id, bills.order_id, bills.name, bills.total, bills.code, bills.created_at, bills.status, orders.status AS order_status, orders.payment FROM bills JOIN orders ON bills.order_id = orders.id WHERE bills.created_at BETWEEN :firstOfMonth AND :toDay";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':firstOfMonth', $firstOfMonth);
        $pre->bindParam(':toDay', $toDay);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}