<?php
require_once "config/connectDatabase.php";
class Carts
{
    public static function addCart($customerid, $productid, $quantity,$price)
    {
        global $conn;

        $sqlselect = "SELECT * FROM cart where customerid=$customerid and productid=$productid";
        $result = mysqli_query($conn, $sqlselect);

        if (mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO cart(customerid,productid,quantity,price) value ($customerid,$productid,$quantity,$price)";

            if (mysqli_query($conn, $sql)) {
                return true;
            }
            return false;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $quantity = $quantity+$row["quantity"];
            $sqlupdate = "Update cart set quantity = ".$quantity." where customerid=$customerid and productid=$productid";
            if (mysqli_query($conn, $sqlupdate)) {
                return true;
            }
            return false;
        }
    }
    public static function updateCart($customerid, $productid, $quantity)
    {
        global $conn;

        $sqlselect = "SELECT * FROM cart where customerid=$customerid and productid=$productid";
        $result = mysqli_query($conn, $sqlselect);

        if (mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO cart(customerid,productid,quantity) value ($customerid,$productid,$quantity)";

            if (mysqli_query($conn, $sql)) {
                return true;
            }
            return false;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $sqlupdate = "Update cart set quantity = ".$quantity." where customerid=$customerid and productid=$productid";
            if (mysqli_query($conn, $sqlupdate)) {
                return true;
            }
            return false;
        }
    }
    public static function addUpdateCart($customerid, $productid, $quantity)
    {
        global $conn;

        $sqlselect = "SELECT * FROM cart where customerid=$customerid and productid=$productid";
        $result = mysqli_query($conn, $sqlselect);

        if (mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO cart(customerid,productid,quantity) value ($customerid,$productid,$quantity)";

            if (mysqli_query($conn, $sql)) {
                return true;
            }
            return false;
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $sqlupdate = "Update cart set quantity += ".$quantity." where customerid=$customerid and productid=$productid";
            if (mysqli_query($conn, $sqlupdate)) {
                return true;
            }
            return false;
        }
    }

    public static function getByCustomerId($id){
        global $conn;
        $sqlselect = "SELECT * FROM cart where customerid=$id";

        $result = mysqli_query($conn,$sqlselect);
        $data = [];

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        return $data;

    }
    public static function countCartByCustomerId($id){
        global $conn;

        $sqlselect = "SELECT COUNT(*) as num FROM cart where customerid=$id";
        $result = mysqli_query($conn,$sqlselect);
        $row = mysqli_fetch_assoc($result);

        return $row["num"];
    }

    public static function deleteById($id){
        global $conn;

        $sqldelete = "DELETE FROM cart where id=$id";

        if(mysqli_query($conn,$sqldelete)){
            return true;
        }
        return false;
    }

    public static function orderCart($customerId,$name,$phone,$email,$address,$note,$payment){
        global $conn;

        $sql = "INSERT into orders(name,phone,email,address,note,payment) value ('$name','$phone','$email','$address','$note','$payment')";

        if(mysqli_query($conn,$sql)){
            $idOrder = mysqli_insert_id($conn);
            $carts = Carts::getByCustomerId($customerId);
            foreach($carts as $cart){
                $productId=$cart["productid"];
                $quantity = $cart["quantity"];
                $price=$cart["price"];
                $sqlInsert = "INSERT into orderdetail(orderid,customerid,productid,quantity,price) value ($idOrder,$customerId,$productId,$quantity,$price)";
                if(mysqli_query($conn,$sqlInsert)){
                }
            }
            mysqli_query($conn,"DELETE FROM cart where customerid = $customerId");
            return true;
        }
        else{
            return false;
        }
    }

    public static function changeStatus($orderdetailid){
        global $conn;
        $sql = "UPDATE orders set status = status+1 where id = $orderdetailid";
        if(mysqli_query($conn,$sql)){
            return true;
        }
        return false;
    }
}
?>