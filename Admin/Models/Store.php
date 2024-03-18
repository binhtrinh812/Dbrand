<?php
include_once '../configs/Connect.php';
class Store extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showStore()
    {
        $sql = "SELECT * FROM store";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    // Hàm tính tổng số lượng đơn hàng theo id, hiện thị thuộc tính status ở trang product
    public function showStoreById($id)
    {
        $sql = "SELECT SUM(store.quantity) as total FROM `store` JOIN products on products.id = store.product_id WHERE products.id = :id";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    // Hàm thống kê theo size, để check số lượng sản phẩm trong kho
    // Tham số truyền vào là id sản phẩm và size sản phẩm

    public function getQtyByIdAndSize($id, $size)
    {
        $sql = "SELECT store.quantity FROM `store` JOIN `sizes` ON store.size_id = sizes.id  WHERE store.product_id = :id AND sizes.size = :size";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':size', $size);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }


    public function getSize($size)
    {
        $sql = "SELECT sizes.id FROM `sizes` WHERE sizes.size = :size";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':size', $size);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }
    
    // Hàm update số lượng sản phẩm, khi trạng thái là đang giao hàng, thì quantity = qty.store - qty.order
    // Tham số truyền vào là id sản phẩm, size sản phẩm, số lượng sản phẩm

    
    /**
     * @param $id
     * @param $sizeId
     * @param $quantity
     * @return bool
     */
    public function updateQtyProduct($id, $sizeId, $quantity)
    {
        $sql = "UPDATE `store` SET store.quantity = store.quantity - :quantity WHERE store.product_id = :id AND store.size_id = :size_id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':size_id', $sizeId);
        $pre->bindParam(':quantity', $quantity);
        return $pre->execute();
    }


    /**
     * @param $productId
     * @param $quantity
     * @param $sizeId
     * @return bool
     */
    public function addStore($productId, $quantity, $sizeId)
    {
        $sql = "INSERT INTO `store` (`product_id`, `quantity`, `size_id`) VALUES (:productId, :quantity, :sizeId)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':productId', $productId);
        $pre->bindParam(':quantity', $quantity);
        $pre->bindParam(':sizeId', $sizeId);
        return $pre->execute();
    }


}