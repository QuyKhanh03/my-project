<?php 
namespace App\Controllers;

use App\Models\Home;

class HomeController extends BaseController {
    public $home;
    public function __construct() {
        $this->home = new Home();
    }
    public function index() {
        $totalWeek = $this->home->getTotalWeekly();
        $totalMonth = $this->home->getTotalMonthly();
        $totalYear = $this->home->getTotalYearly();
        $customerMonth = $this->home->getCustomerMonthly();
        $customerWeek = $this->home->getCustomerWeekly();
        $customerYear = $this->home->getCustomerYearly();
        $this->render("home.index",compact("totalMonth","totalWeek","totalYear","customerMonth","customerWeek","customerYear"));
    }

   

    public function login() {
        $this->render("login.index");
    }
}