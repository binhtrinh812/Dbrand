<?php
include_once './configs/Connect.php';
class Product extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */

    public function countProduct($categoryId)
    {
        $sql = "SELECT count(*) FROM products JOIN category ON products.category_id = category.id WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    } 

    public function showProductByCateId($categoryId ,$from, $row)
    {
        $sql = "SELECT products.id, products.name, category.title, products.price, products.avatar  FROM store JOIN products ON store.product_id = products.id JOIN category ON products.category_id = category.id WHERE products.active = 1 and category.id = :categoryId GROUP BY products.id HAVING SUM(store.quantity) > 0 ORDER BY products.created_at DESC LIMIT $from, $row";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':categoryId', $categoryId);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function countProductByCateId($categoryId)
    {
        $sql = "SELECT products.id FROM store JOIN products ON store.product_id = products.id JOIN category ON products.category_id = category.id WHERE products.active = 1 and category.id = :categoryId GROUP BY products.id HAVING SUM(store.quantity) > 0 ORDER BY products.created_at DESC";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':categoryId', $categoryId);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    public function showSizeById($id)
    {
        $sql = "SELECT sizes.id, sizes.size FROM store JOIN sizes ON store.size_id = sizes.id WHERE store.quantity > 0 AND store.product_id = :id GROUP BY sizes.id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function showProductById($id)
    {
        $sql = "SELECT products.id, products.name, products.avatar, products.category_id, category.title, products.description, products.price, products.active FROM products JOIN category ON products.category_id = category.id WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     */
    // public function showImgProductById($id)
    // {
    //     $sql = "SELECT list_image.id, list_image.path FROM list_image WHERE list_image.product_id = :id";
    //     $pre = $this->pdo->prepare($sql);
    //     $pre->bindParam(':id', $id);
    //     $pre->execute();
    //     return $pre->fetchAll(PDO::FETCH_ASSOC);
    // }

    public function showSize()
    {
        $sql = "SELECT * FROM sizes";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkFeedback($phone)
    {
        $sql = "SELECT DISTINCT order_detail.product_id FROM customers JOIN orders ON customers.id= orders.customer_id JOIN order_detail on orders.id = order_detail.order_id WHERE customers.phone = :phone GROUP BY order_detail.product_id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':phone', $phone);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFeedback($productId, $name, $phone, $rate, $comment)
    {
        $sql = "INSERT INTO `feedback` (`product_id`, `name`, `phone`, `rate`, `comment`) VALUES (:product_id, :name , :phone, :rate, :comment)";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':product_id', $productId);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':phone', $phone);
        $pre->bindParam(':rate', $rate);
        $pre->bindParam(':comment', $comment);
        return $pre->execute();
    }

    public function showFeedback($id)
    {
        $sql = "SELECT * FROM feedback WHERE feedback.product_id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }


    public function addImgFeedBack($feedbackId, $path)
    {
        $sql = "INSERT INTO `feedback_img` (`feedback_id`, `path`) VALUES (:feedback_id, :path)";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':feedback_id', $feedbackId);
        $pre->bindParam(':path', $path);
        return $pre->execute();
    }

    public function showImgFeedback($feedbackId)
    {
        $sql = "SELECT * FROM feedback_img WHERE feedback_img.feedback_id = :feedback_id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':feedback_id', $feedbackId);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function returnLastId()
    {
        return $this->pdo->lastInsertId();
    }
}