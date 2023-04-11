<?php 
namespace App\Controllers;
use App\Models\Order;
class OrderController extends BaseController {
    protected $order;
    public function __construct() {
        $this->order = new Order();
    }
    public function index() {
        $orders = $this->order->getOrders();
        $this->render("orders.index", compact("orders"));
    }
    //order detail
    public function detail($id) {
        $orders = $this->order->getOrderByid($id);
        $info = $this->order->getUserByIdOrder($id);
        // $order = $this->order->getOrderById($id);
        $this->render("orders.order_detail", compact("orders","info"));
    }
    public function showFormAdd() {
        $products = $this->order->getProducts();
        $this->render("orders.create", compact("products"));
    }
    public function formAddPost() {
        if(isset($_POST["btn"])) {
            $name_user = $_POST["name_user"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $product_id = $_POST["product_id"];
            $quantity = $_POST["quantity"];
            $note = "mua tại quầy";
            $total_amount = 0;
            // insert user
            // $this->order->insertUser($name_user, $email, $phone,md5($phone),2);
            //lấy ra id sau khi thêm mới
            $user_id = $this->order->getLastIdUser();
            //insert order
            
            //lấy id order theo user id user vừa thêm mới
            $order_id = $this->order->getIdOrderByUserId($user_id->id_user);
            // echo $order_id->id_order;
            $item = [];
            foreach($product_id as $key=>$value) {
                array_push($item, $this->order->getProductById($value));
            }
            foreach($item as $key=>$value) {
                
                $total_amount += $quantity*$value->price_product;
            }
            echo number_format($total_amount);
            //insert orders
            // $this->order->insertOrder($user_id,date("Y-m-d H:i:s"),$_POST["total_amount"],$note,2);

            // $price_product = $product->price_product;
            // $total_amount = $price_product * $quantity;
            // echo $product_id;
            //tạo user mới
            // $this->order->insertUser($name_user, $email, $phone,md5($phone),2);
            //lấy ra id sau khi thêm mới
            // $user_id = $this->order->getLastIdUser();
            // $this->order->insertOrder($user_id,date("Y-m-d H:i:s"),$_POST["total_amount"],2);
        }
    }
}