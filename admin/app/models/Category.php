<?php 
namespace App\Models;
class Category extends BaseModel {
    protected $product = "products";
    protected $category = "categories";
    public function getCategories() {
        $sql = "SELECT * FROM $this->category";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function insertCategory($name_category) {
        $sql = "INSERT INTO $this->category (`name_category`) VALUES(?)";
        $this->setQuery($sql);
        return $this->execute(array($name_category));
    }
    public function getCategoriesById($id) {
        $sql = "SELECT * FROM $this->category WHERE id_category = ?";
        $this->setQuery($sql);
        return $this->loadRow(array($id));
    }
    public function updateCategory($id,$name_category) {
        $sql = "UPDATE $this->category SET name_category = ? WHERE id_category = ?";
        $this->setQuery($sql);
        return $this->execute(array($name_category,$id));
    }
    public function deleteCategory($id) {
        $sql = "DELETE FROM $this->category WHERE id_category = ?";
        $this->setQuery($sql);
        return $this->execute(array($id));
    }
}