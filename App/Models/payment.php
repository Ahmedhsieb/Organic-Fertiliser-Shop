<?php

//if (
//    (file_exists("../../App/Database/db.php") && is_readable("../../App/Database/db.php") && include_once("../../App/Database/db.php")))
//{
//    include_once "../../App/Database/db.php";
//}else {
//    require "App/Database/db.php";
//}

require_once "product.php";


class payment extends db
{
    public $table = "payment";
    public function addPayment($data)
    {
        return $this->insert($this->table, $data)->execute();
    }

    public function getAllPayments()
    {
        return $this->select("*", $this->table)->getAll();
    }

    public function getPaymentData($id)
    {
        return $this->select("*", $this->table)->where("id", '=', $id)->getRow();

    }

    public function updatePayment($id, $data)
    {
        return $this->update($this->table, $data)->where("id", '=', $id)->execute();
    }


}