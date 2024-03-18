<?php
include_once './Core/Controller.php';
require_once './vendor/autoload.php';

use Carbon\Carbon;
class Dashboard extends Controller
{
    public $orderModel;
    public $billModel;
    public $orderDetailModel;
    public function __construct()
    {
        $this->orderModel = parent::model('Order');
        $this->billModel = parent::model('Bill');
        $this->orderDetailModel = parent::model('OrderDetail');
        $this->index();
    }

    public function index ()
    {
        $now = Carbon::now();
        $toDay = $now->format('Y-m-d');
        $firstOfMonth = $now->firstOfMonth()->format('Y-m-d'); 

        $countBill = $this->billModel->countBill();
        $turnover = $this->billModel->showTurnover();

        include_once './views/dashboard.php';
    }
}