<?php
require_once "client/models/Category.php";
require_once "client/models/Brands.php";
require_once "client/models/Customers.php";
require_once "client/models/Products.php";
require_once "client/models/Carts.php";
require_once "client/models/Orders.php";
class CartsController
{
    public function index()
    {
        if (!isset($_SESSION["customerid"])) {
            if (isset($_POST["id"])) {
                if (isset($_POST["quantity"])) {
                    $quantity = $_POST["quantity"];
                } else {
                    $quantity = 1;
                }

                // Kiểm tra xem giỏ hàng đã được khởi tạo hay chưa
                if (!isset($_SESSION["cart"])) {
                    $_SESSION["cart"] = array();
                }

                // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
                if (isset($_SESSION["cart"][$_POST["id"]])) {
                    // Nếu sản phẩm đã tồn tại, cộng dồn số lượng mới vào số lượng hiện có
                    if (isset($_POST["update"])) {
                        $_SESSION["cart"][$_POST["id"]]["quantity"] = $quantity;
                    } else {
                        $_SESSION["cart"][$_POST["id"]]["quantity"] += $quantity;
                    }
                } else {
                    $product = Products::getProductById($_POST["id"]);
                    // Nếu sản phẩm chưa tồn tại, thêm sản phẩm vào giỏ hàng với số lượng mới
                    $_SESSION["cart"][$_POST["id"]]["quantity"] = $quantity;
                    $_SESSION["cart"][$_POST["id"]]["price"] = $product["product"]["price"];
                }
                header("Location: ?controller=carts");
                exit(); // Kết thúc script
            }
            if (isset($_GET["deleteid"])) {
                if (isset($_SESSION["cart"])) {
                    if (isset($_SESSION["cart"][$_GET["deleteid"]])) {
                        // Nếu sản phẩm đã tồn tại, cộng dồn số lượng mới vào số lượng hiện có
                        unset($_SESSION["cart"][$_GET["deleteid"]]);
                        header("Location: ?controller=carts");
                        exit(); // Kết thúc script
                    }
                }
            }
        } else {
            if (isset($_POST["id"])) {
                if (!isset($_POST["update"])) {
                    if (isset($_POST["quantity"])) {
                        $quantity = $_POST["quantity"];
                    } else {
                        $quantity = 1;
                    }
                    if (Carts::addCart($_SESSION["customerid"], $_POST["id"], $quantity,$_POST["price"])) {
                        header("Location: ?controller=carts");
                        exit(); // Kết thúc script
                    } else {
                        header("Location: ?controller=carts");
                        exit(); // Kết thúc script
                    }
                } else {
                    $quantity = $_POST["quantity"];
                    if (Carts::updateCart($_SESSION["customerid"], $_POST["id"], $quantity)) {
                        header("Location: ?controller=carts");
                        exit(); // Kết thúc script
                    } else {
                        header("Location: ?controller=carts");
                        exit(); // Kết thúc script
                    }
                }
            }

            if (isset($_POST["add"])) {
                if (isset($_POST["id"])) {
                    if (isset($_POST["quantity"]) && $_POST["quantity"] == 1) {
                        $quantity = $_POST["quantity"];
                        if (Carts::addCart($_SESSION["customerid"], $_POST["id"], $quantity,$_POST["price"])) {
                            header("Location: ?controller=carts");
                            exit(); // Kết thúc script
                        } else {
                            header("Location: ?controller=carts");
                            exit(); // Kết thúc script
                        }
                    } else {
                        $quantity = $_POST["quantity"];
                        if (Carts::addUpdateCart($_SESSION["customerid"], $_POST["id"], $quantity)) {
                            header("Location: ?controller=carts");
                            exit(); // Kết thúc script
                        } else {
                            header("Location: ?controller=carts");
                            exit(); // Kết thúc script
                        }
                    }
                }
            }

            if (isset($_GET["deleteid"])) {
                $deleteid = $_GET["deleteid"];
                if (Carts::deleteById($deleteid)) {
                    $message = "true";
                    header("Location: ?controller=carts");
                    exit(); // Kết thúc script
                }
                $message = "false";
                header("Location: ?controller=carts");
                exit(); // Kết thúc script
            }
            $carts = Carts::getByCustomerId($_SESSION["customerid"]);

        }
        include 'client/views/cart.php';
    }

    public function process()
    {
        if (isset($_SESSION["customerid"])) {

            if (Carts::getByCustomerId($_SESSION["customerid"])!=null) {
                $carts = Carts::getByCustomerId($_SESSION["customerid"]);
                $customer = Customer::getCustomerById($_SESSION["customerid"]);
                include 'client/views/process.php';
            } else {
                $carts = Carts::getByCustomerId($_SESSION["customerid"]);
                $message = "Không có sản phẩm trong giỏ hàng!";
                include 'client/views/cart.php';
            }
        } else {
            header("Location: ?controller=home&action=login");
        }

    }

    public function order()
    {
        if (isset($_SESSION["customerid"]) && isset($_POST["order"])) {
            $id = $_SESSION["customerid"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $note = $_POST["note"];
            $payment = $_POST["payment"];
            if (Carts::orderCart($id, $name, $phone, $email, $address, $note, $payment)) {
            }
            header("Location: ?controller=carts&action=orderDetail");
            exit(); // Kết thúc script
        } else {
            header("Location: ?controller=home&action=login");
        }
    }

    public function orderDetail()
    {
        if (isset($_SESSION["customerid"])) {
            $orders = Orders::selectOrderDetailIdByCustomerId($_SESSION["customerid"]);
            include 'client/views/orderdetail.php';
        } else {
            header("Location: ?controller=home&action=login");
        }
    }

    public function updatestatus()
    {
        if (isset($_GET["id"])) {
            Carts::changeStatus($_GET["id"]);
            header("Location: ?controller=carts&action=orderdetail");
        }
    }

}
?>