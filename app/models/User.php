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
    //get user by email password
    public function getUserByEmailPassword($email,$password) {
        $sql = "SELECT * FROM $this->user WHERE email = ? AND password = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($email,$password));
    }
    //update user
    public function updateUser($name_user,$email,$password,$address,$phone,$avatar,$id) {
       $sql = "UPDATE $this->user SET `name_user` = ?, `email`=?, `password`=?,`address` = ?, `phone`=?,`avatar`=? where id_user = ?";
       $this->setQuery($sql);
       return $this->execute(array($name_user,$email,$password,$address,$phone,$avatar,$id));
    }
    //get user by id 
    public function getUserById($id) {
        $sql = "SELECT * FROM $this->user where id_user = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    // get order by user id
    public function getOrderById($id) {
        $sql = "SELECT * FROM orders where user_id = ? ";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }
    //get order detail by order id
    public function getOrderDetailById($id) {
        $sql = "SELECT * FROM order_details
        JOIN orders ON order_details.order_id = orders.id_order 
        JOIN products ON order_details.product_id = products.id_product
        WHERE orders.id_order = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }
    //update status by id order
    public function updateStatus($id_order,$status) {
        $sql = "UPDATE orders SET status = ? WHERE id_order = ?";
        $this->setQuery($sql);
        return $this->execute(array($status,$id_order));
    }
    
}