<?php
    require_once "../config/connectDatabase.php";

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

        public static function getAllOrderDetailId(){
            global $conn;

            $sql = "SELECT DISTINCT orderid FROM `orderdetail`";

            $data = [];

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
            }
            return $data;
        }

        public static function selectOrderDetailById($orderDetailId){
            global $conn;

            $sql = "SELECT * FROM orders where id = $orderDetailId";

            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    return $row;
                }
            }
            return null;
        }
        public static function selectOrderByOrderDetailId($orderDetailId){
            global $conn;

            $sql = "SELECT * FROM orderdetail where orderid=$orderDetailId";

            $result = mysqli_query($conn,$sql);

            $data = [];

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
            }
            return $data;
        }

        public static function getProductIdByOrderDetailId($OrderDetailId){
            global $conn;

            $sql = "SELECT * from orderdetail where orderid=$OrderDetailId";
            $result = mysqli_query($conn,$sql);

            $data = [];

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $data[]=$row;
                }
            }
            return $data;

        }

        public static function getQuantityByOrderAndProduct($orderdetailid,$productId){
            global $conn;

            $sql = "SELECT quantity from orderdetail where orderid=$orderdetailid and productid = $productId";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    return $row;
                }
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

        public static function getStatus($id){
            global $conn;
            $sql = "SELECT * FROM orders where id=$id";
            $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
            return $row["status"];
        }
    
    }

?>