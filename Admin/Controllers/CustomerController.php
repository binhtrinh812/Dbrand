<?php
include_once './Core/Controller.php';
require_once './vendor/autoload.php';

use Carbon\Carbon;
class CustomerController extends Controller
{
    public $customerModel;
    public function __construct()
    {
        $this->customerModel = parent::model('Customer');
        
        $this->index();
    }

    public function index ()
    {
        $method = isset($_GET['method']) ? $_GET['method'] : 'show';
        switch($method) {
            case 'show':
                $customers = $this->customerModel->showCustomer();
                $now = Carbon::now();
                $toDay = $now->format('m/d/Y');
                $firstOfMonth = $now->firstOfMonth()->format('m/d/Y'); 
                include_once './views/transaction/customer/show_customer.php';
                break;
        }
    }
}