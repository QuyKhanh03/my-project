<?php 
namespace App\Models;
class User extends BaseModel {
    protected $user = "users";
    protected $role = "roles";
    public function getUsers() {
        $sql = "SELECT * FROM $this->user";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}