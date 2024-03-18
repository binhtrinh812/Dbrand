<?php
include_once './Core/Controller.php';
require_once './vendor/autoload.php';

use Carbon\Carbon;

class CategoryController extends Controller
{
    public $categoryModel;
    public function __construct()
    {
        $this->categoryModel = parent::model('Category');

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
                $categories = $this->categoryModel->showCategory();

                include_once './views/category/show_category.php';
                break;
            case 'add':
                include_once './views/category/add_category.php';
                $this->addCategory();
                break;
            case 'delete':
                $this->deleteCategory();
                break;
            case 'more':
                $this->moreCategory();
                break;
            case 'update':
                include_once './views/category/update_category.php';
                break;
            case 'edit':
                $this->editCategory();
                break;
        }
    }


    public function addCategory()
    {
        if (isset($_POST['add_category'])) {
            $errors = [];
            $title = $_POST['title'];
            $flag = false;
            $categoryId = $this->categoryModel->returnLastIdCategory();

            // if (isset($addProduct) && isset($addListImg) && $addProduct && $addListImg) {
            //     unlink($_SESSION['ava']);
            //     unlink($_SESSION['subAva']);
            //     $_SESSION['alert'] = 1;
            //     header('location: index.php?page=product');
            // } else {
            //     $_SESSION['errors'] = 1;
            //     $delProduct = $this->productModel->deleteById($productId);
            //     header('location: index.php?page=product&method=add');
            // }
        } else {
            //xoa file o muc upload khi ko submit form tai anh san pham

            // if (isset($_SESSION['subAva']) || isset($_SESSION['ava'])) {
            //     unlink('./Servers/upload/' . $_SESSION['ava']);
            //     $len = count($_SESSION['subAva']);
            //     for ($i = 1; $i <= $len; $i++) {
            //         unlink('./Servers/upload/' . $_SESSION['subAva'][$i]);
            //     }
            //     unset($_SESSION['subAva']);
            //     unset($_SESSION['ava']);
            // }
        }
    }
    public function editCategory()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = $this->categoryModel->showCategoryById($id);

            if (isset($_POST['edit_category'])) {
                // update table categorys
                $title = $_POST['title'];
                $active = $_POST['active'];

                $update = $this->categoryModel->updateByIdCategory($id, $title, $active);

                if ($update ||  $delSubAva || $insertStore || $addListImg) { //cap nhat san pham thanh cong
                    unset($_SESSION['ava']);
                    unset($_SESSION['subAva']);
                    $_SESSION['alert'] = 3;
                    header('location: index.php?page=product&method=edit&id=' . $id);
                }
            } else {
                //xoa file o muc upload khi ko submit form tai anh san pham
                if (isset($_SESSION['ava'])) {
                    unlink('./Servers/upload/' . $_SESSION['ava']);
                    unset($_SESSION['ava']);
                }
                if (isset($_SESSION['subAva'])) {
                    $len = count($_SESSION['subAva']);
                    for ($i = 1; $i <= $len; $i++) {
                        unlink('./Servers/upload/' . $_SESSION['subAva'][$i]);
                    }
                    unset($_SESSION['subAva']);
                }
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
