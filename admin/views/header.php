<?php
    include("models/Admins.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.png">
    <title>Admin Dashboard</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js -->
    <script src="assets/js/jquery.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="assets/js/chart.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="assets/js/bundle.js"></script>
    <script>
        $(document).ready(function () {
            $(".navbar-toggler").click(function () {
                $(".navbar-nav .nav-item").toggle();
            });

            $(".sidebar-toggler").click(function () {
                $(".sidebar-wrapper").toggleClass("collapsed");
            });
        });
    </script>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <div class="container">
            <a class="navbar-brand" href="home">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=admins&action=profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=home&action=logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="col-lg-3 col-md-4 sidebar">
        <div class="sidebar-wrapper0">
            <ul class="nav flex-column sidebar-nav">
                <?php if (Admins::checkRole($_SESSION["idadmin"])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admins">Admin</a>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link" href="categories">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="brands">Nhãn hiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Orders">Đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="customers">Khách hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controller=home&action=thongke">Thống kê</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-lg-9 col-md-8 content">









        <script>
            function toggleSidebar() {
                $(".sidebar-wrapper").toggleClass("collapsed");
            }
        </script>

        <style>
            .sidebar-wrapper.collapsed .nav-link {
                display: none;
            }

            .sidebar-wrapper.collapsed {
                width: 75px;
            }

            .sidebar-wrapper .nav-link {
                padding: 0.5rem 1rem;
            }

            .sidebar-toggler {
                display: none;
            }

            @media (max-width: 991.98px) {
                .navbar-nav .nav-item {
                    display: none;
                }

                .navbar-nav .nav-item.show {
                    display: block;
                }

                .navbar-toggler {
                    display: block;
                }

                .sidebar-wrapper.collapsed .nav-link {
                    display: block;
                }

                .sidebar-wrapper.collapsed .sidebar-toggler {
                    display: block;
                }

                .sidebar-wrapper.collapsed {
                    width: 100%;
                }

            }
        </style>