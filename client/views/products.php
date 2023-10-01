<?php
require_once "client/models/Category.php";
require_once "client/models/Brands.php";
$categories = Category::getAllCategories();
$brands = Brands::getAllBrands();
?>
<style>
    .btn-product:hover span,
    .btn-product:focus span {
        color: #fff;
        box-shadow: 0 1px 0 0 #39f;
    }
</style>

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Sản phẩm<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="page-content">
        <div class="container">
            <div class="toolbox">


                <div class="toolbox-right">
                    <div class="dropdown menu-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-display="static">
                            Lọc theo danh mục</i>
                        </a>
                        <?php
                        $currentUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
                        if ($_SERVER['QUERY_STRING']) {
                            $currentUrl .= '?' . $_SERVER['QUERY_STRING'];
                        }
                        ?>
                        <div class="dropdown-menu">
                            <ul class="menu-vertical sf-arrows">
                                <?php foreach ($categories as $category): ?>

                                    <li><a href="<?php echo "?controller=products&categoryid=" . $category["id"]; ?>">
                                            <?php echo $category["name"] ?>
                                        </a></li>
                                <?php endforeach ?>
                            </ul>
                        </div><!-- End .toolbox-sort -->
                    </div>
                    <div class="dropdown menu-dropdown p-3">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-display="static">
                            Lọc theo nhãn hiệu</i>
                        </a>
                        <?php
                        $currentUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
                        if ($_SERVER['QUERY_STRING']) {
                            $currentUrl .= '?' . $_SERVER['QUERY_STRING'];
                        }
                        ?>
                        <div class="dropdown-menu">
                            <ul class="menu-vertical sf-arrows">
                                <?php foreach ($brands as $brand): ?>

                                    <li><a href="<?php echo "?controller=products&brandid=" . $brand["id"]; ?>">
                                            <?php echo $brand["name"] ?>
                                        </a></li>
                                <?php endforeach ?>
                            </ul>
                        </div><!-- End .toolbox-sort -->
                    </div>
                </div><!-- End .toolbox-right -->
            </div><!-- End .toolbox -->
            <div class="products">
                <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <form action="?controller=carts" method="post" class="product">
                                <input type="hidden" name="id" value="<?php echo $product['product']["id"]; ?>">
                                <input type="hidden" name="price" value="<?php echo $product['product']["price"]; ?>">
                                <figure class="product-media">
                                    <span class="product-label label-new">New</span>
                                    <a
                                        href="?controller=products&action=deltail&id=<?php echo $product['product']["id"]; ?>">
                                        <img src="uploads/<?php echo $product['images'][2]; ?>" alt="Product image"
                                            class="product-image" style="height:200px">
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                wishlist</span></a>
                                    </div><!-- End .product-action -->
                                    <div class="product-action action-icon-top">
                                        <button class="btn-product btn-cart"
                                            style="border:none;font-size:16px;background-color: #f6f7fa;">Thêm vào giỏ
                                            hàng</button>

                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <?php
                                        $category = Category::getById($product['product']['categoryid'])
                                            ?>
                                        <a href="?controller=products&categoryid=<?php echo $category["id"]; ?>">
                                            <?php echo $category["name"]; ?>
                                        </a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="?controller=products&action=deltail&id=<?php echo $product['product']["id"]; ?>">
                                            <?php echo $product['product']['name']; ?>
                                        </a></h3>
                                    <!-- End .product-title -->
                                    <div class="product-price">
                                        <?php echo number_format($product['product']['price'], 0, "", "."); ?> VNĐ
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                            </form><!-- End .product -->
                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                    <?php endforeach ?>
                </div><!-- End .row -->


            </div><!-- End .products -->
            <div class="d-flex justify-content-center">
                <!-- Tạo phân trang -->
                <ul class="pagination">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?controller=products&page=<?php echo $page - 1;
                            if (!empty($categoryid)) {
                                echo "&categoryid=" . urlencode($categoryid);
                            }else if(!empty($brandid)){
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
                            }else if(!empty($brandid)){
                                echo "&brandid=" . urlencode($brandid);
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
                            }else if(!empty($brandid)){
                                echo "&brandid=" . urlencode($brandid);
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
                            }else if(!empty($brandid)){
                                echo "&brandid=" . urlencode($brandid);
                            }
                            ?>"><?php echo $totalPages; ?></a>
                        </li>
                    <?php endif; ?>

                    <?php if ($page < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?controller=products&page=<?php echo $page + 1;
                            if (!empty($categoryid)) {
                                echo "&categoryid=" . urlencode($categoryid);
                            }else if(!empty($brandid)){
                                echo "&brandid=" . urlencode($brandid);
                            }
                            ?>">Next</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->