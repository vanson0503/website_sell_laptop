<?php
require_once "config/connectDatabase.php";
class Category
{
    public static function getAllCategories()
    {
        global $conn;
        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);
        $categories = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'description' => $row['description']
                ];
                $categories[] = $category;
            }
        }

        return $categories;
    }
    public static function addCategory($name, $description)
    {
        global $conn;

        // Chuẩn bị truy vấn SQL để chèn danh mục vào CSDL
        $sql = "INSERT INTO category (name, description) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $description);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            // Thêm thành công
            return true;
        } else {
            // Lỗi khi thêm danh mục
            return false;
        }
    }

    public static function deleteById($id){
        global $conn;

        $sql = "DELETE FROM category where id = ".$id;

        if($conn->query($sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getById($id){
        global $conn;

        $sql = "SELECT * FROM category where id=".$id;

        $result = $conn->query($sql);

        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            return $row;
        }
        return null;
    }

    public static function updateCategory($id,$name, $description){
        global $conn;

        $sql = "UPDATE category set name='$name',description='$description' where id = $id";


        // Thực thi truy vấn
        if ($conn->query($sql)) {
            // Thêm thành công
            return true;
        } else {
            // Lỗi khi thêm danh mục
            return false;
        }
    }
}
?>