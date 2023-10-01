<?php
require_once "config/connectDatabase.php";
require_once 'client/models/images.php';
class Products
{
    public static function getAll()
    {
        global $conn;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product ORDER by created_at DESC";
        $productResult = $conn->query($productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = $conn->query($imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
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
    public static function getPaginatedProducts2($page, $limit, $brandid)
    {
        global $conn;

        $start = ($page - 1) * $limit;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product";

        // Áp dụng thông tin lọc sản phẩm (nếu có)
        if ($brandid) {
            // Thực hiện lọc theo danh mục
            $productSql .= " WHERE brandid = '$brandid'";
        }

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
    public static function getTotalProducts2($brandid)
    {
        global $conn;

        $sql = "SELECT COUNT(*) as total FROM product";

        // Áp dụng thông tin lọc sản phẩm (nếu có)
        if ($brandid) {
            // Thực hiện lọc theo danh mục
            $sql .= " WHERE brandid = '$brandid'";
        }

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['total'];
        }

        return 0;
    }

    public static function getProductById($id)
    {
        global $conn;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product WHERE id = $id";
        $productResult = $conn->query($productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image WHERE productid = $id ";
        $imageResult = $conn->query($imageSql);

        $product = null;

        // Lấy dữ liệu từ bảng product
        if ($productResult->num_rows > 0) {
            $productRow = $productResult->fetch_assoc();

            $productId = $productRow['id'];

            // Tạo mảng con cho sản phẩm
            $product = [
                'product' => $productRow,
                'images' => []
            ];
        }

        // Lấy dữ liệu từ bảng image và gán vào mảng images của sản phẩm
        if ($imageResult->num_rows > 0) {
            while ($imageRow = $imageResult->fetch_assoc()) {
                // Thêm URL của ảnh vào mảng images của sản phẩm
                $product['images'][] = $imageRow['url'];
            }
        }

        return $product;
    }

    public static function search($q)
    {
        global $conn;

        // Truy vấn lấy dữ liệu từ bảng product
        $productSql = "SELECT * FROM product where name like '%$q%' ORDER by created_at DESC";
        $productResult = $conn->query($productSql);

        // Truy vấn lấy dữ liệu từ bảng image
        $imageSql = "SELECT * FROM image ORDER by id DESC";
        $imageResult = $conn->query($imageSql);

        $data = [];

        // Lấy dữ liệu từ bảng product
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

}
?>