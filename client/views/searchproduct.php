<?php
require_once "client/models/Category.php";
$categories = Category::getAllCategories();
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
            <div class="products">
                <div class="row">

                    <?php foreach ($products as $product): ?>
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <form action="?controller=home&action=cart" method="post" class="product">
                                <input type="hidden" name="id" value="<?php echo $product['product']["id"]; ?>">
                                <figure class="product-media">
                                    <span class="product-label label-new">New</span>
                                    <a
                                        href="?controller=products&action=deltail&id=<?php echo $product['product']["id"]; ?>">
                                        <img src="uploads/<?php echo $product['images'][2]; ?>" alt="Product image"
                                            class="product-image">
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
                                        <a href="#">
                                            <?php echo $category["name"]; ?>
                                        </a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="">
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
            
    </div><!-- End .page-content -->
</main><!-- End .main -->