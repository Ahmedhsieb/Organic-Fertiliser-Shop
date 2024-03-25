<?php

//if (
//    (file_exists("../../App/Database/db.php") && is_readable("../../App/Database/db.php") && include_once("../../App/Database/db.php")))
//{
//    include_once "../../App/Database/db.php";
//}else {
//    require "App/Database/db.php";
//}

require_once "category.php";


class product extends db
{
    public $table = "product";
    public function addProduct($data)
    {
        return $this->insert($this->table, $data)->execute();
    }

    public function getAllProduct()
    {
        return $this->select("*", $this->table)->getAll();
    }

    public function getProductData($id)
    {
        return $this->select("*", $this->table)->where("productid", '=', $id)->getRow();

    }
    public function getProductByCategory($category_id){
        return $this->select("*", $this->table)->where("categoryid", '=', $category_id)->getAll();
    }

    public function getRelatedProduct($category_id, $product_id){
        return $this->select("*", $this->table)->where("categoryid", '=', $category_id)->andWhere("productid", '!=', $product_id)->getAll();
    }

    public function getAllCount($data, $table)
    {
        return $this->select("COUNT(DISTINCT $data) as count", $table)->getRow();
    }

    public function updateProduct($id, $data)
    {
        return $this->update($this->table, $data)->where("productid", '=', $id)->execute();
    }

    public function deleteProduct($id)
    {
        return $this->delete($this->table)->where("productid", '=', $id)->execute();
    }
}