<?php
include_once '../configs/Connect.php';
class Customer extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showCustomer()
    {
        $sql = "SELECT orders.id, customers.name, customers.email, customers.phone, customers.address, orders.note, orders.status, orders.created_at FROM customers JOIN orders ON customers.id = orders.customer_id ORDER BY orders.created_at DESC;";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    
}