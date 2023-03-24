<?php 
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;

class ProductController extends BaseController {
    protected $product;
    public function __construct() {
        $this->product = new Product();
    }
    public function productDetail($id) {
        $product = $this->product->getProduct($id);

        $id_category = $product->id_category;
        $product_related = $this->product->getRelatedProduct($id,$id_category);
        
        $title = "Sản phẩm";
        $title_banner = "Trang sản phẩm chi tiết" ;
        $this->render("products.details",compact('product','title','title_banner','product_related'));
    }

    public function index() {
        // if(isset($id)) {

        // }else {
            
        // }
        //lấy tổng số lượng bản ghi
        $total_record = $this->product->getTotalProduct();
        //số lượng bản ghi
        $per_page = 12;
        //tính số trang bằng hàm làm tròn lên ceil(tổng số lượng bản ghi / mỗi trang)
        $max_page = ceil($total_record / $per_page);

        //tính start = (page-1)*per_page

        //danh sách trang   for($i=1;$i<=$total_page;$i++) {

        //}
        $title = "Sản phẩm";
        $title_banner = "Trang sản phẩm";
        $products = $this->product->getProducts();
        return $this->render("products.index",compact('products','title','max_page','title_banner'));
        
    }
    public function page($id) {
        $title = "Sản phẩm";
        $title_banner = "Trang sản phẩm";
        $this->render("products.index",compact('title','title_banner'));
    }
}