<?php
include_once './configs/Connect.php';
class Vnpay extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return bool
     */

    public function insertVnpay($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $idOrder)
    {
        $sql = "INSERT INTO `vnpay` (`vnp_amount`, `vnp_bankcode`, `vnp_banktranno`, `vnp_cardtype`, `vnp_orderinfo`, `vnp_paydate`, `vnp_responsecode`, `vnp_tmncode`, `vnp_transactionno`, `order_id`) VALUES (:vnp_amount, :vnp_bankcode, :vnp_banktranno, :vnp_cardtype, :vnp_orderinfo, :vnp_paydate, :vnp_responsecode, :vnp_tmncode, :vnp_transactionno, :order_id)";
        $pre= $this->pdo->prepare($sql);
        $pre->bindParam(':vnp_amount', $vnp_Amount);
        $pre->bindParam(':vnp_bankcode', $vnp_BankCode);
        $pre->bindParam(':vnp_banktranno', $vnp_BankTranNo);
        $pre->bindParam(':vnp_cardtype', $vnp_CardType);
        $pre->bindParam(':vnp_orderinfo', $vnp_OrderInfo);
        $pre->bindParam(':vnp_paydate', $vnp_PayDate);
        $pre->bindParam(':vnp_responsecode', $vnp_ResponseCode);
        $pre->bindParam(':vnp_tmncode', $vnp_TmnCode);
        $pre->bindParam(':vnp_transactionno', $vnp_TransactionNo);
        $pre->bindParam(':order_id', $idOrder);
        return $pre->execute();
    }
}
    