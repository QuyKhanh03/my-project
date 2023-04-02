<?php 
namespace App\Models;
class Order extends BaseModel {
    public function getOrders() {
        $sql = "SELECT orders.id_order,orders.date_order,orders.total_amount,orders.status,users.name_user,users.phone,users.address
        FROM orders
        INNER JOIN users ON orders.user_id = users.id_user";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getOrderByid($id) {
        $sql = "SELECT * FROM order_details
        JOIN orders ON order_details.order_id = orders.id_order 
        JOIN products ON order_details.product_id = products.id_product
        WHERE orders.id_order = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
    //lấy thông tin khác hàng theo id_order
    public function getUserByIdOrder($id_order) {
        $sql = "SELECT *
        FROM orders
        INNER JOIN users ON orders.user_id = users.id_user
        WHERE orders.id_order = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id_order));
    }

    public function getProducts() {
        $sql = "SELECT * FROM products";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    //lấy ra tên sản phẩm, giá sản phẩm theo id
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id_product = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
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
    public function insertUser($name_user, $email, $phone,$password,$role_id) {
        $sql = "INSERT INTO users(name_user, email, phone, password,role_id) VALUES(?, ?, ?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute(array($name_user, $email, $phone,$password,$role_id));
    }
    //get last id user
    public function getLastIdUser() {
        $sql = "SELECT id_user FROM users ORDER BY id_user DESC LIMIT 1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
}