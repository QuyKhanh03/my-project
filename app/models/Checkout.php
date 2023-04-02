<?php 
namespace App\Models;
class Checkout extends BaseModel {
    //update user 
    public function updateUser($name_user, $email, $phone, $address, $user_id) {
        $sql = "UPDATE users SET name_user = ?, email = ?, phone = ?, address = ? WHERE id_user = ?";
        $this->setQuery($sql);
        return $this->execute(array($name_user, $email, $phone, $address, $user_id));
    }

    //insert order 
    public function insertOrder($user_id,$date_order, $total_amount,$note,$status) {
        $sql = "INSERT INTO orders(user_id, date_order, total_amount,note,status) VALUES(?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute(array($user_id,$date_order, $total_amount,$note,$status));
    }
    //insert order detail
    public function insertOrderDetail($order_id, $product_id,$product_price, $quantity) {
        $sql = "INSERT INTO order_details(order_id, product_id, product_price, quantity) VALUES(?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute(array($order_id, $product_id,$product_price, $quantity));
    }
    //get id order by user id
    public function getIdOrderByUserId($user_id) {
        $sql = "SELECT id_order FROM orders WHERE user_id = ? order by date_order desc limit 1";
        $this->setQuery($sql);
        return $this->loadRow(array($user_id));
    }
    //insert user
    public function insertUser($name_user, $email, $phone, $address, $password,$role_id) {
        $sql = "INSERT INTO users(name_user, email, phone, address, password,role_id) VALUES(?,?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute(array($name_user, $email, $phone, $address, $password,$role_id));
    }
    //get last id user
    public function getLastIdUser() {
        $sql = "SELECT id_user FROM users ORDER BY id_user DESC LIMIT 1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
}