<?php
require_once "../config/connectDatabase.php";
class Brands
{
    public static function getAllBrands()
    {
        global $conn;
        $sql = "SELECT * FROM brand";
        $result = $conn->query($sql);
        $brands = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $brand = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'description' => $row['description']
                ];
                $brands[] = $brand;
            }
        }

        return $brands;
    }
    public static function addBrand($name, $description)
    {
        global $conn;

        // Chuẩn bị truy vấn SQL để chèn danh mục vào CSDL
        $sql = "INSERT INTO brand (name, description) VALUES (?, ?)";
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

    public static function deleteById($id)
    {
        global $conn;

        $sql = "DELETE FROM brand where id = " . $id;

        if ($conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getById($id)
    {
        global $conn;

        $sql = "SELECT * FROM brand where id=" . $id;

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
        return null;
    }

    public static function updateBrand($id, $name, $description)
    {
        global $conn;

        $sql = "UPDATE brand set name='$name',description='$description' where id = $id";


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