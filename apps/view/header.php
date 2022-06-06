<!doctype html>
<html lang="en">

<head>
    <title>P229 Shop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="title" content="P229 Shop" />
    <meta name="description" content="Trang website bán dụng cụ dành cho những người đam mê về thể thao">
    <meta name="geo.region" content="VN-DN" />
    <meta name="geo.placename" content="Đà Nẵng" />
    <meta name="geo.position" content="16.006460;108.258987" />
    <meta name="ICBM" content="16.006460;108.258987" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/trangchu.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/lightslider.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/font/fontawesome-free-5.15.3-web/css/all.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/sanpham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/gioithieu.css">
    <!-- <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/kiemtra.css"> -->
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/app.css">
    <link rel="stylesheet" href="<?php echo BASE_URL ?>public/css/jquery-ui.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="padding-right: 0 !important;">
    <div class="main container-fluid p-0">
        <header class="w-100">
            <div class="main_nav_container container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="<?php echo BASE_URL ?>">P229<span style="font-size: 30px;">SHOP</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="<?php echo BASE_URL ?>">Trang chủ</a></li>
                                <!-- <li class="subnav">Quần
                                    <i class="fas fa-caret-down"></i>
                                    <ul class="sub_menu">
                                        <li><a href="">Quần ngắn</a></li>
                                        <li><a href="">Quần dài</a></li>
                                        <li><a href="">Quần bó</a></li>
                                    </ul>
                                </li>
                                <li class="subnav">Áo
                                    <i class="fas fa-caret-down"></i>
                                    <ul class="sub_menu">
                                        <li><a href="">Áo ngắn</a></li>
                                        <li><a href="">Áo tay dài</a></li>
                                        <li><a href="">Áo bó</a></li>
                                    </ul>
                                </li>
                                <li><a href="">Giày</a></li>
                                <li><a href="">Thực phẩm</a></li> -->
                                <?php print_r($menu); ?>
                            </ul>
                            <ul class="navbar_user" style="margin-left: 10px;">
                                <li data-toggle="modal" class="search_user" data-target="#exampleModalCenter">
                                    <i class="fas fa-search" aria-hidden="true"></i>

                                </li>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Tìm kiếm sản phẩm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="search-box">
                                                    <form action="<?php echo BASE_URL ?>index/detailproductbyname" method="post">
                                                        <input style="position: relative;" type="text" name="product_name" class="product_name" autocomplete="off" placeholder="Search tên sản phẩm..." />
                                                        <span class="microphone recording ">
                                                            <i class="fas fa-microphone" style="display: block;"></i>
                                                            <span class="recording-icon"></span>
                                                        </span>
                                                        <input type="text" name="id_product" class="id_product" hidden>
                                                        <input type="submit" hidden>
                                                        <div class="result">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <li class="user">
                        <?php if ($user['username'] != '') {
                        ?>
                            <div class="dropdown">
                                <button style="padding: 0;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i style="color: #fff" class="fas fa-user-circle"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a style="display: block;" class="dropdown-item w-100" href="<?php echo BASE_URL ?>index/profile">Xin chào <?php echo $user['username'] ?></a>
                                    <a style="display: block;" class="dropdown-item w-100" href="<?php echo BASE_URL ?>login/logout">Đăng xuất</a>
                                    <a style="display: block;" class="dropdown-item w-100" href="<?php echo BASE_URL ?>order/history_payment">Xem lịch sử mua hàng</a>
                                    <?php if ($user['type'] != 0) {
                                    ?>
                                        <a style="display: block;" class="dropdown-item w-100" href="<?php echo BASE_URL ?>login/adminpage">Vào trang admin</a>
                                    <?php
                                    } ?>
                                </div>
                            </div>

                        <?php
                        } else {
                        ?>
                            <a href="<?php echo BASE_URL ?>login"><i class="fas fa-sign-in-alt"></i></a>

                        <?php
                        } ?>
                    </li>
                    <li class="toturial"><i class="far fa-question-circle"></i></li>
                    <li class="checkout ml-2">
                        <a href="<?php echo BASE_URL ?>cart/productcart">
                            <i class="fas fa-shopping-basket" aria-hidden="true"></i>
                            <span id="checkout_items" class="checkout_items">
                                <?php $i = 0;
                                if (isset($_SESSION["shopping_cart"])) {
                                    foreach ($_SESSION["shopping_cart"] as $key => $val) {
                                        $i++;
                                    }
                                } ?>
                                <?php echo $i ?>
                            </span>
                        </a>
                    </li>
                    </ul>
                    <div class="hamburger_container">
                        <i class="fas fa-bars" aria-hidden="true"></i>
                    </div>
                    </nav>
                </div>
            </div>
    </div>
    </header>
    <div class="hambuger_menu side-bar">
        <div class="menu">
            <div class="item"><a href="">Trang chủ</a></div>
            <div class="item">
                <a class="sub_btn">Áo <i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="" class="sub-item">Áo tay ngắn</a>
                    <a href="" class="sub-item">Áo tay dài</a>
                    <a href="" class="sub-item">Áo cụt tay</a>
                </div>
            </div>
            <div class="item">
                <a class="sub_btn">Quần <i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="" class="sub-item">Áo tay ngắn</a>
                    <a href="" class="sub-item">Áo tay dài</a>
                    <a href="" class="sub-item">Áo cụt tay</a>
                </div>
            </div>
            <div class="item"><a href="">Trang chủ</a></div>
        </div>
    </div>