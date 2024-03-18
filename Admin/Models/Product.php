<?php
include_once '../configs/Connect.php';
class Product extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */

    public function showProduct()
    {
        $sql = "SELECT products.id, products.name, category.title, products.price, products.avatar, products.active  FROM products JOIN category ON products.category_id = category.id WHERE products.active != -1 ORDER BY created_at DESC";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showProductByDate($firstOfMonth, $toDay)
    {
        $sql = "SELECT products.id, products.name, category.title, products.price, products.avatar, products.active  FROM products JOIN category ON products.category_id = category.id WHERE products.active != -1 AND products.created_at BETWEEN :firstOfMonth AND :toDay";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':firstOfMonth', $firstOfMonth);
        $pre->bindParam(':toDay', $toDay);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showProductById($id)
    {
        $sql = "SELECT products.id, products.name, products.avatar, products.category_id, products.description, products.price, products.active FROM products WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function showImgProductById($id)
    {
        $sql = "SELECT list_image.id, list_image.path FROM list_image WHERE list_image.product_id = :id AND list_image.active = 1";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    
    /**
     * @param $categoryId
     * @param $name
     * @param $price
     * @param $avatar
     * @param $description
     * @param $status
     * @return bool
     */

    public function createProduct($categoryId, $name, $price, $avatar, $description)
    {
    $sql = "INSERT INTO `products` (`category_id`, `name`, `price`, `avatar`, `description`) VALUES (:category_id, :name, :price, :avatar, :description)";
    $pre= $this->pdo->prepare($sql);
    $pre->bindParam(':category_id', $categoryId);
    $pre->bindParam(':name', $name);
    $pre->bindParam(':price', $price);
    $pre->bindParam(':avatar', $avatar);
    $pre->bindParam(':description', $description);
    return $pre->execute();
    }

    /**
     * @param $product_id
     * @param $path
     * @return bool
     */
    // public function insertSubAvatar($product_id, $path)
    // {
    //     $sql = "INSERT INTO `list_image` (`product_id`, `path`) VALUES (:product_id, :path)";
    //     $pre = $this->pdo->prepare($sql);
    //     $pre->bindParam(':product_id', $product_id);
    //     $pre->bindParam(':path', $path);
    //     return $pre->execute();
    // }

    public function returnLastId()
    {
        return $this->pdo->lastInsertId();
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM products WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }

    // public function deleteSubById($id)
    // {
    //     $sql = "DELETE FROM list_image WHERE list_image.product_id = :id";
    //     $pre = $this->pdo->prepare($sql);
    //     $pre->bindParam(':id', $id);
    //     return $pre->execute();
    // }


        /**
     * @param $id
     * @param $categoryId
     * @param $name
     * @param $price
     * @param $avatar
     * @param $description
     * @param $active
     * @return bool
     */
    public function updateById($id, $categoryId, $name, $price, $avatar, $description, $active)
    {
        $sql = "UPDATE `products` SET products.category_id = :category_id, products.name = :name, products.price = :price, products.avatar = :avatar, products.description = :description, products.active = :active WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':category_id', $categoryId);
        $pre->bindParam(':name', $name);
        $pre->bindParam(':price', $price);
        $pre->bindParam(':avatar', $avatar);
        $pre->bindParam(':description', $description);
        $pre->bindParam(':active', $active);
        return $pre->execute();
    }

    // public function updateSubById($id, $path)
    // {
    //     $sql = "UPDATE list_image SET list_image.path = :path WHERE list_image.id = :id";
    //     $pre = $this->pdo->prepare($sql);
    //     $pre->bindParam(':id', $id);
    //     $pre->bindParam(':path', $path);
    //     return $pre->execute();
    // }

    // public function viewListImg($arrId) {
    //     $stringId = implode("','",$arrId);
    //     $sql = "SELECT * FROM list_image WHERE list_image.id IN  ('$stringId')";
    //     $pre = $this->pdo->prepare($sql);
    //     $pre->execute();
    //     return $pre->fetchAll(PDO::FETCH_ASSOC);
    // }

    // public function deleteSubAvaById($arrId)
    // {
    //     $stringId = implode("','",$arrId);
    //     $sql = "DELETE FROM list_image WHERE list_image.id IN ('$stringId')";
    //     $pre = $this->pdo->prepare($sql);
    //     return $pre->execute();
    // }

    // public function updateSubAvaById($arrId)
    // {
    //     $stringId = implode("','",$arrId);
    //     $sql = "UPDATE list_image SET list_image.active = 0 WHERE list_image.id IN ('$stringId')";
    //     $pre = $this->pdo->prepare($sql);
    //     return $pre->execute();
    // }
}