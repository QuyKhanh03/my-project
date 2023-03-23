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
        AND WEEK(orders.date_order) = WEEK(CURDATE()) 
        GROUP BY WEEK(orders.date_order)";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    public function getCustomerWeekly() {
        $sql = "SELECT  COUNT(DISTINCT user_id) as customers
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND WEEK(orders.date_order) = WEEK(CURDATE()) 
        GROUP BY WEEK(orders.date_order)";
        $this->setQuery($sql);
        return $this->loadRecord();
    }

    //thống kê doanh thu theo tháng COUNT(DISTINCT user_id) as customers,
    public function getTotalMonthly() {
        $sql = "SELECT  SUM(total_amount) as total_amount
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND MONTH(orders.date_order) = MONTH(CURDATE())
        GROUP BY MONTH(orders.date_order)";
        
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    public function getCustomerMonthly() {
        $sql = "SELECT  COUNT(DISTINCT user_id) as customers
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        AND MONTH(orders.date_order) = MONTH(CURDATE())
        GROUP BY MONTH(orders.date_order)";
        
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    
    

    //thống kê doanh thu theo năm 
    public function getTotalYearly() {
        $sql = "SELECT  SUM(total_amount) as total_amount
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        GROUP BY YEAR(orders.date_order)";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    public function getCustomerYearly() {
        $sql = "SELECT  COUNT(DISTINCT user_id) as customers
        FROM $this->order 
        WHERE YEAR(orders.date_order) = YEAR(CURDATE()) 
        GROUP BY YEAR(orders.date_order)";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
}