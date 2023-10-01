<?php
require_once "models/Products.php";
require_once "models/Category.php";
require_once "models/Brands.php";
require_once "models/Configuration.php";
require_once "models/Images.php";
class ProductsController
{
    public function index()
    {
        // Số sản phẩm hiển thị trên mỗi trang
        $limit = 6;

        // Lấy tham số trang từ request (nếu không có, mặc định là trang 1)
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if(isset($_GET['categoryid'])){
            $categoryid = $_GET['categoryid'];
            $products = Products::getPaginatedProducts($page, $limit, $categoryid);
            $totalProducts = Products::getTotalProducts($categoryid);
        }
        else{
            $products = Products::getAllPaginatedProducts($page, $limit);
            $totalProducts = Products::getAllTotalProducts();
        }
        $totalPages = ceil($totalProducts / $limit);
        include 'views/products.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST["name"];
            $brand = $_POST["brand"];
            $category = $_POST["category"];
            $description = $_POST["description"];
            $quantity = $_POST["quantity"];
            $price = $_POST["price"];
            $cpu = $_POST["cpu"];
            $ram = $_POST["ram"];
            $cardname = $_POST["cardname"];
            $harddrive = $_POST["harddrive"];
            $screen = $_POST["screen"];
            $connect = $_POST["connect"];
            $operatingsystem = $_POST["operatingsystem"];
            $battery = $_POST["battery"];


            if (Products::create($name, $brand, $category, $description, $quantity, $price, $cpu, $ram, $cardname, $harddrive, $screen, $connect, $operatingsystem, $battery)) {
                header("Location: products");
            } else {
                echo '<script>
                    alert("Đã xảy ra lỗi khi tạo sản phẩm");
                </script>';
            }

        }
        $categorylist = Category::getAllCategories();
        $brands = Brands::getAllBrands();
        include 'views/addproduct.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["id"])) {
            $productId = $_GET["id"];
            if (Products::deleteById($productId)) {
                
            } 
            header("Location: ?controller=products");
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET["id"])) {
            $productId = $_GET["id"];
            $data = Products::getProductById($productId);
            if ($data == null) {
                include "views/404.php";
            } else {
                $categorylist = Category::getAllCategories();
                $brands = Brands::getAllBrands();
                $configuration = Configuration::getConfigurationByIdProduct($productId);
                $images = Images::getImagesByProductId($productId);
                include 'views/updateproduct.php';
            }


        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $brand = $_POST["brand"];
            $category = $_POST["category"];
            $description = $_POST["description"];
            $quantity = $_POST["quantity"];
            $price = $_POST["price"];
            $cpu = $_POST["cpu"];
            $ram = $_POST["ram"];
            $cardname = $_POST["cardname"];
            $harddrive = $_POST["harddrive"];
            $screen = $_POST["screen"];
            $connect = $_POST["connect"];
            $operatingsystem = $_POST["operatingsystem"];
            $battery = $_POST["battery"];
            if (Products::update($id, $name, $brand, $category, $description, $quantity, $price, $cpu, $ram, $cardname, $harddrive, $screen, $connect, $operatingsystem, $battery)) {
                header("Location: products");
            } else {
                echo '<script>
                    alert("Đã xảy ra lỗi khi tạo sản phẩm");
                </script>';
            }
        } else {
            include "views/404.php";
        }

    }
    public function add_image()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];


            $files = $_FILES['files'];

            // Kiểm tra xem có file được tải lên hay không
            if (!empty($files['name'][0])) {
                $uploadedFiles = [];
                $targetDir = '../uploads/'; // Thư mục lưu trữ file

                // Lặp qua từng file
                for ($i = 0; $i < count($files['name']); $i++) {
                    $filename = basename($files['name'][$i]);
                    $targetPath = $targetDir . $filename;

                    // Kiểm tra và di chuyển file vào thư mục lưu trữ
                    if (move_uploaded_file($files['tmp_name'][$i], $targetPath)) {
                        Images::add_image($productId, $filename);
                    } else {
                        return false;
                    }
                }
                header("Location: ?controller=products&action=update&id=" . $productId);
                exit();
            }
        } else {
            include "views/404.php";
        }
    }

    public function delete_image()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            if (Images::deleteImageById($id)) {
                header("Location: ?controller=products&action=update&id=" . $_POST["product_id"]);
                exit();
            } else {
                echo '<script>
                alert("Xóa thất bại");
            </script>';
            }
        } else {
            include "views/404.php";
        }
    }

}
?>