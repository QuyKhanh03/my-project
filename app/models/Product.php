<?php 
namespace App\Models;
class Product extends BaseModel { 
    protected $product = "products";
    protected $category = "categories";
    public $comment = "comments";
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


    // comments
    // insert comment
    public function insertComment($content,$user_id,$product_id) {
        $sql = "INSERT INTO $this->comment (content,user_id,product_id) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute(array($content,$user_id,$product_id));
    }
    //count comment
    public function countComment($product_id) {
        $sql = "SELECT COUNT(*) FROM $this->comment WHERE product_id = ?";
        $this->setQuery($sql);
        return $this->loadRecord(array($product_id));
    }

    //get content, time, user_id, username, avatar, product_id from comment
    public function getCommentInfo($product_id) {
        $sql = "SELECT c.content, c.time, c.user_id, u.name_user, u.avatar, c.product_id 
        FROM $this->comment c INNER JOIN users u ON c.user_id = u.id_user WHERE c.product_id = ? ORDER BY c.time DESC LIMIT 5   ";
        $this->setQuery($sql);
        return $this->loadAllRows(array($product_id));
    }
}
