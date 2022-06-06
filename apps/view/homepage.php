<div id="content">
    <div class="container-fluid  bg-1" style="background: rgb(255, 255, 255, 0.03); padding-top: 40px;">
        <div class="content-header text-center mb-4">
            <h2 class="title-heading">Sản phẩm mới nhất</h2>
        </div>
        <div class="container-fluid text-center">
            <ul class="autoWidth" class="cs-hidden">
                <?php foreach ($newproduct as $key => $new) {
                ?>
                    <li class="item-a">
                        <div class="box">
                            <?php foreach ($imgproduct as $key => $img) {
                            ?>
                                <?php if ($new['id_product'] == $img['id_product']) { ?>
                                    <img class="model p<?php echo $new['id_product'] ?> img_product" src="<?php echo BASE_URL ?>apps/uploads/<?php echo $img['img_name'] ?>">
                                <?php } ?>
                            <?php
                            }
                            ?>
                            <div class="content-product">
                                <h3 class="title"><?php echo $new['product_name'] ?></h3>
                                <div class="price"><span class="pricee"><?php echo number_format($new['price']) ?></span>đ</div>
                                <div class="content-color">
                                    <?php foreach ($imgother as $key => $imgcolor) {
                                    ?>
                                        <?php if ($new['id_product'] == $imgcolor['id_product']) { ?>
                                            <span class="p<?php echo $imgcolor['id_imgcolor'] ?>">
                                                <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $imgcolor['img_name'] ?>" alt="">
                                            </span>
                                        <?php } ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <a href="<?php echo BASE_URL ?>index/detailproduct/<?php echo $new['id_product'] ?>" class="fas fa-eye"></a>
                            <!-- <button class="btn btn_add_pro ">
                                <span class="add-to-cart">Add to cart</span>
                                <span class="added"><i class="far fa-check-circle"></i></span>
                                <i class="fas fa-shopping-cart"></i>
                                <i class="fas fa-tshirt"></i>
                            </button> -->
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>

        </div>
    </div>
    <div class="bg-1 ">
        <div class="container-fluid pt-4">
            <div class="content-header text-center mb-4">
                <h2 class="title-heading">Sản phẩm bán chạy nhất</h2>
            </div>
        </div>
        <div class="container-fluid text-center">
            <ul class="autoWidth" class="cs-hidden">
                <?php foreach ($sellproduct as $key => $sell) {
                ?>
                    <li class="item-a">
                        <div class="box">
                            <?php foreach ($imgproduct as $key => $img) {
                            ?>
                                <?php if ($sell['id_product'] == $img['id_product']) { ?>
                                    <img class="model p<?php echo $sell['id_product'] ?> img_product" src="<?php echo BASE_URL ?>apps/uploads/<?php echo $img['img_name'] ?>">
                                <?php } ?>
                            <?php
                            }
                            ?>
                            <div class="content-product">
                                <h3 class="title"><?php echo $sell['product_name'] ?></h3>
                                <?php foreach ($discounts as $key => $discount) {
                                ?>
                                    <?php if ($sell['status'] == 0 && $discount['id_product'] == $sell['id_product']) {
                                    ?>
                                        <div class="price"><span class="pricee"><?php echo number_format($sell['price'] - ($sell['price'] * $discount['discount'] / 100)) ?></span>đ - <span><?php echo number_format($sell['price']) ?></span></div>
                                    <?php
                                    } else {
                                    ?>

                                    <?php
                                    } ?>
                                <?php
                                } ?>
                                <?php if ($sell['status'] != 0) {
                                ?>
                                    <div class="price"><span class="pricee"><?php echo number_format($sell['price']) ?></span>đ</div>
                                <?php
                                } ?>
                                <div class="content-color">
                                    <?php foreach ($imgother as $key => $imgcolor) {
                                    ?>
                                        <?php if ($sell['id_product'] == $imgcolor['id_product']) { ?>
                                            <span class="p<?php echo $imgcolor['id_imgcolor'] ?>">
                                                <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $imgcolor['img_name'] ?>" alt="">
                                            </span>
                                        <?php } ?>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <a href="<?php echo BASE_URL ?>index/detailproduct/<?php echo $sell['id_product'] ?>" class="fas fa-eye"></a>
                            <!-- <button class="btn btn_add_pro ">
                                <span class="add-to-cart">Add to cart</span>
                                <span class="added"><i class="far fa-check-circle"></i></span>
                                <i class="fas fa-shopping-cart"></i>
                                <i class="fas fa-tshirt"></i>
                            </button> -->
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="container-fluid pt-4 bg-1" style="background: rgb(255, 255, 255, 0.03);">
            <div class="content-header text-center mb-4 mt-5">
                <h2 class="title-heading" style="position: relative; z-index: 100;">Sản phẩm giảm giá</h2>
            </div>
            <!-- Countdown -->

            <!-- <div class="container-fluid">
            <div class="countdown shadow">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-3">
                        <div id="days" class="">00</div>
                        <div class="description-heading" style="margin-bottom: 10px !important; padding-bottom: 10px;">Day</div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-3">
                        <div id="hours" class="">00</div>
                        <div class="description-heading" style="margin-bottom: 10px !important; padding-bottom: 10px;">Hours</div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-3">
                        <div id="minutes" class="">00</div>
                        <div class="description-heading" style="margin-bottom: 10px !important; padding-bottom: 10px;">Minutes</div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-3">
                        <div id="seconds" class="">00</div>
                        <div class="description-heading" style="margin-bottom: 10px !important; padding-bottom: 10px;">Seconds</div>
                    </div>
                </div>
            </div>
        </div> -->
            <!-- end of countdown -->
            <div class="container-fluid text-center">
                <ul class="autoWidth" class="cs-hidden">
                    <?php foreach ($saleproduct as $key => $sale) {
                    ?>
                        <li class="item-a">
                            <div class="box">
                                <?php foreach ($imgproduct as $key => $img) {
                                ?>
                                    <?php if ($sale['id_product'] == $img['id_product']) { ?>
                                        <img class="model p<?php echo $sale['id_product'] ?> img_product" src="<?php echo BASE_URL ?>apps/uploads/<?php echo $img['img_name'] ?>">
                                    <?php } ?>
                                <?php
                                }
                                ?>
                                <div class="content-product">
                                    <h3 class="title"><?php echo $sale['product_name'] ?></h3>

                                    <div class="price"><span class="pricee"><?php $dis = $sale['discount'] * 0.01;
                                                                            echo number_format($sale['price'] - $sale['price'] * $dis) ?></span>đ - <span><?php echo number_format($sale['price']) ?>đ</span></div>
                                    <div class="content-color">
                                        <?php foreach ($imgother as $key => $imgcolor) {
                                        ?>
                                            <?php if ($sale['id_product'] == $imgcolor['id_product']) { ?>
                                                <span class="p<?php echo $imgcolor['id_imgcolor'] ?>">
                                                    <img src="<?php echo BASE_URL ?>apps/uploads/<?php echo $imgcolor['img_name'] ?>" alt="">
                                                </span>
                                            <?php } ?>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <a href="<?php echo BASE_URL ?>index/detailproduct/<?php echo $sale['id_product'] ?>" class="fas fa-eye"></a>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>