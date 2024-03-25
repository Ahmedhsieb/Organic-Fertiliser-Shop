<?php

if (
    (file_exists("../../App/Database/db.php") && is_readable("../../App/Database/db.php") && include_once("../../App/Database/db.php")))
{
    include_once "../../App/Database/db.php";
}else {
    require "App/Database/db.php";
}


class category extends db
{
    public $table = "category";
    public function addCategory($data)
    {
        return $this->insert($this->table, $data)->execute();
    }

    public function getAllCategory()
    {
        return $this->select("*", $this->table)->getAll();
    }

    public function getCategoryById($id)
    {
        return $this->select("*", $this->table)->where("categoryid", '=', $id)->getRow();
    }

    public function getCategoryData($id)
    {
        return $this->select("*", $this->table)->where("categoryid", '=', $id)->getRow();
    }

    public function updateCategory($id, $data)
    {
        return $this->update($this->table, $data)->where("categoryid", '=', $id)->execute();
    }

    public function deleteCategory($id)
    {
        return $this->delete($this->table)->where("categoryid", '=', $id)->execute();
    }
}