<?php
require_once "../config/connectDatabase.php";

class Products
{
    public static function getAll()
    {
        global $conn;
        $sql = "SELECT p.*, i.url FROM product p LEFT JOIN image i ON p.id = i.productid";
        $result = $conn->query($sql);
        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productId = $row['id'];

                // Kiểm tra xem mảng con có tồn tại cho ID sản phẩm hay chưa
                if (!isset($data[$productId])) {
                    // Tạo mảng con mới nếu chưa tồn tại
                    $data[$productId] = [
                        'product' => $row,
                        'images' => []
                    ];
                }

                // Lưu tất cả các URL của ảnh vào mảng images
                if ($row['url']) {
                    $data[$productId]['images'][] = $row['url'];
                }
            }
        }

        return $data;
    }

    public static function getAllPaginatedProducts($page, $limit)
    {
        global $conn;

        $start = ($page - 1) * $limit;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product";

        $productSql .= " ORDER by created_at DESC LIMIT $start, $limit";

        $productResult = $conn->query($productSql);
        $data = [];

        if ($productResult->num_rows > 0) {
            while ($productRow = $productResult->fetch_assoc()) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image";
        $imageResult = $conn->query($imageSql);

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if ($imageResult->num_rows > 0) {
            while ($imageRow = $imageResult->fetch_assoc()) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }

    public static function getAllTotalProducts()
    {
        global $conn;

        $sql = "SELECT COUNT(*) as total FROM product";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }

    public static function getTotalProducts($category)
    {
        global $conn;

        $sql = "SELECT COUNT(*) as total FROM product";

        // Áp dụng thông tin lọc sản phẩm (nếu có)
        if ($category) {
            // Thực hiện lọc theo danh mục
            $sql .= " WHERE categoryid = '$category'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }

    public static function getPaginatedProducts($page, $limit, $categoryid)
    {
        global $conn;

        $start = ($page - 1) * $limit;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product";

        // Áp dụng thông tin lọc sản phẩm (nếu có)
        if ($categoryid) {
            // Thực hiện lọc theo danh mục
            $productSql .= " WHERE categoryid = '$categoryid'";
        }

        $productSql .= "  ORDER by created_at DESC LIMIT $start, $limit";

        $productResult = $conn->query($productSql);
        $data = [];

        if ($productResult->num_rows > 0) {
            while ($productRow = $productResult->fetch_assoc()) {
                $productId = $productRow['id'];

                // Tạo mảng con cho mỗi sản phẩm
                $data[$productId] = [
                    'product' => $productRow,
                    'images' => []
                ];
            }
        }

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = $conn->query($imageSql);

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm tương ứng
        if ($imageResult->num_rows > 0) {
            while ($imageRow = $imageResult->fetch_assoc()) {
                $productId = $imageRow['productid'];

                // Kiểm tra xem sản phẩm có tồn tại trong mảng dữ liệu không
                if (isset($data[$productId])) {
                    // Thêm URL của ảnh vào mảng images của sản phẩm
                    $data[$productId]['images'][] = $imageRow['url'];
                }
            }
        }

        return $data;
    }

    public static function create($name, $brand, $category, $description, $quantity, $price, $cpu, $ram, $cardname, $harddrive, $screen, $connect, $operatingsystem, $battery)
    {
        global $conn;

        // Insert vào bảng "product" sử dụng prepared statement
        $sql = "INSERT INTO product (categoryid, brandid, name, description, quantity, price) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iissii", $category, $brand, $name, $description, $quantity, $price);
        $stmt->execute();

        // Lấy ID của sản phẩm vừa chèn
        $productID = $stmt->insert_id;

        // Insert vào bảng "configuration" sử dụng prepared statement
        $sql = "INSERT INTO configuration (productid, cpu, ram, cardname, harddrive, screen, connect, operatingsystem, battery) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssssss", $productID, $cpu, $ram, $cardname, $harddrive, $screen, $connect, $operatingsystem, $battery);
        if ($stmt->execute()) {
            echo '<script>alert("OK");</script>';
        }




        $files = $_FILES['files'];

        // Kiểm tra xem có file được tải lên hay không
        if (!empty($files['name'][0])) {
            $uploadedFiles = [];
            $targetDir = '../uploads/'; // Thư mục lưu trữ file

            // Lặp qua từng file
            for ($i = 0; $i < count($files['name']); $i++) {
                $filename = basename($files['name'][$i]);
                $targetPath = $targetDir . $filename;

                // Kiểm tra và di chuyển file vào thư mục lưu trữ
                if (move_uploaded_file($files['tmp_name'][$i], $targetPath)) {
                    // Insert vào bảng "image" sử dụng prepared statement
                    $insertImage = $conn->prepare("INSERT INTO image (productid, url) VALUES (?, ?)");
                    $insertImage->bind_param("is", $productID, $filename);
                    $insertImage->execute();
                    $uploadedFiles[] = $targetPath;
                } else {
                    return false;
                }
            }
        }

        return true;
    }

    public static function getProductById($id)
    {
        global $conn;
        $sql = "SELECT p.*, i.url FROM product p LEFT JOIN image i ON p.id = i.productid WHERE p.id = ?";

        // Sử dụng prepared statement để tránh lỗi SQL Injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $product = [
                'product' => null,
                'images' => []
            ];

            while ($row = $result->fetch_assoc()) {
                if (!$product['product']) {
                    // Lưu thông tin sản phẩm vào mảng con product
                    $product['product'] = $row;
                }

                // Lưu tất cả các URL của ảnh vào mảng images
                if ($row['url']) {
                    $product['images'][] = $row['url'];
                }
            }

            return $product;
        }

        return null; // Trả về null nếu không tìm thấy sản phẩm
    }




    public static function update($id, $name, $brand, $category, $description, $quantity, $price, $cpu, $ram, $cardname, $harddrive, $screen, $connect, $operatingsystem, $battery)
    {
        global $conn;

        $updateProduct = "UPDATE product SET 
                        categoryid = $category, 
                        brandid = $brand, 
                        name = '$name', 
                        description = '$description', 
                        quantity = $quantity, 
                        price = $price 
                    WHERE id = $id";

        mysqli_query($conn, $updateProduct);

        $updateConfiguration = "UPDATE configuration SET 
                                cpu = '$cpu', 
                                ram = '$ram', 
                                cardname = '$cardname', 
                                harddrive = '$harddrive', 
                                screen = '$screen', 
                                connect = '$connect', 
                                operatingsystem = '$operatingsystem', 
                                battery = '$battery' 
                            WHERE productid = $id";

        mysqli_query($conn, $updateConfiguration);

        return true;
    }

    public static function deleteById($id){
        global $conn;

        $sql = "DELETE FROM product where id=".$id;

        if($conn->query($sql)){
            return true;
        }
        return false;
    }

}
?>