<?php
session_start();
ob_start();
require_once "client/models/Category.php";
require_once "client/models/Carts.php";
$categories = Category::getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">


<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>iTech Store</title>
    <meta name="description" content="iTech">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/logo.png">
    <meta name="apple-mobile-web-app-title" content="iTech">
    <meta name="application-name" content="iTech">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-4.css">
    <link rel="stylesheet" href="assets/css/demos/demo-4.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: 'Open Sans', sans-serif;
            
        }
    </style>
</head>

<body>
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="?controller=home&action=search" method="post" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input name="q"  type="search" class="form-control"  id="mobile-search"
                    placeholder="Tìm kiếm..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab"
                        role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab"
                        aria-controls="mobile-cats-tab" aria-selected="false">Danh mục</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel"
                    aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li class="active">
                                <a href="?controller=home">Trang chủ</a>

                            </li>

                            <li>
                                <a href="?controller=products">Sản phẩm</a>
                            </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                            <?php foreach ($categories as $category): ?>
                                <li><a href="?controller=products&categoryid=<?php echo $category["id"]; ?>">
                                        <?php echo $category["name"] ?>
                                    </a></li>
                            <?php endforeach ?>

                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <div class="page-wrapper">
        <header class="header header-intro-clearance header-4">

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="?home" class="logo">
                            <img src="assets/images/logo.png" alt="iTech Logo" width="50" height="25">
                        </a>
                    </div><!-- End .header-left -->
                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="?controller=home&action=search" method="post">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Tìm kiếm ..."
                                        required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">

                        <div class="dropdown cart-dropdown">
                            <a href="?controller=carts" class="dropdown-toggle" role="button"  >
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">
                                        <?php
                                        
                                        if(!isset($_SESSION["customerid"])){
                                            if(isset($_SESSION["cart"])){
                                                echo count($_SESSION["cart"]);
                                            }
                                            else{
                                                echo "0";
                                            }
                                        }
                                        else{
                                            echo Carts::countCartByCustomerId($_SESSION["customerid"]);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <p>Cart</p>
                            </a>

                            
                        </div><!-- End .cart-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i style="font-size: 23px;" class="fa-regular fa-user"></i>
                                </div>
                                <p>User</p>
                            </a>
                            <div>
                                <ul style="width: fit-content !important;padding: 5px !important;left:-120px;"
                                    class="dropdown-menu dropdown-menu-md-right">
                                    <?php
                                        if(!isset($_SESSION["customerid"])){
                                            echo '<li><a class="dropdown-item" href="?controller=home&action=login">Đăng nhập & Đăng ký</a></li>';
                                        }
                                        else{
                                            echo '<li><a class="dropdown-item" href="?controller=customers&action=profile">Thông tin cá nhân</a></li>
                                            <li><a class="dropdown-item" href="?controller=carts&action=orderdetail">Xem đơn hàng</a></li>
                                            <li><a class="dropdown-item" href="?controller=home&action=logout">Đăng xuất</a></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>

                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static"
                                title="Browse Categories">
                                Danh mục <i class="icon-angle-down"></i>
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">

                                        <?php foreach ($categories as $category): ?>
                                            <li><a href="?controller=products&categoryid=<?php echo $category["id"]; ?>">
                                                    <?php echo $category["name"] ?>
                                                </a></li>
                                        <?php endforeach ?>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container">
                                    <a href="?controller=home" class="">Trang chủ</a>


                                </li>
                                <li>
                                    <a href="?controller=products" class="">Sản phẩm</a>


                                </li>

                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->


                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->