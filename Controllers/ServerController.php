<?php
include_once '../Models/Server.php';
class ServerController extends Server
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addCartController($id, $idSize, $qty)
    {
        parent::addToCart($id, $idSize, $qty);
        return true;
    }

    public function delCartController($id, $size)
    {
        parent::delCart($id, $size);
        return true;
    }

    public function editCartController($id, $size, $qty)
    {
        parent::editCart($id, $size, $qty);
        return true;
    }

    public function viewInfoController($id)
    {
        $view = parent::showDescriptionByID($id);
        return $view['description'];
    }
}