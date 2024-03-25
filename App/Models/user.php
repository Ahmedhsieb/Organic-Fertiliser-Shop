<?php
if (
    (file_exists("../../App/Database/db.php") && is_readable("../../App/Database/db.php") && include_once("../../App/Database/db.php")))
{
    include_once "../../App/Database/db.php";
}else {
    require_once "product.php";
}

//require_once "product.php";
//
//require "../../App/Database/db.php";

class user extends db
{
    public function getUserById($id){
        return $this->select("*", "user")->where("id", "=", $id)->getRow();
    }

    public function getUserList(){
        return $this->select("*", "user")->getAll();
    }

    public function checkUserExist($email, $password){
        return $this->select("*", "user")
            ->where("email", "=", "'$email'")
            ->andWhere("password", "=", $password)->getRow();
    }

    public function addUser($data){
        return $this->insert("user", $data)->execute();
    }

    public function deleteUser($id){
        return $this->delete("user")->where("id", "=", $id)->execute();
    }

    public function updateUser($id, $data){
        return $this->update("user", $data)->where("id", "=", $id)->execute();
    }
}