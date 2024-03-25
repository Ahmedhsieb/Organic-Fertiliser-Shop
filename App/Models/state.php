<?php

//if (
//    (file_exists("../../App/Database/db.php") && is_readable("../../App/Database/db.php") && include_once("../../App/Database/db.php")))
//{
//    include_once "../../App/Database/db.php";
//}else {
//    require "App/Database/db.php";
//}

require_once "product.php";


class state extends db
{
    public $table = "state";
    public function addState($data)
    {
        return $this->insert($this->table, $data)->execute();
    }

    public function getAllStates()
    {
        return $this->select("*", $this->table)->getAll();
    }

    public function getStateData($id)
    {
        return $this->select("*", $this->table)->where("id", '=', $id)->getRow();

    }

    public function updateState($id, $data)
    {
        return $this->update($this->table, $data)->where("id", '=', $id)->execute();
    }


}