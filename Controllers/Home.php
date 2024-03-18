<?php
include_once './Core/Controller.php';
class Home extends Controller
{
    public $productModel;

    public function __construct()
    {
        $this->productModel = parent::model('Product');
        $this->showProduct();
    }

    public function showProduct()
    {
        $this->productModel->showAllProduct();
    }
}