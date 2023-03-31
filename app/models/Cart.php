<?php 
namespace App\Models;
class Cart extends BaseModel {
    //get product by id 
    public function getProduct($id) {
        $sql = "SELECT * FROM products where id_product = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
}