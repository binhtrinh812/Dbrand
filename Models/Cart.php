<?php
include_once './configs/Connect.php';
class Cart extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return bool
     */
    public function insertCustomer($name, $email, $phone, $address)
    {
        $sql = "INSERT INTO `customers` (`name`, `email`, `phone`, `address`) VALUES (:name, :email, :phone, :address)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':email', $email);
        $pre->bindParam(':phone', $phone);
        $pre->bindParam(':address', $address);
        return $pre->execute();
    }

    public function showInfoCustomerById($id)
    {
        $sql = "SELECT customers.name, customers.email, customers.phone, customers.address FROM `customers` WHERE customers.id = :id";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);

    }

    /**
     * @return bool
     */
    public function insertOrder($idOrder, $customerId, $note, $payment)
    {
        $sql = "INSERT INTO `orders` (`id`, `customer_id`, `note`, `payment`) VALUES (:id, :customer_id, :note, :payment)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':id', $idOrder);
        $pre->bindParam(':customer_id', $customerId);
        $pre->bindParam(':note', $note);
        $pre->bindParam(':payment', $payment);
        return $pre->execute();
    }

    /**
     * @return bool
     */
    public function insertOrderDetail($orderId, $productId, $productName, $productSize, $price, $quantity, $total)
    {
        $sql = "INSERT INTO `order_detail` (`order_id`, `product_id`, `product_name`, `product_size`, `price`, `quantity`, `total`) VALUES (:order_id, :product_id, :product_name, :product_size, :price, :quantity, :total)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':order_id', $orderId);
        $pre->bindParam(':product_id', $productId);
        $pre->bindParam(':product_name', $productName);
        $pre->bindParam(':product_size', $productSize);
        $pre->bindParam(':price', $price);
        $pre->bindParam(':quantity', $quantity);
        $pre->bindParam(':total', $total);
        return $pre->execute();
    }

    public function returnLastId()
    {
        return $this->pdo->lastInsertId();
    }

    public function showSizeById($id)
    {
        $sql = "SELECT sizes.size FROM sizes WHERE sizes.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }
}