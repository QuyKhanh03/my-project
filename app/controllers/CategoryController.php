<?php 
namespace App\Controllers;
use App\Models\Category;
class CategoryController extends BaseController {
    protected $category;
    public function __construct() {
        $this->category = new Category();
    }
    public function categoryDetail($id) {
        // $id_cate = $id;
        $id_cate = $id;
        $title = "Danh mục sản phẩm";
        $title_banner = "";
        $productByCategory = $this->category->getProductByIdCate($id);
        $categories = $this->category->getCategories();
        return $this->render("category.index",compact('title_banner','categories','title','id_cate','productByCategory'));
    }
}