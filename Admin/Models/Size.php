<?php
include_once '../configs/Connect.php';
class Size extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function showSize()
    {
        $sql = "SELECT * FROM sizes";
        $pre = $this->pdo->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}