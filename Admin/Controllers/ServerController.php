<?php
include_once ("../Models/Server.php");
require_once '../vendor/autoload.php';

use Carbon\Carbon;
class ServerController extends Server
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showDescription($id)
    {
        $description = parent::showDescriptionByID($id);
        echo $description['description'];
    }

    /**
     * @param $id
     * @return bool
     */

    public function deleteProduct($id)
    {
        parent::deleteProductByID($id);
    }

    public function deleteOrder($id)
    {
        parent::deleteOrderById($id);
    }

    public function showOrder($firstOfMonth, $toDay)
    {
        // $now = Carbon::now();
        // $toDay = $now->format('Y-m-d');
        // $firstOfMonth = $now->firstOfMonth()->format('Y-m-d');
        return parent::showAllOrder($firstOfMonth, $toDay);
    }

}