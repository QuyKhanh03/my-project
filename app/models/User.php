<?php 
namespace App\Models;
class User extends BaseModel {
    protected $user = "users";
    protected $role = "roles";

    //insert 
    public function insertUser($name_user,$email,$password,$role_id) {
        $sql = "INSERT INTO $this->user(name_user,email,password,role_id) VALUES(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($name_user,$email,$password,$role_id));
    }
    //get user 
    public function getUsers() {
        $sql = "SELECT * FROM $this->user where role_id = 2";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}