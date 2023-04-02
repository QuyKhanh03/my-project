<?php 
namespace App\Models;
class Home extends BaseModel {
    protected $product = "products";
    protected $order = "orders";
    protected $category = "categories";
    // protected $user = "users";
    
    //thống  kê doanh thu theo tuần
    public function getTotalWeekly() {
        $sql = "SELECT  SUM(total_amount) as total_amount  
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND WEEK(orders.date_order) = WEEK(CURDATE()) AND status = 2
        GROUP BY WEEK(orders.date_order)";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    public function getCustomerWeekly() {
        $sql = "SELECT  COUNT(DISTINCT user_id) as customers
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND WEEK(orders.date_order) = WEEK(CURDATE())  AND status = 2
        GROUP BY WEEK(orders.date_order)";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    //thống kê doanh thu theo tháng COUNT(DISTINCT user_id) as customers,
    public function getTotalMonthly() {
        $sql = "SELECT  SUM(total_amount) as total_amount
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND MONTH(orders.date_order) = MONTH(CURDATE()) AND status = 2
        GROUP BY MONTH(orders.date_order)";
        
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    public function getCustomerMonthly() {
        $sql = "SELECT  COUNT(DISTINCT user_id) as customers
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND MONTH(orders.date_order) = MONTH(CURDATE()) AND status = 2
        GROUP BY MONTH(orders.date_order)";
        
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    
    

    //thống kê doanh thu theo năm 
    public function getTotalYearly() {
        $sql = "SELECT  SUM(total_amount) as total_amount
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) AND status = 2
        GROUP BY YEAR(orders.date_order)";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    public function getCustomerYearly() {
        $sql = "SELECT  COUNT(DISTINCT user_id) as customers
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) AND status = 2 
        GROUP BY YEAR(orders.date_order) ";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    // lấy ra top 5 đơn hàng mới nhất 
    public function getTop5Order() {
        $sql = "SELECT orders.id_order,orders.date_order,orders.total_amount,orders.status,users.name_user,users.phone,users.address
        FROM $this->order 
        INNER JOIN users ON orders.user_id = users.id_user
        ORDER BY orders.id_order DESC LIMIT 5";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    //tổng đơn đặt trong ngày
    public function getTotalOrderToday() {
        $sql = "SELECT COUNT(id_order) as total_order
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND MONTH(orders.date_order) = MONTH(CURDATE())
        AND DAY(orders.date_order) = DAY(CURDATE()) AND status = 2";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    //doanh thu trong ngày
    public function getTotalAmountToday() {
        $sql = "SELECT SUM(total_amount) as total_amount
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND MONTH(orders.date_order) = MONTH(CURDATE())
        AND DAY(orders.date_order) = DAY(CURDATE()) AND status = 2";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    //tổng khách hàng trong ngày
    public function getTotalCustomerToday() {
        $sql = "SELECT COUNT(DISTINCT user_id) as customers
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND MONTH(orders.date_order) = MONTH(CURDATE())
        AND DAY(orders.date_order) = DAY(CURDATE()) AND status = 2";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    // cập nhật trạng thái đơn hàng 
    public function updateStatus($id_order,$status) {
        $sql = "UPDATE $this->order SET status = ? WHERE id_order = ?";
        $this->setQuery($sql);
        return $this->execute(array($status,$id_order));
    }
    //lấy ra thông tin người dùng theo id_order
    public function getUserByIdOrder($id_order) {
        $sql = "SELECT *
        FROM $this->order 
        INNER JOIN users ON orders.user_id = users.id_user
        WHERE orders.id_order = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id_order));
    }
    //lây ra thông tin sản phẩm theo id_order
    public function getProductByIdOrder($id_order) {
        $sql = "SELECT order_details.quantity,order_details.product_price,products.name_product
        FROM order_details 
        INNER JOIN products ON order_details.product_id = products.id_product
        WHERE order_details.order_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_order));
    }
}