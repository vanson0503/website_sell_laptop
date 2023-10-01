<?php
require_once "models/Products.php";
class HomeController {
    public function index() {
        include 'views/home.php';
    }
    public function logout()
    {
        unset($_SESSION["idadmin"]);
        header("Location: login");
        exit(); // Kết thúc script
    }
    public function thongke(){
        include 'views/thongke.php';
    }
}
?>