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
        $this->render("products.details",compact('product'));
    }
    public function index() {
        $products = $this->product->getProducts();
        return $this->render("products.index",compact('products'));
    }
}