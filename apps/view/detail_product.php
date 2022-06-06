<div id="content" style="background: rgb(255, 255, 255, 0.03);">
    <div class="container-fluid">
        <form action="<?php echo BASE_URL ?>cart/addproducttocart" method="post">
            <?php
            foreach ($products as $key => $val) {
            ?>
                <div class="product">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="img image">
                                <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $imgcolor[0]['img_name'] ?>" alt="" class="p<?php echo $val['id_product'] ?>">
                            </div>
                            <div id="load_data_img">

                            </div>
                            <div class="description ml-2">
                                <h3>Mô tả sản phẩm:</h3>
                                <?php echo $val['description'] ?>
                            </div>
                            <input type="text" name="img_name" class="id_imgdesc" id="img_color" value="<?php echo $imgcolor[0]['img_name'] ?>" hidden>
                            <input type="text" name="id_size" class="id_size" value="" hidden>
                            <input type="text" name="id_img_size" class="id_img_size" value="" hidden>
                            <input type="text" name="product_name" value="<?php echo $val['product_name'] ?>" hidden>
                            <input type="text" name="price" value="<?php echo $val['price'] ?>" hidden>
                            <input type="text" name="id_product" id="id_product" value="<?php echo $val['id_product'] ?>" hidden>
                            <input type="text" name="quantity" value="1" hidden>
                            <input type="text" name="quantity_max" class="quantity" hidden>
                            <input type="text" name="discount" value="<?php if (isset($discountproduct[0]['discount'])) echo $discountproduct[0]['discount'];
                                                                        else {
                                                                            echo 0;
                                                                        } ?>" hidden>
                        </div>
                        <div class="col-md-8">
                            <div class="info-product">
                                <h1 class="title-heading"><?php echo $val['product_name'] ?></h1>
                                <div id="rate_star">

                                </div>

                                <?php if (isset($discountproduct[0]['discount'])) {
                                ?>

                                    <div class="price"><?php echo number_format($val['price'] - $val['price'] * $discountproduct[0]['discount'] * 0.01) ?></span>đ - <span style="text-decoration: line-through;"><?php echo number_format($val['price']) ?>đ</span></div>
                                <?php
                                } else {
                                ?>
                                    <div class="price"><?php echo number_format($val['price']) ?>đ</div>
                                <?php
                                } ?>

                                <!-- <h3 class="mt-3 text-light">Other products:</h3> -->
                                <div class="product-orther">
                                    <span class="p<?php echo $imgcolor[0]['id_imgcolor'] ?> img_orther_product active"><img class="img_product" src="<?php echo BASE_URL ?>apps/uploads/<?php echo $imgcolor[0]['img_name'] ?>" alt=""></span>
                                    <?php foreach ($imgcolors as $key => $img) { ?>
                                        <?php if ($imgcolor[0]['id_imgcolor'] != $img['id_imgcolor']) {
                                        ?>
                                            <span class="p<?php echo $img['id_imgcolor'] ?> img_orther_product"><img class="img_product" src="<?php echo BASE_URL ?>apps/uploads/<?php echo $img['img_name'] ?>" alt=""></span>
                                        <?php
                                        }
                                        ?>
                                    <?php } ?>
                                </div>
                                <div id="load_data_size">

                                </div>
                                <div class="amount" hidden>
                                    <button class="down" style="background: none; font-size: 25px;" onclick="down()">-</button><input type="text" id="amount" value="1" style="border: none;"><button style="background:none !important; font-size: 25px; color: #fff;" onclick="up()">+</button>
                                </div>
                                <div id="notification">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="review-product">
            <div class="review-nav">
                <span class="title" style="margin-left: 10px;">Ảnh <p class="current-img" style="margin: 0px 10px;"></p> của <p class="total-img" style="margin-left: 10px;"></p></span>
                <span style="cursor: pointer;" class="icon fas fa-times"></span>
            </div>
            <div class="change">
                <div class="slide1 prev"><i class="fas fa-angle-left"></i></div>
                <div class="slide1 next"><i class="fas fa-angle-right"></i></div>
                <img src="img/shoe1.png" alt="">
            </div>
        </div>
        <div class="popup"></div> -->

            <?php
            }
            ?>
        </form>
        <!-- <div class="sanphamtt">
            <div class="container-fluid text-center">
                <ul class="autoWidth" class="cs-hidden">
                    <li class="item-a">
                        <div class="box">
                            <img class="model p2 img_product" src="img/aogym1.png">
                            <div class="content-product">
                                <h3 class="title">Gym Shirt </h3>
                                <div class="price"><span class="pricee">100</span>$ - <span>98$</span></div>
                                <div class="content-color">
                                    <span class="p2a"><img class="" src="/img/aogym1.png" alt=""></span>
                                    <span class="p2b"><img class="" src="/img/aogym2.png" alt=""></span>
                                </div>
                            </div>
                            <a href="product.html" class="fas fa-eye"></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div> -->
        <div class="rate mt-5 mb-4">
            <h3 class="mb-3" style="text-align: center">Đánh giá sản phẩm</h3>
            <h3 class="m-4" id="numComment"></h3>
            <?php if (Session::get('username') != '') {
            ?>
                <div class="rate-place container-fluid" style="background-color: #3333; max-width: 800px; border: 2px solid rgb(255 255 255 / 15%); margin-left: auto !important; margin-right: auto !important;">
                    <h3 class="mb-2 text-center pt-3">Đánh giá tại đây</h3>
                    <div class="">
                        <div class="star text-center">
                            <input type="checkbox" name="rate" value="5" class="rate" id="rate-5">
                            <label for="rate-5" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="4" class="rate" id="rate-4">
                            <label for="rate-4" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="3" class="rate" id="rate-3">
                            <label for="rate-3" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="2" class="rate" id="rate-2">
                            <label for="rate-2" class="fas fa-star"></label>
                            <input type="checkbox" name="rate" value="1" class="rate" id="rate-1">
                            <label for="rate-1" class="fas fa-star"></label>
                            <div id="form" class="mt-3">
                                <div class="form-group">
                                    <textarea id="textComment" class="w-100" rows="5"></textarea>
                                </div>
                                <div class="btn">
                                    <button class="w-100" id="comment" style="background: rgb(0 0 0  / 15%); color: #fff; border: 1px solid rgb(255 255 255 / 25%); padding: 0 20px;">Đăng tải</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            <?php
            } ?>

            <div class="m-4 userComment">

            </div>
            <div class="row replyRow" style="display: none;">
                <div class="col-md-12">
                    <input type="text" hidden value="" id="comment_id">
                    <textarea id="replyComment" class="w-100" rows="5"></textarea><br>
                    <button class="btn btn-primary" onclick="$('.replyRow').hide();">Đóng</button>
                    <button class="btn btn-success" id="addReply">Thêm bình luận</button>
                </div>
            </div>
        </div>
    </div>
</div>