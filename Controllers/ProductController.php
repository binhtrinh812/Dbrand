<?php
include_once './Core/Controller.php';
class ProductController extends Controller
{
    public $productModel;
    

    public function __construct()
    {
        $this->productModel = parent::model('Product');
        $this->index();
    }

    public function index()
    {
        $method = '';
        if(isset($_GET['method'])) {
            $method = $_GET['method'];
        }
        $countWestern = count($this->productModel->countProductByCateId(1));
        $countLazy = count($this->productModel->countProductByCateId(2));
        switch($method) {
            case 'western'; //Show ao polo
                $nav = isset($_GET['nav']) ? $_GET['nav'] : 1;
                $categoryId = 1;
                $showSizes = $this->productModel->showSize();
                $countProduct = count($this->productModel->countProductByCateId($categoryId));
                $row = 9; //Số sản phẩm lấy ra
                $from = ($nav - 1) * $row; // lấy lần lượt từng bản ghi
                $countPage = ceil($countProduct/$row); // Số trang
                $products = $this->productModel->showProductByCateId($categoryId, $from, $row);
                foreach($products as $product) {
                    $sizes[$product['id']] = $this->productModel->showSizeById($product['id']);
                }
                include_once './Views/product.php';
                break;
            
            case 'lazy': //Show ao vest
                $categoryId = 2;
                $nav = isset($_GET['nav']) ? $_GET['nav'] : 1;
                $showSizes = $this->productModel->showSize();
                $countProduct = count($this->productModel->countProductByCateId($categoryId));
                $row = 9; //Số sản phẩm lấy ra
                $from = ($nav - 1) * $row; // lấy lần lượt từng bản ghi
                $countPage = ceil($countProduct/$row); // Số trang
                $products = $this->productModel->showProductByCateId($categoryId, $from, $row);
                foreach($products as $product) {
                    $sizes[$product['id']] = $this->productModel->showSizeById($product['id']);
                }
                include_once './Views/product.php';
                break;
            }

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->productModel->showProductById($id);
            // $listImg = $this->productModel->showImgProductById($id);
            $sizes[$product['id']] = $this->productModel->showSizeById($product['id']);
            $feedbacks = $this->productModel->showFeedback($id);
            $arrange = 0;
            foreach($feedbacks as $feedback) {
                $arrange += $feedback['rate'];
            }

            // Viết feedback
                if(isset($_POST['btn-feedback'])) {
                    $id = $_GET['id'];
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    $rate = $_POST['rate'];
                    $comment = $_POST['comment'];
                    $flag = 0;
                    // Check xem khách hàng đã mua feedback chưa
                    $items = $this->productModel->checkFeedback($phone);
                    foreach($items as $item) {
                        if($id == $item['product_id']) {
                            $flag = 1;     
                        }
                    }
                    if ($flag == 1) {
                        $add = $this->productModel->addFeedback($id, $name, $phone, $rate, $comment);
                        $feedbackId = $this->productModel->returnLastId();
                        $fileImgFb = $_FILES['img_feedback'];
                        $temp = isset($_SESSION['name_img_fb']) ? count($_SESSION['name_img_fb']) : 0; //do dai cua session
                        if(!empty($fileImgFb['name']) && count($fileImgFb['name']) >= 1 && count($fileImgFb['name']) < 4 && $temp < 4) {
                            for ($i = 0; $i < count($fileImgFb['name']); $i++) {
                                if(checkFile($fileImgFb['name'][$i], $fileImgFb['size'][$i])) {
                                    $nameFileFb = $_SESSION['name_img_fb'][$i];
                                    $nameFileFb = converSlugUrl($nameFileFb);
                                    $tmpFileFb = $fileImgFb['tmp_name'][$i];
                                    move_uploaded_file($tmpFileFb, './store_img/feedback/'.$nameFileFb);
                                    $addImg = $this->productModel->addImgFeedBack($feedbackId, $nameFileFb);
                                    unlink('./Servers/upload/'.$nameFileFb);
                                }
                            }
                        }
                        if($add && $addImg) {
                            unset($_SESSION['name_img_fb']);
                            header('location: san-pham/'.$id.'/'.converSlugUrl($product['name']));
                        }
                    }
                    else {
                        unset($_SESSION['name_img_fb']);
                        $error['noti'] = "Bạn không gửi được feedback do chưa mua hàng!";
                    }
                }
                else {
                    //xoa file o muc upload khi ko submit form feedback
                    if(isset($_SESSION['name_img_fb'])) {
                        $len = count($_SESSION['name_img_fb']);
                        for ($i = 1; $i <= $len; $i++) {
                            unlink('./Servers/upload/'.$_SESSION['name_img_fb'][$i]);
                        }
                        unset($_SESSION['name_img_fb']);
                    }
                }
            include_once './Views/detail_product.php';
        }
    }

    public function viewProduct()
    {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->productModel->showProductById($id);
            $listImg = $this->productModel->showImgProductById($id);
            $sizes[$product['id']] = $this->productModel->showSizeById($product['id']);
            include_once './Views/detail_product.php';
        }
    }

    public function feedback($id)
    {        
        include_once './Views/detail_product.php';
    }
}