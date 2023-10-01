<?php
require_once "models/Products.php";
require_once "models/Category.php";
require_once "models/Brands.php";
require_once "models/Configuration.php";
require_once "models/Images.php";
require_once "models/Orders.php";
class OrdersController
{
    public function index()
    {
        if (isset($_POST["xacnhan"]) || isset($_POST["chuanbi"]) || isset($_POST["guihang"])) {
            if (isset($_POST["id"])) {
                $orderInfor = Orders::selectOrderDetailById($_POST["id"]);
                $email = $orderInfor["email"];
                if (Orders::getStatus($_POST["id"]) == 0) {
                    require("../PHPMailer/src/PHPMailer.php");
                    require("../PHPMailer/src/SMTP.php");
                    $mail = new \PHPMailer\PHPMailer\PHPMailer();
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
                    $mail->Body = "Đơn hàng có mã " . $_POST["id"] . " của bạn đã được xác nhận!";
                    $mail->AddAddress($email);
                    if (!$mail->Send()) {
                        $message = "Mailer Error: " . $mail->ErrorInfo;
                    }
                    $message = "1";
                }
                Orders::changeStatus($_POST["id"]);
            }
        }
        $orders = Orders::getAllOrderDetailId();
        include 'views/orders.php';
    }
    public function print()
    {
        $data = Orders::selectOrderDetailById($_GET["id"]);
        // Tạo nội dung hóa đơn
        $content = '
        <style>
        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 20px;
            border: 1px solid #333;
        }
        th {
            color:green;
            background-color: #f2f2f2;
        }
    </style>
    <h1 style="color:red;">
    HÓA ĐƠN</h1>
    <table>
        <tr>
            <th style="pading:10px">Mã đơn hàng</th>
            <td>' . $data['id'] . '</td>
        </tr>
        <tr>
            <th>Tên người nhận</th>
            <td>' . $data['name'] . '</td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td>' . $data['address'] . '</td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td>' . $data['phone'] . '</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>' . $data['email'] . '</td>
        </tr>
        <tr>
            <th>Ghi chú</th>
            <td>' . $data['note'] . '</td>
        </tr>
        <tr>
            <th>Phương thức thanh toán</th>
            <td>' . $data['payment'] . '</td>
        </tr>
        <tr>
            <th>Ngày tạo</th>
            <td>' . $data['created_at'] . '</td>
        </tr>
    </table>
    <br/>
    <br/>
    <br/>
    ';
        $sum = 0;
        $content .= '<h2>Danh sách sản phẩm</h2>
    <br/>
    <table style="margin-top:15px">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            
        </tr>
        ';
        $productIds = Orders::getProductIdByOrderDetailId($_GET["id"]);
        $test = 1;
        foreach ($productIds as $prod) {
            $producttt = Products::getProductById($prod["productid"]);
            var_dump($prod);
            echo ("<br/>");
            echo ("<br/>");
            $content .= '
        <tr>
            <td>' . $producttt["product"]['name'] . '</td>
            <td>' . $prod['quantity'] . '</td>
            <td>' . number_format($prod['price'], 0, "", ".") . '</td>
        </tr>';
            $sum += $prod['quantity'] * $prod['price'];

        }
        $content .= '</table>
        <h3>Tổng số tiền: '.number_format($sum, 0, "", ".").' VNĐ</h3>
        ';

        $_SESSION["content"] = $content;
        header('location: views/printInvoice.php');
    }
}
?>