<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="public/image/gym.png" type="image/png">
    <!--plugins-->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/jquery-jvectormap-2.0.5.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/highcharts-white.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/imageuploadify.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link href="<?php echo BASE_URL ?>public/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>public/plugins/simplebar/css/simplebar.css" rel="stylesheet">
    <!--font-->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/font/fontawesome-free-5.15.3-web/">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/font/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">
    <!-- loader-->
    <link href="<?php echo BASE_URL ?>public/css/pace.min.css" rel="stylesheet">
    <script src="<?php echo BASE_URL ?>public/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?php echo BASE_URL ?>public/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL ?>public/css/app.css" rel="stylesheet">
    <!-- Css -->

    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/sanpham.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="description" content="P229SHOP mang lại những sản phẩm chất lượng cho khách hàng, đầy đủ dụng cụ cũng như áo quần thể thao" />
    <meta vary="User-Agent" />
    <meta name="geo.region" content="VN-SG" />
    <meta name="geo.placename" content="Ho Chi Minh City" />
    <meta name="geo.position" content="10.823099;106.629664" />
    <meta name="ICBM" content="10.823099, 106.629664" />

    <title>P229SHOP ADMIN</title>
</head>

<body class="bg-theme bg-theme1">
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="<?php echo BASE_URL ?>public/image/gym.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text"><a href="<?php echo BASE_URL ?>">P229SHOP</a></h4>
                </div>
                <div class="toggle-icon ms-auto"><i class="fas fa-arrow-circle-left"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="<?php echo BASE_URL ?>login/adminpage">
                        <div class="parent-icon"><i class="fas fa-home"></i>
                        </div>
                        <div class="menu-title">Trang chủ</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="menu-title">Ứng dụng</div>
                    </a>
                    <ul>
                        <li> <a href="app-emailbox.html">Email</a>
                        </li>
                        <li> <a href="app-chat-box.html"></i>Chat Box</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fas fa-list"></i>
                        </div>
                        <div class="menu-title">Thành phần</div>
                    </a>
                    <ul>
                        <li> <a href="<?php echo BASE_URL ?>page">Hướng dẫn</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>contact">Contact</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="menu-title">Sản phẩm</div>
                    </a>
                    <ul>
                        <li> <a href="<?php echo BASE_URL ?>product"></i>Sản phẩm</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>product/load_add_product"></i>Thêm mới sản phẩm</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>brand"></i>Nhãn hiệu</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>category"></i>Loại hàng</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>size"></i>Size</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>imgcolor"></i>Ảnh khác</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>imgdesc"></i>Ảnh mô tả sản phẩm</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>properties"></i>Thành phần sản phẩm</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>discount"></i>Giảm giá</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>local"></i>Vị trí</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>slide"></i>Slide</a>
                        </li>
                        <li> <a href="<?php echo BASE_URL ?>order"></i>Đơn hàng</a>
                        </li>
                        <!-- <li> <a href=""></i>Orders</a>
                        </li> -->
                    </ul>
                </li>
                <?php
                if ($data['type'] == 2) {
                ?>
                    <li>
                        <a href="<?php echo BASE_URL ?>login/list_user">
                            <div class="parent-icon"><i class="fas fa-user-circle"></i>
                            </div>
                            <div class="menu-title">Tài khoản</div>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu">
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="header-notifications-list"></div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">

                                <div class="dropdown-menu dropdown-menu-end">

                                    <div class="header-message-list">

                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $data['img_profile'] ?>" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0"><?php echo $data['username']; ?></p>
                                <p class="designattion mb-0"><?php if ($data['type'] == 1) {
                                                                    echo 'Nhân viên';
                                                                } else {
                                                                    echo 'Quản lí';
                                                                } ?></p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?php echo BASE_URL ?>login/profile"><span>Thông tin cá nhân</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL ?>login/logout"><span>Đăng xuất</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">