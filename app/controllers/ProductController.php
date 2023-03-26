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
        
        //comment
        $listComment = $this->product->getCommentInfo($id);
        $countComment = $this->product->countComment($id);

        //lấy thời gian hiện tại
        $dateTimeCurrent = date('Y-m-d H:i:s');

        $title = "Chi tiết phẩm";
        $title_banner = "Trang sản phẩm chi tiết" ;
        $this->render("products.details",compact('product','title','title_banner','product_related','listComment','countComment','dateTimeCurrent'));
    }

    public function index() {     
        $total_record = $this->product->getTotalProduct(); //đếm số lượng bản ghi
        //số lượng bản ghi trong 1 trang
         $per_page = 8;
        //tính số trang bằng hàm làm tròn lên ceil(tổng số lượng bản ghi / mỗi trang)
        $number_of_page = ceil($total_record/$per_page);
        if(!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        //tính start = (page-1)*per_page
        $page_fist_result = ($page-1)*$per_page;
        //danh sách trang   for($i=1;$i<=$number_of_page;$i++) {
        //}
        $title = "Sản phẩm";
        $title_banner = "Trang sản phẩm";
        $products = $this->product->getProducts($page_fist_result,$per_page);
        $this->render("products.index",compact('products','title','title_banner','number_of_page','page','total_record','page_fist_result','per_page'));   
    }
    // 
    public function addComment() {
        $errors = [];
        if(isset($_POST['btn'])) {
            $content = $_POST['content'];
            $user_id = $_POST['user_id'];
            $product_id = $_POST['product_id'];
            if(isset($_SESSION["auth"])) { 
                $this->product->insertComment($content,$user_id,$product_id);
                redirect("success","Bình luận thành công","product/$product_id");            
            }else {
                redirect("errors","Bạn cần đăng nhập để bình luận","product/$product_id");
            }
        }
        
        
    }
}