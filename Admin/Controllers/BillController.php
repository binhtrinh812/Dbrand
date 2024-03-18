<?php
include_once '../Core/Controller.php';
require_once './vendor/autoload.php';

use Carbon\Carbon;

class BillsController extends Controller
{
    public $orderModel;
    public $orderDetailModel;
    public $storeModel;
    public $billModel;
    public function __construct()
    {
        $this->orderModel = parent::model('Order');
        $this->orderDetailModel = parent::model('OrderDetail');
        $this->storeModel = parent::model("Store");
        $this->billModel = parent::model("Bill");

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
                ##format cho cái input daterange
                $nowSub = Carbon::now();
                $toDaySub = $nowSub->format('m-d-Y');
                $firstOfMonthSub = $nowSub->firstOfMonth()->format('m-d-Y');
                $bills = $this->billModel->showAllBill2($firstOfMonth, $toDay);
                include_once './views/transaction/bill/show_bill.php';
                break;
        }
    }
}

