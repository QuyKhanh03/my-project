<?php

namespace App\Controllers;

use App\Models\Cart;

class CartController extends BaseController
{
    public $cart;
    public function __construct()
    {
        $this->cart = new Cart();
    }
    public function addToCart()
    {
        if(isset($_POST["btn"])) {
            $id = $_GET["id"];
            $product = $this->cart->getProduct($id);
            $quantity = $_POST["qtybutton"];       
            $price = ($product->sale_off == 0) ? ($product->price_product) : ($product->price_product * (100 - $product->sale_off)) / 100;          
            if(empty($_SESSION["carts"][$id])){
                $_SESSION["carts"][$id] = [
                    "id" => $id,
                    "name" => $product->name_product,
                    "image" => $product->image,
                    "price" => $price,
                    "quantity" => $quantity,
                    "total" => $price * $quantity
                ];
            }else {
                $_SESSION["carts"][$id]["quantity"] += $quantity;
                $_SESSION["carts"][$id]["total"] = $_SESSION["carts"][$id]["quantity"] * $_SESSION["carts"][$id]["price"];
            }
            redirect("success", "Thêm vào giỏ hàng thành công", "cart");
        }
    }
    //cập nhật giỏ hàng
   public function changeQuantity() {
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
            if(isset($_SESSION["carts"])) {
                if($_GET["set"]=="plus"){
                    $_SESSION["carts"][$id]["quantity"] ++;
                    $_SESSION["carts"][$id]["total"] = $_SESSION["carts"][$id]["quantity"] * $_SESSION["carts"][$id]["price"];
                }
            }
            if(isset($_SESSION["carts"])) {
                if($_GET["set"]=="minus"&& $_SESSION['carts'][$id]['quantity'] > 1){
                    $_SESSION["carts"][$id]["quantity"] -= 1;
                    $_SESSION["carts"][$id]["total"] = $_SESSION["carts"][$id]["quantity"] * $_SESSION["carts"][$id]["price"];
                }
            }
            redirect("success", "Cập nhật giỏ hàng thành công", "cart");
        }
   }
    public function index()
    {
        $title = "Giỏi hàng";
        $title_banner = "Giỏi hàng của bạn";
        $this->render("cart.index", compact('title', 'title_banner'));
    }
    public function removeItemCart($id) {
        if(isset($_SESSION["carts"][$id])) {
            unset($_SESSION["carts"][$id]);
        }
        redirect("success", "Xóa sản phẩm thành công", "");
    }
    public function removeCart($id) {
        if(isset($_SESSION["carts"][$id])) {
            unset($_SESSION["carts"][$id]);
        }
        redirect("success", "Xóa sản phẩm thành công", "cart");
    }
    public function removeAllCart() {
        if(isset($_SESSION["carts"])) {
            unset($_SESSION["carts"]);
        }
        redirect("success", "Xóa giỏ hàng thành công", "cart");
    }
}
