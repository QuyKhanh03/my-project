<?php 
namespace App\Controllers;
use App\Models\Product;
class ProductController extends BaseController {
    protected $products;
    public function __construct() {
        $this->products = new Product();
    }
    public function index() {
        $listProduct = $this->products->getProducts();
        $this->render("products.table",compact('listProduct'));
    }
    public function showFormAdd() {
        $categories = $this->products->getCategories();
        $this->render("products.add",compact('categories'));
    }
    
    public function formAddPost() {
        $errors = [];
        if(isset($_POST["btn"])) {
            $name_product = $_POST["name_product"];
            $price_product = $_POST["price_product"];
            $short_description = $_POST["short_description"];
            $detail_description = $_POST["detail_description"];
            $quantity_total = $_POST["quantity_total"];
            $sale_off = $_POST["sale_off"];
            $category_id = $_POST["category_id"];
           
            $image = ($_FILES['image']['error'] == 0) ? $_FILES['image']['name'] : "";
        //    var_dump($image);
        //    die();
            if(empty($name_product) || empty(trim($name_product))) {
                $errors["name_product"] = "Vui lòng nhập tên sản phẩm";
            }
            if(empty($price_product) || empty(trim($price_product))) {
                $errors["price_product"] = "Vui lòng nhập đơn giá";
            }
            if(empty($short_description) || empty(trim($short_description))) {
                $errors["short_description"] = "Vui lòng nhập mô tả ngắn";
            }
            if(empty($detail_description) || empty(trim($detail_description))) {
                $errors["detail_description"] = "Vui lòng nhập mô tả chi tiết";
            }
            if(empty($quantity_total) || empty(trim($quantity_total))) {
                $errors["quantity_total"] = "Vui lòng nhập tổng số lượng";
            }
            if(empty($image) || empty(trim($image))) {
                $errors["image"] = "Hình ảnh không được để trống";
            }
            if(empty($category_id)) {
                $errors["category_id"] = "Chọn danh mục cho sản phẩm";
            }
            if(count($errors) > 0) {
                redirect("errors",$errors,"add-product");
            } else {
                $result = $this->products->insertProduct($name_product,$price_product,$image,$short_description,$detail_description,$quantity_total,$sale_off,$category_id);
                if($result) {
                    if($image!="") {
                        move_uploaded_file($_FILES["image"]["tmp_name"],"../public/img/product/".$image);
                    }
                    redirect("success","Thêm thành công","products");
                }
            }
            
        }
    }
    public function showFormEdit($id) {
        $categories = $this->products->getCategories();
        $product = $this->products->getProduct($id);
        $this->render("products.edit",compact('product','categories'));
    }
}