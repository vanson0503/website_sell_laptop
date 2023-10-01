<?php
require_once "client/models/Products.php";
require_once "client/models/Images.php";
require_once "client/models/Configuration.php";
class ProductsController
{
    public function index()
    {
        // Số sản phẩm hiển thị trên mỗi trang
        $limit = 8;

        // Lấy tham số trang từ request (nếu không có, mặc định là trang 1)
        $page = isset($_GET['page']) ? $_GET['page'] : 1;


        if(isset($_GET['categoryid'])){
            $categoryid = $_GET['categoryid'];
            $products = Products::getPaginatedProducts($page, $limit, $categoryid);
            $totalProducts = Products::getTotalProducts($categoryid);
        }
        else if(isset($_GET["brandid"])){
            $brandid = $_GET["brandid"];
            $products = Products::getPaginatedProducts2($page, $limit, $brandid);
            $totalProducts = Products::getTotalProducts2($brandid);
        }
        else{
            $products = Products::getAllPaginatedProducts($page, $limit);
            $totalProducts = Products::getAllTotalProducts();
        }
        $totalPages = ceil($totalProducts / $limit);
        include 'client/views/products.php';
    }

    public function deltail(){
        if(isset($_GET["id"])){
            $id = isset($_GET["id"]);
            $product = Products::getProductById($id);
            include 'client/views/productDetail.php';
        }
        else{
            include 'client/views/products.php';
        }
    }

}
?>