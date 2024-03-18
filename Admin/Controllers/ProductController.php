<?php
include_once './Core/Controller.php';
require_once './vendor/autoload.php';

use Carbon\Carbon;

class ProductController extends Controller
{
    public $productModel;
    public $categoryModel;
    public $sizeModel;
    public $storeModel;
    public function __construct()
    {
        $this->productModel = parent::model('Product');
        $this->categoryModel = parent::model('Category');
        $this->sizeModel = parent::model('Size');
        $this->storeModel = parent::model('Store');

        $this->index();
    }

    public function index()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : 'show';
        switch ($method) {
            case 'show':
                $now = Carbon::now();
                $toDay = $now->format('Y-m-d');
                $firstOfMonth = $now->firstOfMonth()->format('Y-m-d');

                $nowSub = Carbon::now();
                $toDaySub = $nowSub->format('m-d-Y');
                $firstOfMonthSub = $nowSub->firstOfMonth()->format('m-d-Y');
                // Hiện thị thông tin sản phẩm
                $products = $this->productModel->showProduct();

                include_once './views/product/show_product.php';
                break;
            case 'add':
                $categories = $this->categoryModel->showCategory();
                include_once './views/product/add_product.php';
                $this->addProduct();
                break;
            case 'delete':
                $this->deleteProduct();
                break;
            case 'more':
                $this->moreProduct();
                break;
            case 'update':
                include_once './views/product/update_product.php';
                break;
            case 'edit':
                $this->editProduct();
                break;
        }
    }

    public function addProduct()
    {
        if (isset($_POST['add_product'])) {
            $errors = [];
            $categoryId = $_POST['title'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $filesAva = $_FILES['avatar'];
            $nameFileAva = time().$filesAva['name'];
            $tmpFileAva = $filesAva['tmp_name'];
            move_uploaded_file($tmpFileAva, '../store_img/' . $nameFileAva);
            $addProduct = $this->productModel->createProduct($categoryId, $name, $price, $nameFileAva, $description);

            $productId = $this->productModel->returnLastId();
            if (isset($addProduct)) {
                $_SESSION['alert'] = 1;
                header('location: index.php?page=product');
            } else {
                $_SESSION['errors'] = 1;
                
                header('location: index.php?page=product&method=add');
            }
        } else {

        }
    }
    public function editProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->productModel->showProductById($id);
            $sizes  = $this->sizeModel->showSize();
            $categories = $this->categoryModel->showCategory();
            if (isset($_POST['edit_product'])) {
                $categoryId = $_POST['title'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $description = $_POST['description'];
                $active = $_POST['active'];

                $nameFileAva = $oldFile = $product['avatar'];
                $filesAva = $_FILES['avatar'];

                //update file avatar
                if (!empty($filesAva['name'])) {
                    $nameFileAva = time().$filesAva['name'];
                    $tmpFileAva = $filesAva['tmp_name'];
                    move_uploaded_file($tmpFileAva, '../store_img/' . $nameFileAva);
                    unlink('../store_img/' . $oldFile);
                }
                $update = $this->productModel->updateById($id, $categoryId, $name, $price, $nameFileAva, $description, $active);

                // update size and quantity to store
                $sizePosts = $_POST['size'];
                $quantity = $_POST['quantity'];
                if ($quantity > 0) {
                    foreach ($sizePosts as $size) {
                        $insertStore = $this->storeModel->addStore($id, $quantity, $size);
                    }
                }

                if ($update ||  $insertStore) { //cap nhat san pham thanh cong
                    unset($_SESSION['ava']);
                    $_SESSION['alert'] = 3;
                    header('location: index.php?page=product');
                }
            } else {
            }
            include_once './views/product/edit_product.php';
        }
    }

    public function deleteProduct()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->productModel->showProductById($id);
            unlink('../store_img/' . $product['avatar']);
            $delProduct = $this->productModel->deleteById($id);
            $listImg = $this->productModel->showImgProductById($id);
            foreach ($listImg as $img) {
                unlink('../store_img/' . $img['path']);
            }
            $delImg = $this->productModel->deleteSubById($id);
            if ($delProduct && $delImg) {
                $_SESSION['alert'] = 2;
                header('location: index.php?page=product');
            }
        }
    }

    public function moreProduct()
    {
    }
}
