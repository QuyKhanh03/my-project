<?php 
namespace App\Models;
class Product extends BaseModel { 
    protected $product = "products";
    public function getProducts() { 
        $sql = "SELECT * FROM $this->product";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    
    public function getProduct($id) { 
        $sql = "SELECT * FROM $this->product WHERE id_product = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    
}
