<?php
include_once './Core/Controller.php';
class CategoryController extends Controller
{
    public $productModel;
    

    public function __construct()
    {
        $this->productModel = parent::model('Product');
        $this->index();
    }

    public function index()
    {
        $countWestern = count($this->productModel->countProductByCateId(1));
        $countLazy = count($this->productModel->countProductByCateId(2));
        include_once './Views/category.php';
    }
}