<?php

//if (
//    (file_exists("../../App/Database/db.php") && is_readable("../../App/Database/db.php") && include_once("../../App/Database/db.php")))
//{
//    include_once "../../App/Database/db.php";
//}else {
//    require "App/Database/db.php";
//}

require_once "product.php";


class cart extends db
{
    public $table = "cart";
    public function addProduct($data)
    {
        return $this->insert($this->table, $data)->execute();
    }

    public function getAllProduct()
    {
        return $this->select("*", $this->table)->getAll();
    }

    public function getCartData($id)
    {
        return $this->select("*", $this->table)->where("id", '=', $id)->getRow();

    }

    public function checkCartDataExist($productid)
    {
        return $this->select("*", $this->table)->where("productid", '=', $productid)->getRow();

    }

    public function getProductCartQuantity($productid)
    {
        return $this->select("quantity", $this->table)->where("productid", '=', $productid)->getRow();

    }

    public function getCartUserData($id)
    {
        return $this->select("*", $this->table)->where("userid", '=', $id)->getAll();

    }

    public function getTotalPrice(){
        $prices = $this->select("price", $this->table)->getAll();
        $total_price = 0;
//        foreach ($prices as $price){
//            foreach ($price as $p){
//                $total_price += $p*;
//            }
//        }

        foreach ($prices as $index => $price){
            $total_price += array_sum($price);
        }

        return $total_price;
    }

    public function getAllCount($data)
    {
        return $this->select("COUNT(DISTINCT $data) as count", $this->table)->getRow();
    }

    public function updateProduct($productid, $data)
    {
        return $this->update($this->table, $data)->where("productid", '=', $productid)->execute();
    }

    public function deleteProduct($id)
    {
        return $this->delete($this->table)->where("id", '=', $id)->execute();
    }

    public function deleteAllProduct($id)
    {
        return $this->delete($this->table)->where("userid", '=', $id)->execute();
    }
}