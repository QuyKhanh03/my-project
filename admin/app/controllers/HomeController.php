<?php 
namespace App\Controllers;

use App\Models\Home;

class HomeController extends BaseController {
    public $home;
    public function __construct() {
        $this->home = new Home();
    }
    public function index() {
        if(isset($_SESSION["admin"])) {
            $totalWeek = $this->home->getTotalWeekly();
            $totalMonth = $this->home->getTotalMonthly();
            $totalYear = $this->home->getTotalYearly();
            $customerMonth = $this->home->getCustomerMonthly();
            $customerWeek = $this->home->getCustomerWeekly();
            $customerYear = $this->home->getCustomerYearly();
            $topOrder = $this->home->getTop5Order();
            $total_order = $this->home->getTotalOrderToday();
            $total_amount = $this->home->getTotalAmountToday();
            $customers = $this->home->getTotalCustomerToday();
            $this->render("home.index",compact("totalMonth","totalWeek","totalYear","customerMonth","customerWeek","customerYear","topOrder","total_order","total_amount","customers"));
        }else {
            redirect("","","login");
        }
    }

   

}