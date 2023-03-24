<?php 
namespace App\Models;
class Category extends BaseModel {
    protected $category = "categories";
    protected $product = "products";
    public function getCategories() {
        $sql = "SELECT * FROM $this->category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getProductByIdCate($id) {
        $sql = "SELECT * FROM $this->product WHERE category_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id));
    }
}