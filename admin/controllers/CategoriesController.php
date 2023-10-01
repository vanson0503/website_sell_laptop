<?php
require_once "models/Category.php";
class CategoriesController
{
    public function index()
    {
        $categories = Category::getAllCategories();
        include 'views/category.php';
    }

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];

            // Thực hiện xử lý và thêm danh mục vào CSDL
            if (Category::addCategory($name, $description)) {
                // Thêm thành công
                echo '<script>

                    alert("Danh mục đã được thêm thành công");
                </script>';
                header("Location: categories");
            } else {
                // Lỗi khi thêm danh mục
                echo '<script>
                    alert("Đã xảy ra lỗi khi thêm danh mục");
                </script>';
            }
        } else {
            // Nếu không phải là yêu cầu POST, trả về lỗi
            echo '<script>
                    alert("Yêu cầu không hợp lệ!");
                </script>';
        }
    }
    public function updateCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['editName'];
            $description = $_POST['editDescription'];
            echo '<script>
                    alert("Đã xảy ra lỗi khi sửa danh mục");
                </script>';

            // Thực hiện xử lý và thêm danh mục vào CSDL
            if (Category::updateCategory($id,$name, $description)) {
                // Thêm thành công
                echo '<script>
                    alert("Danh mục đã được sửa thành công");
                </script>';
                header("Location: categories");
            } else {
                // Lỗi khi thêm danh mục
                echo '<script>
                    alert("Đã xảy ra lỗi khi sửa danh mục");
                </script>';
            }
        } else {
            // Nếu không phải là yêu cầu POST, trả về lỗi
            echo '<script>
                    alert("Yêu cầu không hợp lệ!");
                </script>';
        }
    }
    public function deleteById()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            echo '<script>
            alert("' . $id . '");
        </script>';
            // Thực hiện xử lý và thêm danh mục vào CSDL
            if (Category::deleteById($id)) {
                // Thêm thành công
                echo '<script>
                    alert("Danh mục đã được xóa thành công");
                </script>';
                header("Location: categories");
            } else {
                // Lỗi khi thêm danh mục
                echo '<script>
                    alert("Đã xảy ra lỗi khi xóa danh mục");
                </script>';
                header("Location: categories");
            }
        } else {
            // Nếu không phải là yêu cầu POST, trả về lỗi
            echo '<script>
                    alert("Yêu cầu không hợp lệ!");
                </script>';
            header("Location: categories");
        }
        include "views/404.php";
    }
}
?>