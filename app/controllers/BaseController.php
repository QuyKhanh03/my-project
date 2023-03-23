<?php
namespace App\Controllers;
use eftec\bladeone\BladeOne;
class BaseController{
    protected function render($viewFile, $data = []){
        $viewDir = "./app/views"; //trỏ đến thư mục views để lấy files;
        $storageDir = "./storage"; //dùng để lưu trữ cache thư mục này sẽ tạo 
        $blade = new BladeOne($viewDir,$storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
}
?>