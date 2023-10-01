<?php
require_once "models/customers.php";
    class CustomersController{
        public function index(){
            if(isset($_POST["delete"])){
                $id = $_POST["id"];
                if(Customers::deleteById($id)){
                    $messageDelete = "Xóa thành công!";
                }
                else{
                    $messageDelete = "Xóa thành công!";
                }
            }
            if(isset($_POST["update"])){
                $id = $_POST["id"];
                $name = $_POST["name"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $address = $_POST["address"];
                if(Customers::update($id,$name,$email,$phone,$address)){
                    $messageUpdate = "Cập nhật thành công!";
                }
                else{
                    $messageUpdate = "Cập nhật thất bại!";
                }
            }

            $customers = Customers::getAllCustomers(null);
            include 'views/customers.php';
        }
        public function changeStatus(){
            $id = $_GET["id"];
            $value = $_GET["value"];
            Customers::changeStatus($id,$value);
            header("Location: ?controller=Customers");
        }
    }
?>