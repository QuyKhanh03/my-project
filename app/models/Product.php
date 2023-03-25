<?php 
namespace App\Models;
class Product extends BaseModel { 
    protected $product = "products";
    protected $category = "categories";
    public function getProducts($start , $per_page) { 
        $sql = "SELECT * FROM $this->product LIMIT $start,$per_page";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    
    public function getProduct($id) { 
        $sql = "SELECT * FROM $this->product JOIN $this->category 
        on $this->product.category_id = $this->category.id_category WHERE id_product = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }

    //lấy tổng số lượng bản ghi
    public function getTotalProduct() {
        $sql = "SELECT count(*) FROM $this->product";
        $this->setQuery($sql);
        return $this->loadRecord();
    }
    // lấy ra sản phẩm liên quan 
    public function getRelatedProduct($id_product,$id_category) {
        $sql = "SELECT * FROM $this->product 
        WHERE $this->product.category_id = ? 
        and $this->product.id_product <> ?";
        $this->setQuery($sql);
        return $this->loadAllRows(array($id_category,$id_product));
    }
}
