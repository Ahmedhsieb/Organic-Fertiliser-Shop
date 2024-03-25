<?php

//if (
//    (file_exists("../../App/Database/db.php") && is_readable("../../App/Database/db.php") && include_once("../../App/Database/db.php")))
//{
//    include_once "../../App/Database/db.php";
//}else {
//    require "App/Database/db.php";
//}

require_once "product.php";


class order extends db
{
    public $table = "order";
    public function addOrder($data)
    {
        return $this->insert($this->table, $data)->execute();
    }

    public function getAllOrders()
    {
        return $this->select("*", $this->table)->getAll();
    }

    public function getOrderData($id)
    {
        return $this->select("*", $this->table)->where("id", '=', $id)->getRow();

    }

    public function getUserOrderData($id)
    {
        return $this->select("*", $this->table)->where("userid", '=', $id)->getAll();

    }


    public function updateOrder($id, $data)
    {
        return $this->update($this->table, $data)->where("id", '=', $id)->execute();
    }

    public function cancelOrder($id)
    {
        return $this->update($this->table, ['stateid'=>2])->where("id", '=', $id)->execute();
    }

    public function delirverOrder($id)
    {
        return $this->update($this->table, ['stateid'=>3])->where("id", '=', $id)->execute();
    }


}