<?php 
    namespace App\Models;
    class Home extends BaseModel{
        protected $categories = "categories";
        protected $products = "products";
        public function getCategories() {
            $sql = "SELECT * FROM $this->categories";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
        public function getProductByIdCate($id) {
            $sql = "SELECT * FROM $this->products WHERE $this->products.category_id = ? AND $this->products.quantity_total > 0";
            $this->setQuery($sql);
            return $this->loadAllRows(array($id));
        }
        public function get8ProductNew(){
            $sql = "SELECT * FROM $this->products ORDER BY $this->products.id_product DESC limit 8";
            $this->setQuery($sql);
            return $this->loadAllRows();
        }
       
    }

?>