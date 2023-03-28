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
    //get * users and count(orders)
    public function getUsersAndCountOrders() {
        $sql = "SELECT users.*, COUNT(orders.id_order) as count_orders FROM
        users LEFT JOIN orders ON users.id_user = orders.user_id where users.role_id = 2  GROUP BY users.id_user";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
}