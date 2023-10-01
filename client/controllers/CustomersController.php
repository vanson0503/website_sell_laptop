<?php
require_once "client/models/Category.php";
require_once "client/models/Brands.php";
require_once "client/models/Customers.php";
require_once "client/models/Products.php";
    class CustomersController{
        public function profile(){
            if(isset($_SESSION["customerid"])){
                $customer = Customer::getCustomerById($_SESSION["customerid"]);
                include 'client/views/profile.php';
            }
            else{
                header("Location: ?home&action=login");
            }
            
        }
        public function update(){
            if(isset($_SESSION["customerid"])){
                if(isset($_POST["update"])){
                    $id = $_POST["id"];
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $phone = $_POST["phone"];
                    $address = $_POST["address"];
                    if(Customer::updateCustomer($id,$name,$email,$phone,$address)){
                        header("Location: ?controller=customers&action=profile");
                    }

                }
                header("Location: ?controller=customers&action=profile");
            }
            else{
                header("Location: ?home&action=login");
            }
        }

        public function updatePass(){
            if(isset($_POST["updatepass"])){
                $id = $_POST['id'];
                $pass = $_POST['password'];
                $newpass = $_POST['newpassword'];
                $renewpass = $_POST['renewpassword'];
                if($newpass==$renewpass){
                    $pass = md5($pass);
                    if(Customer::checkPass($id,$pass)){
                        $newpass = md5($newpass);
                        if(Customer::updatePass($id,$newpass)){
                            $flag = true;
                            $message = "Cập nhật mật khẩu thành công!";
                        }
                        else{
                            $message = "Cập nhật mật khẩu thất bại!";
                        }
                    }
                    else{
                        $message = "Mật khẩu không đúng!";
                    }
                }else{
                    $message = "Mật khẩu mới và mật khẩu nhập lại không giống nhau!";
                }

            }
            $customer = Customer::getCustomerById($_SESSION["customerid"]);
            include 'client/views/profile.php';
        }
    }

?>