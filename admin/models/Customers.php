<?php
require_once "../config/connectDatabase.php";
class Customers
{
    public static function getAllCustomers($name)
    {
        global $conn;
        $sql = "SELECT * FROM customer ";
        if($name){
            $sql .=" name like '%$name%'";
        }
        $result = mysqli_query($conn,$sql);
        $data = [];
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function deleteById($id){
        global $conn;
        $sql = "DELETE FROM customer where id=$id";
        if(mysqli_query($conn,$sql)){
            return true;
        }
        return false;
    }

    public static function update($id,$name,$email,$phone,$address){
        global $conn;
        $sql = "UPDATE customer set name='$name',email='$email',phone='$phone',address='$address' where id = $id";
        if(mysqli_query($conn,$sql)){
            return true;
        }
        return $sql;
    }


    public static function changeStatus($id,$status){
        global $conn;
        $sql = "UPDATE customer set status = $status where id = $id";
        if(mysqli_query($conn,$sql)){
            return true;
        }
        return false;
    }

    public static function getStatus($id){
        global $conn;
        $sql = "SELECT * FROM customer where id=$id";
        $row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
        return $row["status"];
    }
}
?>