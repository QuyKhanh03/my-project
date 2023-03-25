<?php 
namespace App\Controllers;
use App\Models\Category;
class CategoryController extends BaseController {
    public $category;
    public function __construct() {
        $this->category = new Category();
    }
    public function index() {
        $listCategory = $this->category->getCategories();
        $this->render("categories.table",compact('listCategory'));
    }
    public function showFormAdd() {
        $this->render("categories.add");
    }
    public function formAddPost() {
        $errors = [];
        if(isset($_POST['btn'])) {
            $name_category = $_POST['name_category'];
            if(empty($name_category) || empty(trim($name_category))) {
                $errors['name_category'] = "Vui lòng nhập tên danh mục";
            }
            if(count($errors) > 0) {
                redirect("errors",$errors,"add-category");
            } else {
                $result = $this->category->insertCategory($name_category);
                if($result) {
                    redirect("success","Thêm danh mục thành công","categories");
                }
            }
        }
    }
    public function showFormEdit($id) {
        $category = $this->category->getCategoriesById($id);
        $this->render("categories.edit",compact('category'));
    }
    public function formEditPost($id) {
        $errors = [];
        if(isset($_POST['btn'])) {
            $name_category = $_POST['name_category'];
            if(empty($name_category) || empty(trim($name_category))) {
                $errors['name_category'] = "Vui lòng nhập tên danh mục";
            }
            if(count($errors) > 0) {
                redirect("errors",$errors,"edit-category/$id");
            } else {
                $result = $this->category->updateCategory($id,$name_category);
                if($result) {
                    redirect("success","Cập nhật danh mục thành công","categories");
                }
            }
        }
    }
    public function removeCategory($id) {
        $result = $this->category->deleteCategory($id);
        if($result) {
            redirect("success","Xóa danh mục thành công","categories");
        }
    }
}