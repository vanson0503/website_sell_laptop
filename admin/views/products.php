<div class="row">
    <div class="col-lg-9">
        <a href="?controller=products&action=create" class="btn btn-success">Thêm sản phẩm</a>
    </div>
    <div class="col-lg-3">
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                Lọc theo danh mục
            </button>
            <ul class="dropdown-menu">
                <?php
                $currentUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
                if ($_SERVER['QUERY_STRING']) {
                    $currentUrl .= '?' . $_SERVER['QUERY_STRING'];
                }
                $categories = Category::getAllCategories();
                ?>
                <?php foreach ($categories as $category): ?>
                    <li><a class="dropdown-item" href="<?php echo "?controller=products&categoryid=" . $category["id"]; ?>"> <?php echo $category["name"] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $productId => $product): ?>
            <tr>
                <td>
                    <?php echo $product['product']['name']; ?>
                </td>
                <td>
                    <?php if (!empty($product['images'])): ?>
                        <img src="../uploads/<?php echo $product['images'][0]; ?>" alt="Product Image" width="120">
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $product['product']['quantity']; ?>
                </td>
                <td>
                    <?php echo number_format($product['product']['price']); ?>
                </td>
                <td>
                    <a class="btn btn-primary"
                        href="?controller=products&action=update&id=<?php echo $product['product']['id']; ?>">Sửa</a>
                    <a class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                        href="?controller=products&action=delete&id=<?php echo $product['product']['id']; ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="d-flex justify-content-center">
    <!-- Tạo phân trang -->
    <ul class="pagination">
        <?php if ($page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="?controller=products&page=<?php echo $page - 1;
                if (!empty($categoryid)) {
                    echo "&categoryid=" . urlencode($categoryid);
                } else if (!empty($brandid)) {
                    echo "&brandid=" . urlencode($brandid);
                }
                ?>">Previous</a>
            </li>
        <?php endif; ?>

        <?php if ($page > 3): ?>
            <li class="page-item">
                <a class="page-link" href="?controller=products&page=1<?php
                if (!empty($categoryid)) {
                    echo "&categoryid=" . urlencode($categoryid);
                }
                ?>">1</a>
            </li>
            <li class="page-item disabled"><span class="page-link">...</span></li>
        <?php endif; ?>

        <?php for ($i = max(1, $page - 2); $i <= min($page + 2, $totalPages); $i++): ?>
            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                <a class="page-link" href="?controller=products&page=<?php echo $i;
                if (!empty($categoryid)) {
                    echo "&categoryid=" . urlencode($categoryid);
                }
                ?>"><?php echo $i; ?></a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $totalPages - 2): ?>
            <li class="page-item disabled"><span class="page-link">...</span></li>
            <li class="page-item">
                <a class="page-link" href="?controller=products&page=<?php echo $totalPages;
                if (!empty($categoryid)) {
                    echo "&categoryid=" . urlencode($categoryid);
                }
                ?>"><?php echo $totalPages; ?></a>
            </li>
        <?php endif; ?>

        <?php if ($page < $totalPages): ?>
            <li class="page-item">
                <a class="page-link" href="?controller=products&page=<?php echo $page + 1;
                if (!empty($categoryid)) {
                    echo "&categoryid=" . urlencode($categoryid);
                }
                ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>
</div>

<script>
    var Confirm =function(){
        return confirm("Bạn có chắc chắn muỗn xóa?");
    }
</script>