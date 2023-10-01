<?php
require_once "client/models/Products.php";
require_once "client/models/Category.php";
require_once "client/models/Brands.php";
require_once "client/models/Configuration.php";
$product = Products::getProductById($_GET["id"]);
$configuration = Configuration::getConfigurationByIdProduct($_GET["id"]);
$brand = Brands::getById($product["product"]["brandid"]);
?>

<main class="main pt-3">

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">

                                <figure class="product-main-image">
                                    <img id="product-zoom" src="uploads/<?php echo $product['images'][0]; ?>"
                                        alt="product image">

                                </figure><!-- End .product-main-image -->

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    <?php foreach ($product['images'] as $image): ?>
                                        <a class="product-gallery-item" href="#">
                                            <img class="image" src="uploads/<?php echo $image; ?>" height="200" alt="product side">
                                        </a>
                                    <?php endforeach ?>
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->

                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">
                                <?php echo $product['product']['name']; ?>
                            </h1>
                            <div class="product-price">
                                <?php echo number_format($product['product']['price'], 0, "", "."); ?> VNĐ
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                    <?php echo $product['product']['description']; ?>
                                </p>
                            </div><!-- End .product-content -->





                            <form action="?controller=carts" method="post">
                                <input type="hidden" name="id" value="<?php echo $product['product']['id']; ?>">
                                <input type="hidden" name="price" value="<?php echo $product['product']['price']; ?>">
                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Số lượng:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" name="quantity" id="qty" class="form-control" value="1" min="1" max="100"
                                            step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                </div><!-- End .details-filter-row -->

                                <div class="product-details-action">
                                    <input type="submit" class="btn-product btn-cart" name="add" value="Thêm vào giỏ hàng">

                                    <div class="details-action-wrapper">
                                        <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to
                                                Wishlist</span></a>

                                    </div><!-- End .details-action-wrapper -->
                                </div><!-- End .product-details-action -->
                            </form>
                            <?php
                            $category = Category::getById($product['product']['categoryid'])
                                ?>
                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Danh mục:</span>
                                    <a href="?controller=products&categoryid=<?php echo $category["id"]; ?>">
                                        <?php echo $category["name"]; ?>
                                    </a>,
                                </div><!-- End .product-cat --><br>
                                <div class="product-cat">
                                    <span>Thương hiệu:</span>
                                    <a href="?controller=products&brandid=<?php echo $brand["id"]; ?>">
                                        <?php echo $brand["name"]; ?>
                                    </a>,
                                </div><!-- End .product-cat -->

                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                            class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                            class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                            class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                            class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->
            <hr>
            <div class="product-details-tab pt-3">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                            role="tab" aria-controls="product-desc-tab" aria-selected="true">Mô tả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab"
                            aria-controls="product-info-tab" aria-selected="false">Thông tin bổ sung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab"
                            role="tab" aria-controls="product-shipping-tab" aria-selected="false">Vận chuyển & Trả
                            hàng</a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                        aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <p>
                                <?php echo $product['product']['description']; ?>
                            </p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                        aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <h3 class="text-center">Cấu hình</h3>
                            <div class="container w-100">
                                <div class="list-group">
                                    <div class="list-group-item">
                                        <h5 class="mb-1">CPU</h5>
                                        <p class="mb-0">
                                            <?php echo $configuration["cpu"] ?>
                                        </p>
                                    </div>
                                    <div class="list-group-item">
                                        <h5 class="mb-1">RAM</h5>
                                        <p class="mb-0">
                                            <?php echo $configuration["ram"] ?>
                                        </p>
                                    </div>
                                    <div class="list-group-item">
                                        <h5 class="mb-1">Card Name</h5>
                                        <p class="mb-0">
                                            <?php echo $configuration["cardname"] ?>
                                        </p>
                                    </div>
                                    <div class="list-group-item">
                                        <h5 class="mb-1">Hard Drive</h5>
                                        <p class="mb-0">
                                            <?php echo $configuration["harddrive"] ?>
                                        </p>
                                    </div>
                                    <div class="list-group-item">
                                        <h5 class="mb-1">Screen</h5>
                                        <p class="mb-0">
                                            <?php echo $configuration["screen"] ?>
                                        </p>
                                    </div>
                                    <div class="list-group-item">
                                        <h5 class="mb-1">Connect</h5>
                                        <p class="mb-0">
                                            <?php echo $configuration["connect"] ?>
                                        </p>
                                    </div>
                                    <div class="list-group-item">
                                        <h5 class="mb-1">Operating System</h5>
                                        <p class="mb-0">
                                            <?php echo $configuration["operatingsystem"] ?>
                                        </p>
                                    </div>
                                    <div class="list-group-item">
                                        <h5 class="mb-1">Battery</h5>
                                        <p class="mb-0">
                                            <?php echo $configuration["battery"] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                        aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <h3>Giao hàng & Trả hàng</h3>
                            <p>Chúng tôi giao hàng đến hơn 100 quốc gia trên thế giới. Để biết chi tiết đầy đủ về giao
                                hàng
                                tùy chọn chúng tôi cung cấp, vui lòng xem thông tin giao hàng của chúng tôi
                                Chúng tôi hy vọng bạn sẽ yêu thích mỗi lần mua hàng, nhưng nếu bạn cần trả lại một mặt
                                hàng, bạn có thể làm như vậy
                                trong vòng một tháng sau khi nhận. Để biết chi tiết đầy đủ về cách hoàn trả, vui lòng
                                xem <a href="#">thông tin</a></p>
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->

        </div><!-- End .page-content -->
</main><!-- End .main -->

<script>
    // Lắng nghe sự kiện click trên các hình ảnh trong danh sách
    var galleryItems = document.querySelectorAll('.product-gallery-item');
    galleryItems.forEach(function (item) {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            // Lấy đường dẫn hình ảnh từ thuộc tính data-image của phần tử
            var image = item.querySelector('img').getAttribute('src');

            // Thay đổi đường dẫn của ảnh chính
            var productImage = document.getElementById('product-zoom');
            productImage.src = image;

            // Cập nhật trạng thái active của các hình ảnh trong danh sách
            galleryItems.forEach(function (item) {
                item.classList.remove('active');
            });
            item.classList.add('active');
        });
    });
</script>