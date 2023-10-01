<?php
require_once "client/models/Brands.php";
require_once "client/models/Category.php";
$brands = Brands::getAllBrands();
$categories = Category::getAllCategories();
?>
<main class="main">
    <div class="intro-slider-container mb-5">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{
                        "dots": true,
                        "nav": false, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
            <div class="intro-slide" style="background-image: url(assets/images/banner/banner1.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle text-third">Ưu đãi và khuyến mãi</h3>
                            <!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">Shopping now <br> </h1>

                            <div class="intro-price">

                            </div><!-- End .intro-price -->

                            <a href="?controller=products" class="btn btn-primary btn-round">
                                <span>Shop More</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
            <div class="intro-slide" style="background-image: url(assets/images/banner/banner2.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle text-third">Ưu đãi và khuyến mãi</h3>
                            <!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">Shopping now <br> </h1>

                            <div class="intro-price">
                            </div><!-- End .intro-price -->

                            <a href="?controller=products" class="btn btn-primary btn-round">
                                <span>Shop More</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->

            <div class="intro-slide" style="background-image: url(assets/images/banner/banner3.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <h3 class="intro-subtitle text-primary">Ưu đãi và khuyến mãi</h3>
                            <!-- End .h3 intro-subtitle -->
                            <h1 class="intro-title">Shopping now <br> </h1>
                            <div class="intro-price">

                            </div>
                            <a href="?controller=products" class="btn btn-primary btn-round">
                                <span>Shop More</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div><!-- End .col-md-6 offset-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
        </div><!-- End .intro-slider owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <div class="container">
        <h2 class="title text-center mb-4">Các thương hiệu nổi tiếng</h2><!-- End .title text-center -->

        <div class="cat-blocks-container">



            <div class="row">
                <?php $countBrand = 0; ?>
                <?php foreach ($brands as $brand): ?>
                    <div class="col-6 col-sm-4 col-lg-2">
                        <a href="?controller=products&brandid=<?php echo $brand["id"] ?>" class="cat-block">
                            <figure>
                                <span>
                                    <img width="100" src="assets/images/brands/<?php echo $brand["name"] ?>.png"
                                        alt="Category image">
                                </span>
                            </figure>

                            <h3 class="cat-block-title">
                                <?php echo $brand["name"] ?>
                            </h3><!-- End .cat-block-title -->
                        </a>
                    </div>
                    <?php $countBrand++;
                    if ($countBrand == 6) {
                        break;
                    }
                    ?>
                <?php endforeach ?>

            </div><!-- End .row -->
        </div><!-- End .cat-blocks-container -->
    </div><!-- End .container -->

    <div class="mb-4"></div><!-- End .mb-4 -->



    <div class="mb-3"></div><!-- End .mb-5 -->

    <div class="container new-arrivals">
        <div class="heading heading-flex mb-3">
            <div class="heading-left">
                <h2 class="title">Hàng mới về</h2><!-- End .title -->
            </div><!-- End .heading-left -->

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab"
                            aria-controls="new-all-tab" aria-selected="true">All</a>
                    </li>
                    <?php $countCategory = 0;
                    ?>
                    <?php foreach ($categories as $category): ?>
                        <li class="nav-item">
                            <a class="nav-link" id="new-tv-link" data-toggle="tab"
                                href="#category<?php echo $category["id"]; ?>" role="tab" aria-controls="new-tv-tab"
                                aria-selected="false"><?php echo $category["name"]; ?></a>
                        </li>
                        <?php if ($countCategory == 5)
                            break;
                        ?>
                    <?php endforeach ?>


                </ul>
            </div><!-- End .heading-right -->
        </div><!-- End .heading -->
        <div class="tab-content tab-content-carousel just-action-icons-sm">
            <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    }
                                }
                            }'>
                    <?php
                    $newproducts = Products::getAllPaginatedProducts(1, 6);
                    ?>
                    <?php foreach ($newproducts as $product): ?>
                        <form action="?controller=carts" method="post" class="product product-2">
                            <input type="hidden" name="id" value="<?php echo $product['product']["id"]; ?>">
                            <input type="hidden" name="price" value="<?php echo $product['product']["price"]; ?>">
                            <figure class="product-media">
                                <span class="product-label label-circle label-top">New</span>
                                <a href="?controller=products&action=deltail&id=<?php echo $product['product']["id"]; ?>">
                                    <img src="uploads/<?php echo $product["images"][0] ?>" style="height: 200px !important;"
                                        alt="Product image" class="product-image">
                                </a>
                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                </div><!-- End .product-action -->
                                <div class="product-action">
                                    <button class="btn-product btn-cart"
                                        style="border:none;font-size:16px;background-color: #f6f7fa;">Thêm vào giỏ
                                        hàng
                                    </button>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->
                            <div class="product-body">
                                <div class="product-cat">
                                    <?php $categoryy = Category::getById($product['product']["categoryid"]); ?>
                                    <a href="?controller=products&categoryid=<?php echo $categoryy["id"]; ?>"><?php echo $categoryy["name"]; ?></a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a
                                        href="?controller=products&action=deltail&id=<?php echo $product['product']["id"]; ?>">
                                        <?php echo $product["product"]["name"] ?>
                                    </a>
                                </h3><!-- End .product-title -->
                                <div class="product-price">
                                    <?php echo number_format($product['product']['price'], 0, "", ".") ?> VNĐ
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 100%;"></div>
                                        <!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->
                            </div><!-- End .product-body -->
                        </form><!-- End .product -->
                    <?php endforeach ?>

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <?php foreach ($categories as $category): ?>
                <div class="tab-pane p-0 fade" id="category<?php echo $category["id"]; ?>" role="tabpanel"
                    aria-labelledby="">
                    <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
        "nav": true, 
        "dots": true,
        "margin": 20,
        "loop": false,
        "responsive": {
            "0": {
                "items":2
            },
            "480": {
                "items":2
            },
            "768": {
                "items":3
            },
            "992": {
                "items":4
            },
            "1200": {
                "items":5
            }
        }
    }'>
                        <?php
                        $newproducts = Products::getPaginatedProducts(1, 6, $category["id"]);
                        ?>
                        <?php foreach ($newproducts as $product): ?>
                            <form action="?controller=carts" method="post" class="product product-2">
                                <input type="hidden" name="id" value="<?php echo $product['product']["id"]; ?>">
                                <input type="hidden" name="price" value="<?php echo $product['product']["price"]; ?>">
                                <figure class="product-media">
                                    <span class="product-label label-circle label-top">New</span>
                                    <a href="?controller=products&action=deltail&id=<?php echo $product['product']["id"]; ?>">
                                        <img src="uploads/<?php echo $product["images"][0] ?>" style="height: 200px !important;"
                                            alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <button class="btn-product btn-cart"
                                            style="border:none;font-size:16px;background-color: #f6f7fa;">Thêm vào giỏ
                                            hàng</button>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <?php $categoryy = Category::getById($product['product']["categoryid"]);
                                        ?>
                                        <a href="?controller=products&categoryid=<?php echo $categoryy["id"]; ?>"><?php echo $categoryy["name"] ?></a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a
                                            href="?controller=products&action=deltail&id=<?php echo $product['product']["id"]; ?>">
                                            <?php echo $product["product"]["name"] ?>
                                        </a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <?php echo number_format($product['product']['price'], 0, "", ".") ?> VNĐ
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 100%;"></div>
                                            <!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 4 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </form><!-- End .product -->
                        <?php endforeach ?>
                    </div>
                </div><!-- .End .tab-pane -->
            <?php endforeach ?>
        </div><!-- End .tab-content -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- End .mb-6 -->








    <div class="mb-5"></div><!-- End .mb-5 -->



    <div class="mb-4"></div><!-- End .mb-4 -->

    <div class="container">
        <hr class="mb-0">
    </div><!-- End .container -->


</main><!-- End .main -->
<div class="cta bg-image bg-dark pt-4 pb-5 mb-0" style="background-image: url(assets/images/demos/demo-4/bg-5.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6">
                <div class="cta-heading text-center">
                    <h3 class="cta-title text-white">Nhận ưu đãi mới nhất</h3><!-- End .cta-title -->
                    <p class="cta-desc text-white">và nhận <span class="font-weight-normal">thông tin những sản phẩm mới nhất</span></p><!-- End .cta-desc -->
                </div><!-- End .text-center -->
                <form action="#">
                    <div class="input-group input-group-round">
                        <input type="email" class="form-control form-control-white"
                            placeholder="Enter your Email Address" aria-label="Địa chỉ email" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit"><span>Đăng ký</span><i
                                    class="icon-long-arrow-right"></i></button>
                        </div><!-- .End .input-group-append -->
                    </div><!-- .End .input-group -->
                </form>
            </div><!-- End .col-sm-10 col-md-8 col-lg-6 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .cta -->


<!-- Thêm thư viện jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Thêm thư viện Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function () {
        // Khởi tạo Owl Carousel
        $('.intro-slider').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000, // Thời gian chuyển slide (2 giây)
            autoplayHoverPause: true,
            dots: true,
            nav: false
        });
    });
</script>