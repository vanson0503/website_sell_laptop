<?php
    class AdminsCOntroller{
        public function index(){
            if(isset($_POST["add"])){
                $username = $_POST["newusername"];
                $password = md5($_POST["newpassword"]);
                $role = $_POST["newrole"];
                if(Admins::add($username,$password,$role)){
                    $addMessage = "Tạo tào khoản thành công!";
                }
                else{
                    $addMessage = "Tạo tào khoản thất bại!";
                }
            }
            if(isset($_POST["delete"])){
                if(isset($_POST["id"])){
                    if(Admins::deleteById($_POST["id"])){
                        $deleteMessage = "Xóa thành công!";
                    }
                    else{
                        $deleteMessage = "Xóa thất bại!";
                    }
                }
            }
            if(isset($_POST["updaterole"])){
                $role = $_POST["newrole"];
                if(Admins::updateRole($_POST["id"],$role)){
                    $updateRoleMessage = "Cập nhật chức vụ thành công!";
                }
                else{
                    $updateRoleMessage = "Cập nhật chức vụ thất bại!";
                }
            }
            if(isset($_POST["updatepass"])){
                $password = md5($_POST["newpassword"]);
                if(Admins::updatePass($_POST["id"],$password)){
                    $updatePassMessage = "Cập nhật mật khẩu thành công!";
                }
                else{
                    $updatePassMessage = "Cập nhật mật khẩu thất bại!";
                }
            }
            $admins = Admins::getAll();
            include 'views/admin.php';
        }

        public function profile(){
            $admin = Admins::getById($_SESSION["idadmin"]);
            include 'views/profile.php';
        }
    }
?>