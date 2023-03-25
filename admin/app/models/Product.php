<?php 
namespace App\Models;
class Product extends BaseModel {
    protected $product = "products";
    protected $category = "categories";
    public function getProducts() {
        $sql = "SELECT * FROM $this->product 
        JOIN $this->category 
        ON $this->product.category_id = $this->category.id_category ORDER BY $this->product.id_product DESC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    // create a function insertProduct
    //`id_product`, `name_product`, `price_product`, `image`, `short_description`, `detail_description`, `quantity_total`, `sale_off`, `category_id`
    public function insertProduct($name_product, $price_product, $image, $short_description, $detail_description,$quantity_total, $sale_off, $category_id) {
        $sql = "INSERT INTO $this->product 
        (`name_product`, `price_product`, `image`, `short_description`, `detail_description`, `quantity_total`, `sale_off`, `category_id`)
         VALUES(?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($name_product, $price_product, $image, $short_description, $detail_description,$quantity_total, $sale_off, $category_id));
    } 
    // 
    public function getCategories() {
        $sql = "SELECT * FROM $this->category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    // create function delete product by id 
    public function deleteProduct($id) {
        $sql = "DELETE FROM $this->product where id_product = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }

    //create function edit product
    public function getProduct($id) {
        $sql = "SELECT * FROM $this->product WHERE id_product = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    // create function update product
    public function updateProduct($id,$name_product, $price_product, $image, $short_description, $detail_description,$quantity_total, $sale_off, $category_id) {
        $sql = "UPDATE $this->product SET 
        `name_product` = ?,
        `price_product` = ?,
        `image` = ?,
        `short_description` = ?,
        `detail_description` = ?,
        `quantity_total` = ?,
        `sale_off` = ?,
        `category_id` = ?
        WHERE id_product = ?";
        $this->setQuery($sql);
        return $this->execute(array($name_product, $price_product, $image, $short_description, $detail_description,$quantity_total, $sale_off, $category_id,$id));
    }
    
}


?>