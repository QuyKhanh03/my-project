<?php 
    namespace App\Controllers;
    use App\Models\Home;
    class HomeController extends BaseController {
        protected $home ;
        public function __construct() {
            $this->home = new Home();
        }
        public static function Categories() {
            $m_categories = new Home();
            $categories = $m_categories->getCategories();
            return $categories;
        }
        public static function tabsProduct($id) {
            $m_categories = new Home();
            $listProductByCate = $m_categories->getProductByIdCate($id);
            return $listProductByCate;
        }
        public function index() {
            $listCategory = $this->home->getCategories();
            $topProduct = $this->home->get8ProductNew();
            $this->render("home.index",compact('listCategory','topProduct'));
            
        
            
        }
    }

?>