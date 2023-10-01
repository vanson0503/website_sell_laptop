<?php
require_once "client/models/Category.php";
require_once "client/models/Brands.php";
require_once "client/models/Customers.php";
require_once "client/models/Products.php";
class HomeController
{
    public function index()
    {
        $brands = Brands::getAllBrands();
        include 'client/views/home.php';
    }
    public function login()
    {
        if (!isset($_SESSION['customerid'])) {
            if (isset($_POST["btnlogin"])) {
                $email = $_POST["email"];
                $password = md5($_POST["password"]);
                if (Customer::checkLogin($email, $password) != -1) {
                    $_SESSION["customerid"] = Customer::checkLogin($email, $password);
                    header("Location: ?home");
                    exit(); // Kết thúc script
                } else {
                    $message = "Email hoặc mật khẩu không đúng!";
                }
            }
            include 'client/views/auth/login.php';
        } else {
            header("Location: ?controller=home");
            exit(); // Kết thúc script
        }
    }
    public function logout()
    {
        unset($_SESSION["customerid"]);
        header("Location: ?controller=home&action=login");
        exit(); // Kết thúc script
    }
    public function regis()
    {
        if (isset($_POST["btnregis"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            $address = $_POST["address"];
            if ($password != $repassword) {
                $message = "Mật khẩu không khớp!";
            } else {
                $password = md5($password);
                $result = Customer::addCustommer($name, $email, $phone, $password, $address);
                if ($result == -1) {
                    $message = "Email hoặc số điện thoại đã tồn tại!";
                }
                if ($result == 0) {
                    $message = "Có lỗi xảy ra!";
                }
                if ($result == 1) {
                    header("Location: ?controller=home&action=login");
                    exit();
                }
            }
        }
        include 'client/views/auth/regis.php';
    }
    public function search()
    {
        if (isset($_POST["q"])) {
            $q = $_POST["q"];
            $products = Products::search($q);
            include 'client/views/searchproduct.php';
        } else {
            header("Location: ?controller=home");
        }
    }
    public function forgotpass()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy email từ form
            $email = $_POST["email"];
            $customer = Customer::getCustomerByEmail($email);
            if ($customer != null) {
                $recoverycode = Customer::generateRandomString(50);
                require("PHPMailer/src/PHPMailer.php");
                require("PHPMailer/src/SMTP.php");
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                $mail->IsSMTP(); // enable SMTP
                //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                $mail->SMTPAuth = true; // authentication enabled
                $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465; // or 587
                $mail->IsHTML(true);
                $mail->Username = "itech.shoplaptop@gmail.com";
                $mail->Password = "dprbmekpyhgqcooy";
                $mail->SetFrom("itech.shoplaptop@gmail.com");
                $mail->Subject = "iTech";
                $mail->Body = "Để khôi phục mật khẩu, vui lòng truy cập: http://localhost:81/banlaptop/?controller=home&action=resetpass&recoverycode=" . $recoverycode . "  Link có hiệu lực trong 5 phút!";
                $mail->AddAddress($email);
                if (!$mail->Send()) {
                    $message = "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    if (Customer::addRecoveryCode($customer["id"], $recoverycode)) {
                        $message = "Vui lòng kiểm tra email và kích vào link để lấy lại mật khẩu!";
                    }
                }
            } else {
                $message = "Email không tồn tại!";
            }
        }
        include 'client/views/auth/forgotpass.php';
    }
    public function resetpass()
    {
        if (isset($_GET["recoverycode"])) {
            if (Customer::checkRecoveryCode($_GET["recoverycode"])) {
                $recoverycode = $_GET["recoverycode"];
                include 'client/views/auth/resetpass.php';
            } else {
                header("Location: ?controller=home");
            }
        } else if (isset($_POST["btnreset"])) {
            $recoverycode = $_POST["recoverycode"];
            $pass = $_POST["password"];
            $repass = $_POST["repassword"];
            $message = "Mật khẩu không giống nhau!ddd";
            if ($pass != $repass) {
                $message = "Mật khẩu không giống nhau!";
            } else {
                $pass = md5($pass);
                if (Customer::resetPass($recoverycode, $pass)) {
                    header("Location: ?controller=home&action=login");
                } else {
                    $message = "Lỗi!";
                }
            }
            $message = "Mật khẩu không giống nhau!";
            include 'client/views/auth/resetpass.php';
        } else {
            header("Location: ?controller=home");
        }
    }
}
?>