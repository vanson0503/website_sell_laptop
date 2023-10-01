<?php
    require_once "config/connectDatabase.php";
    require_once 'client/models/images.php';

    class Orders{
        public static function selectOrderDetailIdByCustomerId($customerId){
            global $conn;

            $sql = "SELECT DISTINCT orderid FROM `orderdetail` where customerid= $customerId";

            $data = [];

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
            }
            return $data;
        }

        public static function selectOrderDetailById($OrderId){
            global $conn;

            $sql = "SELECT * FROM orders where id = $OrderId";

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    return $row;
                }
            }
            return null;
        }
        public static function selectOrderByOrderDetailId($OrderId){
            global $conn;

            $sql = "SELECT * FROM orderdetail where orderid=$OrderId";

            $result = mysqli_query($conn,$sql);

            $data = [];

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
            }
            return $data;
        }

        public static function getProductIdByOrderDetailId($OrderId){
            global $conn;

            $sql = "SELECT productid from orderdetail where OrderId=$OrderId";
            $result = mysqli_query($conn,$sql);

            $data = [];

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
            }
            return $data;

        }

        public static function getQuantityByOrderAndProduct($OrderId,$productId){
            global $conn;

            $sql = "SELECT * from orderdetail where OrderId=$OrderId and productid = $productId";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    return $row;
                }
            }

        }
    
    }

?>