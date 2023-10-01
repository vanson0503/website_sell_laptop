<?php
require_once "../config/connectDatabase.php";

class Images
{
    public static function getAll()
    {
        global $conn;
        $sql = "SELECT * FROM image";
        $result = $conn->query($sql);
        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }
    public static function getImagesByProductId($id)
    {
        global $conn;
        $sql = "SELECT * FROM image WHERE productid=" . $id;
        $images = [];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $images[] = $row;
            }
        }
        return $images;
    }

    public static function create($productId, $imageUrl)
    {
        global $conn;

        // Chuẩn bị truy vấn SQL
        $sql = "INSERT INTO image (productid, url) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $productId, $imageUrl);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            // Trả về ID của ảnh vừa được tạo
            return $stmt->insert_id;
        } else {
            // Xử lý khi truy vấn thất bại
            // Ví dụ: Ghi log, hiển thị thông báo lỗi, ...
            return false;
        }
    }

    public static function add_image($productId, $imageUrl)
    {
        global $conn;

        // Chuẩn bị truy vấn SQL để chèn thông tin ảnh vào CSDL
        $sql = "INSERT INTO image (productid, url) VALUES ('$productId', '$imageUrl')";
        // Thực thi truy vấn
        if ($conn->query($sql) === TRUE) {
            return true; // Xử lý thành công
        } else {
            return false; // Xử lý thất bại
        }
    }

    public static function deleteImageById($id)
    {
        global $conn;

        // Chuẩn bị truy vấn SQL để chèn thông tin ảnh vào CSDL
        $sql = "DELETE FROM image where id = ".$id;
        // Thực thi truy vấn
        if ($conn->query($sql) === TRUE) {
            return true; // Xử lý thành công
        } else {
            return false; // Xử lý thất bại
        }
    }

}
?>