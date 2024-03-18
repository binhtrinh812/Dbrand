<?php
include_once '../configs/Connect.php';
class Server extends Connect
{
    public function __construct()
    {
        parent::__construct();
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
        $sql = "SELECT list_image.id, list_image.path FROM list_image WHERE list_image.product_id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showSizeProductById($id)
    {
        $sql = "SELECT sizes.id, sizes.size FROM store JOIN sizes ON store.size_id = sizes.id WHERE store.quantity > 0 AND store.product_id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }

    public function showSizeById($id)
    {
        $sql = "SELECT sizes.size FROM sizes WHERE sizes.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function showDescriptionById($id)
    {
        $sql = "SELECT products.description FROM products WHERE products.id = :id";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':id', $id);
        $pre->execute();
        return $pre->fetch(PDO::FETCH_ASSOC);
    }

    public function addToCart($id, $idSize, $qty)
    {
        $product = $this->showProductById($id); #thông tin sản phẩm
        $chooseSize = $this->showSizeById($idSize);
        $product['size'] = $chooseSize['size']; ##thông tin size hàng order 
        if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            $_SESSION['cart'][$id][$chooseSize['size']] = $product;
            $_SESSION['cart'][$id][$chooseSize['size']]['qty'] = $qty;
        } 
        else {
            if(array_key_exists($id, $_SESSION['cart'])) {
                if(array_key_exists($chooseSize['size'], $_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id][$chooseSize['size']]['qty'] += $qty;
                }
                else {
                    $_SESSION['cart'][$id][$chooseSize['size']] = $product;
                    $_SESSION['cart'][$id][$chooseSize['size']]['qty'] = $qty;
                }
            }
            else {
                $_SESSION['cart'][$id][$chooseSize['size']] = $product;
                $_SESSION['cart'][$id][$chooseSize['size']]['qty'] = $qty;
            }
        }
    }

    public function delCart($id, $size)
    {
        if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
            unset($_SESSION['cart'][$id][$size]);
        }
        if(empty($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        } 
    }

    public function editCart($id, $size, $qty)
    {
        if(isset($_SESSION['cart']) || !empty($_SESSION['cart'])) {
            $_SESSION['cart'][$id][$size]['qty'] = $qty;
        }
    }

    public function searchLikeName($text)
    {
        $sql = "SELECT products.id, products.name, products.avatar, products.price FROM store JOIN products ON store.product_id = products.id JOIN category ON products.category_id = category.id WHERE products.name LIKE '%$text%' and products.active = 1 GROUP BY products.id HAVING SUM(store.quantity) > 0 ORDER BY products.created_at DESC";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}