<?php
require_once "../config/connectDatabase.php";
class Admins
{
    public static function getAll(){
        global $conn;
        $sql = "SELECT * FROM admin";
        $result = mysqli_query($conn,$sql);
        $data = [];
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
        }
        return $data;
    }
    public static function getById($id){
        global $conn;
        $sql = "SELECT * FROM admin where id = ".$id;
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                return $row;
            }
        }
    }

    public static function add($username,$password,$role){
        global $conn;
        $sql = "INSERT INTO admin(username,password,role) value('$username','$password',$role)";
        if(mysqli_query($conn,$sql)){
            return true;
        }
        return false;
    }

    public static function deleteById($id){
        global $conn;
        $sql = "DELETE FROM admin where id=$id";
        if(mysqli_query($conn,$sql)){
            return true;
        }
        return false;
    }

    public static function updateRole($id,$role){
        global $conn;
        $sql = "UPDATE admin set role= $role where id=$id";
        if(mysqli_query($conn,$sql)){
            return true;
        }
        return false;
    }

    public static function updatePass($id,$password){
        global $conn;
        $sql = "UPDATE admin set password= '$password' where id=$id";
        if(mysqli_query($conn,$sql)){
            return true;
        }
        return false;
    }

    public static function checkRole($id){
        global $conn;
        $sql = "select * from admin where id=$id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row["role"]==1){
            return true;
        }
        return false;
    }
}
?>