<?php
include_once '../configs/Connect.php';
class Category extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showCategory()
    {
        $sql = "SELECT * FROM category";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showCategoryById($id)
    {
        $sql = "SELECT category.id, category.title FROM products WHERE category.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function createCategory($title)
    {
    $sql = "INSERT INTO `category` (`title`) VALUES (:title)";
    $pre= $this->pdo->prepare($sql);
    $pre->bindParam(':title', $title);
    return $pre->execute();
    }

    public function returnLastIdCategory()
    {
        return $this->pdo->lastInsertId();
    }

    public function deleteByIdCategory($id)
    {
        $sql = "DELETE FROM category WHERE category.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        return $pre->execute();
    }

    public function updateByIdCategory($id, $title)
    {
        $sql = "UPDATE `category` SET category.title = :title WHERE category.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->bindParam(':title', $title);
        return $pre->execute();
    }




    
}